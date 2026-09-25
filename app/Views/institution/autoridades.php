<?php
declare(strict_types=1);
// Vista MVC Institución - autoridades (organigrama jerárquico)
$title = $title ?? 'Organigrama Institucional | Superarse';
$kicker = $kicker ?? '';
$introParagraphs = $introParagraphs ?? [];
$defaultImage = $defaultImage ?? asset('assets/img/user-default.png');
$auths = $auths ?? [];

$escape = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

$renderCard = static function (?array $authority) use ($escape, $defaultImage): void {
    if ($authority === null) {
        return;
    }

    $img = $authority['img'] !== '' ? $escape($authority['img']) : $escape($defaultImage);
    $name = $escape($authority['name'] !== '' ? $authority['name'] : 'Por asignar');
    $pos = $escape((string) $authority['pos']);
    $email = $escape((string) $authority['email']);
    ?>
            <div class="auth-card">
                <div class="auth-img-container">
                    <img class="auth-img"
                         src="<?= $img ?>"
                         onerror="this.onerror=null;this.src='<?= $escape($defaultImage) ?>';"
                         loading="lazy"
                         alt="<?= $name ?>">
                </div>
                <p class="auth-name"><?= $name ?></p>
                <span class="auth-pos"><?= $pos ?></span>
                <a href="mailto:<?= $email ?>" class="auth-email"><?= $email ?></a>
            </div>
    <?php
};

ob_start();
?>
<div class="container-fluid espaciado-menu">
    <div class="container investigacion-shell"></div>
        <div class="text-center mb-5">
            <p class="section-title px-5">
                <span class="px-2"><?= $escape($kicker) ?></span>
            </p>
            <h1 class="display-4 fw-bold mt-2"><?= $escape($title) ?></h1>
            <div class="section-title-line"></div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-10 mb-4">
                <div class="card-main p-4 h-100">
                    <div class="mensaje-texto text-muted lh-lg" style="text-align: justify;">
                        <?php foreach ($introParagraphs as $parrafo): ?>
                            <p><?= $escape($parrafo) ?></p>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="tree">
                <ul>
                    <li>
                        <div id="node-rector"><?php $renderCard($auths['node-rector'] ?? null); ?></div>
                        <ul>
                            <li>
                                <div id="node-secretaria"><?php $renderCard($auths['node-secretaria'] ?? null); ?></div>
                                <ul>
                                    <li>
                                        <div id="node-vicerrector"><?php $renderCard($auths['node-vicerrector'] ?? null); ?></div>
                                        <ul>
                                            <li>
                                                <div id="node-dir-docencia"><?php $renderCard($auths['node-dir-docencia'] ?? null); ?></div>
                                                <ul class="vertical-stack">
                                                    <li><div id="coor-admin"><?php $renderCard($auths['coor-admin'] ?? null); ?></div></li>
                                                    <li><div id="coor-vet"><?php $renderCard($auths['coor-vet'] ?? null); ?></div></li>
                                                    <li><div id="coor-const"><?php $renderCard($auths['coor-const'] ?? null); ?></div></li>
                                                    <li><div id="coor-diseno"><?php $renderCard($auths['coor-diseno'] ?? null); ?></div></li>
                                                </ul>
                                            </li>
                                            <li><div id="node-dir-invest"><?php $renderCard($auths['node-dir-invest'] ?? null); ?></div></li>
                                            <li>
                                                <div id="node-dir-vinc"><?php $renderCard($auths['node-dir-vinc'] ?? null); ?></div>
                                                <ul class="vertical-stack">
                                                 <!--  <li><div id="coor-prac"></div></li> ---->
                                                  <!--  <li><div id="coor-prog"></div></li>  -->
                                                    <li><div id="coor-rel"><?php $renderCard($auths['coor-rel'] ?? null); ?></div></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <div id="node-admin"><?php $renderCard($auths['node-admin'] ?? null); ?></div>
                                        <ul class="vertical-stack">
                                            <li><div id="coor-comer"><?php $renderCard($auths['coor-comer'] ?? null); ?></div></li>
                                            <li><div id="coor-calidad"><?php $renderCard($auths['coor-calidad'] ?? null); ?></div></li>
                                            <li><div id="coor-th"><?php $renderCard($auths['coor-th'] ?? null); ?></div></li>
                                            <li><div id="coor-bien"><?php $renderCard($auths['coor-bien'] ?? null); ?></div></li>
                                            <li><div id="coor-biblio"><?php $renderCard($auths['coor-biblio'] ?? null); ?></div></li>
                                            <li><div id="coor-tics"><?php $renderCard($auths['coor-tics'] ?? null); ?></div></li>
                                            <li><div id="coor-fin"><?php $renderCard($auths['coor-fin'] ?? null); ?></div></li>
                                           <!-- <li><div id="coor-edu-cont"></div></li>  -->
                                        </ul>
                                    </li>
                                    <li>
                                        <div id="node-infra"><?php $renderCard($auths['node-infra'] ?? null); ?></div>

                                        <!--    <li><div id="coor-seg"></div></li>
                                            <li><div id="coor-mant"></div></li> -->

                                    </li>
                                    <li>
                                        <div id="node-comer"><?php $renderCard($auths['node-comer'] ?? null); ?></div>
                                        <ul class="vertical-stack">
                                            <li><div id="coor-com-est"><?php $renderCard($auths['coor-com-est'] ?? null); ?></div></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require dirname(__DIR__) . '/layouts/main.php';