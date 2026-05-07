<?php

$footer = dw_get_navigation_links('footer');//Un menu de navigation du nom de 'footer'


$number_phone = get_field('number_phone');
$email = get_field('email');
$linkedin = get_field('linkedin');
$github = get_field('github');
$logo = get_field('logo');

?>


<!-- Afficher la navigation du footer -->
<footer class="footer">
    <div class="footer__container">
        <img class="footer__image" src="<?= $logo['url'] ?>"
             alt="<?= $logo['alt'] ?>"
        >
        <!-- Navigation -->
        <nav class="footer__nav" aria-labelledby="  footer-nav-title">
            <h2 class="footer__title">Navigation</h2>
            <ul class="footer__list" role="list">
                <?php foreach ($footer as $link) : ?>
                    <li class="footer__item">
                        <a class="footer__link" href="<?= $link->href ?>"><?= $link->label ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <!-- Coordonnées -->
        <section class="footer__infos" aria-labelledby="footer-contact-title">
            <h2 class="footer__title">Coordonnées</h2>

            <address class="footer__address">
                <ul class="footer__contact-list">
                    <li class="footer__item">
                        <?php if (!empty($number_phone)): ?>
                            <a href="<?= $number_phone['url'] ?>" class="footer__link"><?= $number_phone['title'] ?></a>
                        <?php endif; ?>
                    </li>
                    <li class="footer__item">
                        <?php if (!empty($email)): ?>
                            <a href="mailto:<?= antispambot($email); ?>"
                               class="footer__link"><?= antispambot($email); ?></a>
                        <?php endif; ?>
                    </li>
                    <li class="footer__item">
                        <?php if (!empty($linkedin)): ?>
                            <a href="<?= $linkedin['url'] ?>" class="footer__link"><?= $linkedin['title'] ?></a>
                        <?php endif; ?>
                    </li>
                    <li class="footer__item">
                        <?php if (!empty($github)): ?>
                            <a href="<?= $github['url'] ?>" class="footer__link"><?= $github['title'] ?></a>
                        <?php endif; ?>
                    </li>
                </ul>
            </address>
        </section>
    </div>
    <div class="footer__bottom">
        <a class="footer__item-condition" href="#">Mentions légales</a>


        <p class="footer__copyright">
            <strong>©2026</strong> Créé par Marie Jacquemin-Fanti. Tous droits réservés.
        </p>
    </div>
</footer>
</body>
</html>