/**
 * Superarse Analytics Tracker (interno y privado)
 * Registra page_view, clics y envíos de formularios hacia log-event.php
 *
 * Uso: <script src=APP.asset("js/analytics/tracker.js") defer></script>
 */
(function () {
    'use strict';

    if (window.__superarseTrackerLoaded) {
        return;
    }
    window.__superarseTrackerLoaded = true;

    var INTERACTIVE = 'a, button, input[type="submit"], input[type="button"], input[type="reset"], [role="button"], summary, label[for], img, form, .btn, [onclick], [data-track]';
    var lastSent = Object.create(null);

    function resolveEndpoint() {
        if (typeof window.SUPERARSE_TRACKER_ENDPOINT === 'string' && window.SUPERARSE_TRACKER_ENDPOINT) {
            return window.SUPERARSE_TRACKER_ENDPOINT;
        }
        var scripts = document.getElementsByTagName('script');
        for (var i = scripts.length - 1; i >= 0; i--) {
            var src = scripts[i].src || '';
            if (/tracker\.js(\?|$)/.test(src)) {
                try {
                    return new URL('../../api/analytics/log-event.php', src).href;
                } catch (err) { /* fallback abajo */ }
            }
        }
        return APP.asset('api/analytics/log-event.php');
    }

    var ENDPOINT = resolveEndpoint();

    function clean(value, max) {
        if (value === null || value === undefined) {
            return null;
        }
        var text = String(value).replace(/\s+/g, ' ').trim();
        if (!text) {
            return null;
        }
        return text.length > max ? text.slice(0, max) : text;
    }

    function elementText(el) {
        if (!el || !el.getAttribute) {
            return null;
        }
        if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
            return clean(el.getAttribute('value') || el.getAttribute('placeholder') || el.getAttribute('aria-label'), 255);
        }
        // Etiqueta explícita para analítica (gana sobre el texto visible)
        if (el.hasAttribute && el.hasAttribute('data-analytics-label')) {
            return clean(el.getAttribute('data-analytics-label'), 255);
        }
        var text = clean(el.innerText || el.textContent || '', 255);
        if (text) {
            return text;
        }
        var img = el.querySelector ? el.querySelector('img[alt]') : null;
        if (img && img.getAttribute('alt')) {
            return clean(img.getAttribute('alt'), 255);
        }
        return clean(
            el.getAttribute('alt') ||
            el.getAttribute('aria-label') ||
            el.getAttribute('title') ||
            el.getAttribute('name'), 255
        );
    }

    function contextTitle(el) {
        if (!el || !el.closest) {
            return null;
        }
        var wrap = el.closest('.card, .testimonial-item, .owl-item, article, .carousel-item, [class*="card"], [class*="titulo-card"], li, .item');
        if (!wrap) {
            return null;
        }
        var headings = wrap.querySelectorAll('h1, h2, h3, h4, h5, h6, [itemprop="name"], [class*="title"], [class*="titulo"]');
        for (var i = 0; i < headings.length; i++) {
            var t = clean(headings[i].innerText || headings[i].textContent || '', 80);
            if (t && t.length <= 80) {
                return t;
            }
        }
        return null;
    }

    function enrichedText(el) {
        var own = elementText(el);
        if (!own) {
            return null;
        }
        var ctx = contextTitle(el);
        if (ctx) {
            var a = own.toLowerCase();
            var b = ctx.toLowerCase();
            if (a !== b && a.indexOf(b) === -1 && b.indexOf(a) === -1) {
                return clean(ctx + ' · ' + own, 255);
            }
        }
        return own;
    }

    function friendlySectionName(el) {
        var label = el.getAttribute('data-title') || el.getAttribute('aria-label') || el.id ||
            (el.className && typeof el.className === 'string' ? el.className.split(/\s+/)[0] : '');
        label = clean(label, 100);
        if (label) {
            return label;
        }
        return el.tagName.toLowerCase() === 'section' ? 'Sección' : el.tagName.toLowerCase();
    }

    function resolveSection(el) {
        if (!el || !el.closest) {
            return 'General';
        }

        var explicit = el.closest('[data-section]');
        if (explicit) {
            return clean(explicit.getAttribute('data-section'), 100) || friendlySectionName(explicit);
        }

        // Mallas curriculares: cualquier enlace cuyo texto hable de "malla"
        var ownText = clean(el.innerText || el.textContent || '', 255);
        if (ownText && /malla/i.test(ownText)) {
            return 'Malla Curricular';
        }

        // Documentos descargables (PDF/DOC/XLS) o enlaces con atributo download
        if (el.tagName === 'A') {
            var href = el.getAttribute('href') || '';
            if (el.hasAttribute('download') || /\.(pdf|docx?|xlsx?|pptx?|zip)(\?|$)/i.test(href)) {
                return 'Documentos';
            }
        }

        if (el.closest('.oferta-academica, #proximo-modulo, [class*="oferta"], [id*="oferta"], [class*="carrera"], [id*="carrera"], [class*="career"]')) {
            return 'Oferta Académica';
        }
        if (el.closest('.noticias-header-carousel-container, [class*="banner"], [id*="banner"], .carousel, [class*="slider"], [class*="hero"]')) {
            return 'Banners';
        }
        if (el.closest('.footer-container, footer, [class*="footer"]')) {
            return 'Footer / Contacto';
        }
        if (el.closest('nav, .navbar, #header-container, [class*="menu"], [id*="menu"], [class*="submenu"]')) {
            return 'Menú';
        }

        var semantic = el.closest('section, main, header, aside');
        if (semantic) {
            return friendlySectionName(semantic);
        }
        return 'General';
    }

    function matches(el) {
        if (!el || el.nodeType !== 1 || typeof el.matches !== 'function') {
            return false;
        }
        try {
            return el.matches(INTERACTIVE);
        } catch (err) {
            return false;
        }
    }

    function findTrackedElement(target) {
        var node = target;
        var fallback = null;
        while (node && node !== document.body && node !== document.documentElement) {
            if (matches(node)) {
                if (!fallback) {
                    fallback = node;
                }
                if (elementText(node)) {
                    return node;
                }
            }
            node = node.parentElement;
        }
        return fallback;
    }

    function send(event) {
        var payload = {
            event_type: event.event_type,
            section_name: clean(event.section_name, 100),
            element_text: clean(event.element_text, 255),
            element_id: clean(event.element_id, 100),
            element_class: clean(event.element_class, 255),
            element_tag: clean(event.element_tag, 20),
            page_url: clean(location.href, 500) || '/'
        };

        var key = [payload.event_type, payload.section_name, payload.element_text, payload.element_id].join('|');
        var now = Date.now();
        if (lastSent[key] && now - lastSent[key] < 400) {
            return;
        }
        lastSent[key] = now;

        var body = JSON.stringify(payload);
        try {
            if (navigator.sendBeacon) {
                var blob = new Blob([body], { type: 'application/json' });
                if (navigator.sendBeacon(ENDPOINT, blob)) {
                    return;
                }
            }
        } catch (err) { /* fallback a fetch */ }

        if (typeof fetch === 'function') {
            fetch(ENDPOINT, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: body,
                keepalive: true,
                credentials: 'omit'
            }).catch(function () { /* sin bloquear la UI */ });
        }
    }

    document.addEventListener('click', function (event) {
        var target = event.target;
        if (!target) {
            return;
        }

        // Los clics en campos de formulario se capturan vía el evento submit
        if (target.closest && target.closest('input:not([type="submit"]):not([type="button"]):not([type="reset"]), textarea, select')) {
            return;
        }

        // Etiqueta explícita en el elemento o un ancestro (gana sobre texto/alt visibles)
        var labeled = target.closest ? target.closest('[data-analytics-label]') : null;
        var el = labeled || findTrackedElement(target);
        if (!el) {
            return;
        }

        // Un <form> solo cuenta si el clic fue sobre el formulario mismo o su botón
        if (el.tagName === 'FORM' && target !== el) {
            return;
        }

        // Cerrar ventanas (×) es ruido en los reportes
        if (/^[×✕✖]$/.test(elementText(el) || '')) {
            return;
        }

        send({
            event_type: 'click',
            section_name: resolveSection(el),
            element_text: enrichedText(el) || el.tagName.toLowerCase(),
            element_id: el.id || null,
            element_class: clean(el.className && typeof el.className === 'string' ? el.className : '', 255),
            element_tag: el.tagName.toLowerCase()
        });
    });

    document.addEventListener('submit', function (event) {
        var form = event.target;
        if (!form || form.tagName !== 'FORM') {
            return;
        }
        var button = form.querySelector('button[type="submit"], input[type="submit"], button:not([type])');
        send({
            event_type: 'submit',
            section_name: resolveSection(form),
            element_text: elementText(button) || clean(form.getAttribute('action') || form.id || 'Formulario', 255),
            element_id: form.id || null,
            element_class: clean(form.className || '', 255),
            element_tag: 'form'
        });
    });

    function trackPageView() {
        send({
            event_type: 'page_view',
            section_name: 'Página',
            element_text: document.title || null,
            element_id: null,
            element_class: null,
            element_tag: 'page'
        });
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', trackPageView);
    } else {
        trackPageView();
    }
})();
