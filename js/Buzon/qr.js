   // Obtener la URL completa del buzón
        // Detectar si estamos en desarrollo o producción
        const isLocalhost = window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1';
        const buzonURL = isLocalhost 
            ? window.location.origin + '/landing_frontend_superarse_v2/pages/buzon.html'
            : window.location.origin + '/pages/buzon.html';
        document.getElementById('urlText').textContent = buzonURL;

        // Actualizar enlace del botón
        document.getElementById('linkBuzon').href = buzonURL;

        // Generar el código QR
        const qrcode = new QRCode(document.getElementById("qrcode"), {
            text: buzonURL,
            width: 256,
            height: 256,
            colorDark: "#000000",
            colorLight: "#ffffff",
            correctLevel: QRCode.CorrectLevel.H
        });

        // Función para descargar el QR
        function descargarQR() {
            const canvas = document.querySelector('#qrcode canvas');
            if (canvas) {
                // Crear un canvas más grande con padding y texto
                const finalCanvas = document.createElement('canvas');
                const ctx = finalCanvas.getContext('2d');
                const padding = 40;
                const textHeight = 60;
                
                finalCanvas.width = canvas.width + (padding * 2);
                finalCanvas.height = canvas.height + (padding * 2) + textHeight;
                
                // Fondo blanco
                ctx.fillStyle = '#ffffff';
                ctx.fillRect(0, 0, finalCanvas.width, finalCanvas.height);
                
                // Dibujar el QR
                ctx.drawImage(canvas, padding, padding);
                
                // Agregar texto
                ctx.fillStyle = '#333333';
                ctx.font = 'bold 18px Arial';
                ctx.textAlign = 'center';
                ctx.fillText('Buzón Institucional', finalCanvas.width / 2, canvas.height + padding + 30);
                
                ctx.font = '14px Arial';
                ctx.fillText('Instituto Tecnológico Superarse', finalCanvas.width / 2, canvas.height + padding + 50);
                
                // Descargar
                const link = document.createElement('a');
                link.download = 'buzon-qr-superarse.png';
                link.href = finalCanvas.toDataURL('image/png');
                link.click();
            } else {
                alert('Error: No se pudo generar la imagen del QR');
            }
        }

        // Función para imprimir el QR
        function imprimirQR() {
            const printWindow = window.open('', '', 'height=600,width=800');
            const qrImage = document.querySelector('#qrcode img');
            
            if (qrImage) {
                printWindow.document.write('<html><head><title>Imprimir Código QR</title>');
                printWindow.document.write('<style>');
                printWindow.document.write('body { text-align: center; font-family: Arial, sans-serif; padding: 40px; }');
                printWindow.document.write('h1 { color: #333; margin-bottom: 10px; }');
                printWindow.document.write('p { color: #666; margin: 10px 0; }');
                printWindow.document.write('img { margin: 30px 0; border: 2px solid #ddd; padding: 20px; }');
                printWindow.document.write('.url { font-family: Courier; background: #f5f5f5; padding: 15px; margin: 20px auto; max-width: 500px; word-break: break-all; }');
                printWindow.document.write('</style>');
                printWindow.document.write('</head><body>');
                printWindow.document.write('<h1>📬 Buzón de Cumplidos, Sugerencias y Quejas</h1>');
                printWindow.document.write('<p><strong>Instituto Tecnológico Superarse</strong></p>');
                printWindow.document.write('<p>Escanea este código QR con tu celular para acceder al buzón anónimo</p>');
                printWindow.document.write('<img src="' + qrImage.src + '" />');
                printWindow.document.write('<div class="url">URL: ' + buzonURL + '</div>');
                printWindow.document.write('<p style="margin-top: 40px; font-size: 12px;">Tu opinión es importante • Mensaje anónimo • Confidencial</p>');
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                
                setTimeout(() => {
                    printWindow.print();
                }, 250);
            } else {
                alert('Error: No se pudo cargar el código QR');
            }
        }