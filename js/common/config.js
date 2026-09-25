/**
 * Configuración del lado del navegador.
 *
 * No hay paso de compilación en este proyecto, así que la ruta base se resuelve
 * en tiempo de ejecución en este orden:
 *
 *   1. window.SUPERARSE_CONFIG  — inyectado por PHP desde el .env (layouts MVC).
 *   2. La propia URL de este archivo — cubre index.html y cualquier página
 *      estática: ".../js/common/config.js" -> base ".../".
 *
 * Con eso el mismo código sirve para la raíz del dominio y para una subcarpeta.
 *
 * Uso:
 *   APP.asset('img/logo.png')  -> '/PaginaWebMVC/img/logo.png'
 *   APP.url('ECSOS')           -> '/PaginaWebMVC/ECSOS'
 *   APP.absolute('ECSOS')      -> 'https://superarse.edu.ec/PaginaWebMVC/ECSOS'
 *
 * Las URLs externas (http://, mailto:, wa.me), anclas (#) y query strings (?text=)
 * se devuelven sin tocar.
 */
(function (global) {
  'use strict';

  if (global.APP && global.APP.__superarse) { return; }

  var SELF_RELATIVE_PATH = '/js/common/config.js';
  var injected = global.SUPERARSE_CONFIG || {};

  // ── 1. Detectar la base a partir de la URL de este mismo archivo ───────
  var detectedBase = '';
  var detectedOrigin = '';

  try {
    detectedOrigin = global.location.origin || '';
  } catch (error) {
    detectedOrigin = '';
  }

  try {
    var script = document.currentScript;
    if (script && script.src) {
      var here = new URL(script.src, global.location.href);
      var marker = here.pathname.lastIndexOf(SELF_RELATIVE_PATH);
      detectedBase = marker > 0 ? here.pathname.slice(0, marker) : '';
      if (!detectedOrigin) { detectedOrigin = here.origin || ''; }
    }
  } catch (error) {
    detectedBase = detectedBase || '';
  }

  // ── 2. Resolver valores finales ─────────────────────────────────────────
  function normalizeBase(value) {
    if (typeof value !== 'string') { return ''; }
    var cleaned = value.replace(/\\/g, '/').replace(/^\/+|\/+$/g, '');
    return cleaned === '' ? '' : '/' + cleaned;
  }

  var base = normalizeBase(typeof injected.base === 'string' ? injected.base : detectedBase);
  var origin = (typeof injected.origin === 'string' && injected.origin)
    ? injected.origin.replace(/\/+$/, '')
    : detectedOrigin;

  var EXTERNAL = /^(?:[a-z][a-z0-9+.-]*:|\/\/)/i;

  function isExternal(path) {
    if (typeof path !== 'string' || path === '') { return false; }
    var first = path.charAt(0);
    return first === '#' || first === '?' || EXTERNAL.test(path);
  }

  function url(path) {
    if (path === undefined || path === null || path === '') {
      return base === '' ? '/' : base + '/';
    }
    path = String(path);
    if (isExternal(path)) { return path; }
    if (base !== '' && path.indexOf(base + '/') === 0) { return path; }
    return base + '/' + path.replace(/^\/+/, '');
  }

  function absolute(path) {
    if (isExternal(path)) { return String(path); }
    return origin + url(path);
  }

  var settings = {
    env: typeof injected.env === 'string' ? injected.env : 'production',
    siteName: typeof injected.siteName === 'string' ? injected.siteName : 'Instituto Superarse'
  };

  global.APP = {
    __superarse: true,
    base: base,
    origin: origin,
    env: settings.env,
    siteName: settings.siteName,
    url: url,
    asset: url,
    route: url,
    absolute: absolute,
    cfg: function (key, fallback) {
      if (Object.prototype.hasOwnProperty.call(injected, key) && injected[key] !== undefined) {
        return injected[key];
      }
      return fallback;
    }
  };

  // Alias heredado del tracker de analítica
  if (!global.SUPERARSE_TRACKER_ENDPOINT) {
    global.SUPERARSE_TRACKER_ENDPOINT = url('api/analytics/log-event.php');
  }
})(window);
