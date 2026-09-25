<?php
declare(strict_types=1);
$tipos = $model->tipos();
?>
<div class="container">
    <div class="header">
        <i class="fas fa-comments"></i>
        <h1>Buzón de Cumplidos, Sugerencias y Quejas</h1>
        <p>Instituto Tecnológico Superarse</p>
    </div>

    <div class="content">
        <div class="info-box">
            <p><i class="fas fa-lock"></i><strong>Tu mensaje es completamente anónimo.</strong></p>
            <p><i class="fas fa-info-circle"></i>Tus comentarios son importantes para nosotros y nos ayudan a mejorar continuamente.</p>
        </div>

        <div id="alertBox" class="alert"></div>

        <form id="buzonForm">
            <div class="form-group">
                <label for="tipo">
                    <i class="fas fa-tag"></i>Tipo de mensaje:
                </label>
                <select id="tipo" name="tipo" required>
                    <option value="">Seleccione una opción...</option>
                    <?php foreach ($tipos as $valor => $etiqueta): ?>
                        <option value="<?= htmlspecialchars((string) $valor, ENT_QUOTES, 'UTF-8') ?>"><?= htmlspecialchars((string) $etiqueta, ENT_QUOTES, 'UTF-8') ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="form-group">
                <label for="mensaje">
                    <i class="fas fa-pencil-alt"></i>Tu mensaje:
                </label>
                <textarea
                    id="mensaje"
                    name="mensaje"
                    placeholder="Escribe aquí tu mensaje de forma anónima... Sé claro y específico para que podamos entender mejor tu punto de vista."
                    required
                    maxlength="1500"
                ></textarea>
                <div class="char-counter">
                    <span id="charCount">0</span>/1500 caracteres
                </div>
            </div>

            <button type="submit" class="submit-btn" id="submitBtn">
                <i class="fas fa-paper-plane"></i>
                Enviar mensaje
            </button>
        </form>
    </div>

    <div class="footer">
        <p><strong>Instituto Tecnológico Superarse</strong></p>
        <p> 📧 <a href="mailto:bienestar@superarse.edu.ec">bienestar@superarse.edu.ec</a> <a href="https://wa.me/593998409293" target="_blank" aria-label="WhatsApp">
    <i class="fab fa-whatsapp"></i> 099 840 9293</a></p>
    <p><a href="https://www.superarse.edu.ec" target="_blank">www.superarse.edu.ec</a></p>
        </div>
    </div>