(function () {
  const canvas = document.getElementById('signature-pad');
  const ctx = canvas.getContext('2d');
  const clearButton = document.getElementById('limpiar');
  const signatureInput = document.getElementById('firma_data');
  let isDrawing = false;
  let lastX = 0;
  let lastY = 0;

  function resizeCanvas() {
    const rect = canvas.getBoundingClientRect();
    canvas.width = rect.width;
    canvas.height = rect.height;
    ctx.strokeStyle = '#2d3748';
    ctx.lineWidth = 2;
    ctx.lineJoin = 'round';
    ctx.lineCap = 'round';
  }

  function draw(e) {
    if (!isDrawing) return;
    const rect = canvas.getBoundingClientRect();
    const x = (e.clientX || e.touches[0].clientX) - rect.left;
    const y = (e.clientY || e.touches[0].clientY) - rect.top;
    ctx.beginPath();
    ctx.moveTo(lastX, lastY);
    ctx.lineTo(x, y);
    ctx.stroke();
    [lastX, lastY] = [x, y];
  }

  canvas.addEventListener('mousedown', (e) => {
    isDrawing = true;
    const rect = canvas.getBoundingClientRect();
    [lastX, lastY] = [e.clientX - rect.left, e.clientY - rect.top];
  });
  canvas.addEventListener('mousemove', draw);
  canvas.addEventListener('mouseup', () => {
    isDrawing = false;
    signatureInput.value = canvas.toDataURL();
  });
  canvas.addEventListener('mouseout', () => isDrawing = false);

  canvas.addEventListener('touchstart', (e) => {
    isDrawing = true;
    const rect = canvas.getBoundingClientRect();
    [lastX, lastY] = [e.touches[0].clientX - rect.left, e.touches[0].clientY - rect.top];
    e.preventDefault();
  });
  canvas.addEventListener('touchmove', draw);
  canvas.addEventListener('touchend', () => {
    isDrawing = false;
    signatureInput.value = canvas.toDataURL();
  });

  clearButton.addEventListener('click', () => {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    signatureInput.value = '';
  });

  window.addEventListener('load', resizeCanvas);
  window.addEventListener('resize', resizeCanvas);
})();