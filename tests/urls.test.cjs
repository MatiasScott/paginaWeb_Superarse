const assert = require('node:assert/strict');
const fs = require('node:fs');
const path = require('node:path');
const test = require('node:test');
const vm = require('node:vm');

const source = fs.readFileSync(path.join(__dirname, '..', 'js', 'common', 'config.js'), 'utf8');

for (const base of ['', '/paginaWeb_Superarse']) {
  for (const injected of [false, true]) {
    test(`URLs with base "${base}" (${injected ? 'PHP config' : 'script detection'})`, () => {
      const window = { location: { origin: 'http://localhost', href: `http://localhost${base}/ECSOS/topografia` } };
      if (injected) window.SUPERARSE_CONFIG = { base, origin: 'http://localhost' };
      const document = { currentScript: { src: `http://localhost${base}/js/common/config.js` } };
      vm.runInNewContext(source, { window, document, URL });
      const app = window.APP;
      assert.equal(app.base, base);
      assert.equal(app.url('/balancesAuditados2025'), `${base}/balancesAuditados2025`);
      assert.equal(app.url('Solicitudes/subir?tipo=contrato'), `${base}/Solicitudes/subir?tipo=contrato`);
      assert.equal(app.url('/MARKETING_DISEÑO_MULTIMEDIA'), `${base}/MARKETING_DISEÑO_MULTIMEDIA`);
      assert.equal(app.url(app.url('ECSOS')), `${base}/ECSOS`);
      assert.equal(app.url(base), base || '/');
      assert.equal(app.absolute('ECSOS'), `http://localhost${base}/ECSOS`);
      for (const value of ['#', '#panel', '?tipo=contrato', 'https://example.com/x', '//example.com/x', 'mailto:a@example.com', 'tel:123']) {
        assert.equal(app.url(value), value);
      }
    });
  }
}

for (const renderer of [
  ['js', 'app', 'layout', 'header', 'headerRenderer.js'],
  ['js', 'moduls', 'core', 'header-module.js'],
  ['js', 'main.js']
]) {
  for (const base of ['', '/paginaWeb_Superarse']) {
    test(`Header logo ${renderer.join('/')} with base "${base}"`, () => {
      const container = { dataset: {}, innerHTML: '' };
      const window = {
        location: { origin: 'http://localhost', href: `http://localhost${base}/Balances-Auditados` },
        SUPERARSE_CONFIG: { base, origin: 'http://localhost' },
        addEventListener: () => {}
      };
      const document = { querySelector: () => container, addEventListener: () => {} };
      const jqueryChain = {};
      for (const method of ['ready', 'scroll', 'click', 'isotope', 'on', 'owlCarousel']) {
        jqueryChain[method] = () => jqueryChain;
      }
      const context = vm.createContext({
        window, document, URL, jQuery: () => jqueryChain,
        headerData: { topbar: [], mainNav: [], finalLink: { enlace: '#', clases: '', texto: '' } }
      });
      vm.runInContext(source, context);
      context.APP = window.APP;
      vm.runInContext(fs.readFileSync(path.join(__dirname, '..', ...renderer), 'utf8'), context);
      vm.runInContext('generarHeader()', context);
      assert.ok(container.innerHTML.includes(`<a href="${base}/" class="navbar-brand">`));
      assert.ok(container.innerHTML.includes(`<img src="${base}/assets/img/content/logo/superarse_gris.png"`));
      assert.ok(!container.innerHTML.includes('=APP.'));
      const html = container.innerHTML;
      vm.runInContext('generarHeader()', context);
      assert.equal(container.innerHTML, html);
    });
  }
}
