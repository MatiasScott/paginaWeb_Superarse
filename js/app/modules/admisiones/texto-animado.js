(function () {
  var elemento = document.getElementById('texto-animado');
  if (!elemento) { return; }

  var frases;
  try {
    frases = JSON.parse(elemento.getAttribute('data-frases') || '[]');
  } catch (e) {
    return;
  }
  if (!Array.isArray(frases) || frases.length === 0) { return; }

  var indice = 0;

  function render() {
    elemento.textContent = '';
    (frases[indice % frases.length] || []).forEach(function (segmento) {
      var span = document.createElement('span');
      span.textContent = segmento.texto;
      span.style.color = segmento.color;
      elemento.appendChild(span);
    });
    indice = (indice + 1) % frases.length;
  }

  render();
  setInterval(render, 2000);
})();