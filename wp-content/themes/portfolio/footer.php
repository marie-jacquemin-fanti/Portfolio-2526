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
        <img class="footer__image" src="<?php echo get_template_directory_uri(); ?>/assets/images/litle-me.svg"
             alt="Illustration de profil"
        >
        <!-- Navigation -->
        <nav class="footer__nav" aria-labelledby="footer-nav-title">
            <h2 id="footer-nav-title" class="footer__title">Navigation</h2>
            <ul class="footer__list" role="list">
                <?php foreach ($footer as $link) : ?>
                    <li class="footer__item">
                        <a class="footer__link" href="<?= esc_url($link->href); ?>"><?= esc_html($link->label); ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <!-- Coordonnées -->
        <section class="footer__infos" aria-labelledby="footer-contact-title" itemscope
                 itemtype="https://schema.org/Person">
            <h2 id="footer-contact-title" class="footer__title">Coordonnées</h2>

            <address class="footer__address">
                <ul class="footer__contact-list">
                    <li class="footer__item">
                        <a href="tel:+33619997118" class="footer__link" itemprop="telephone"
                           aria-label="Appeler le numéro +33 6 19 99 71 18">+33 6 19 99 71 18</a>
                    </li>
                    <li class="footer__item">
                        <a href="mailto:<?= antispambot($email); ?>"
                           class="footer__link" itemprop="email">mariejacqueminfanti@gmail.com</a>
                    </li>
                    <li class="footer__item">
                        <a href="https://www.linkedin.com/in/marie-jacquemin-fanti-408466250/" class="footer__link"
                           itemprop="sameAs">Linkedin</a>
                    </li>
                    <li class="footer__item">
                        <a href="https://github.com/marie-jacquemin-fanti" class="footer__link"
                           itemprop="sameAs">GitHub</a>
                    </li>
                </ul>
            </address>
        </section>
    </div>
    <div class="footer__bottom">
        <p class="footer__copyright"><?= __('Mentions légales', 'hepl-trad'); ?></p>

        <p class="footer__copyright">
            <strong>©2026</strong>
            <?= __('Créé par', 'hepl-trad'); ?>
            <span itemprop="name">Marie Jacquemin-Fanti</span>.
            <?= __('Tous droits réservés.', 'hepl-trad'); ?>
        </p>
    </div>
</footer>
</body>
</html>