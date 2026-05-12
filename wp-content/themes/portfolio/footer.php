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
             alt=""
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
                            <a href="tel:+33619997118" class="footer__link">+33 6 19 99 71 18</a>
                    </li>
                    <li class="footer__item">
                            <a href="mailto:<?= antispambot($email); ?>"
                               class="footer__link">mariejacqueminfanti@gmail.com</a>
                    </li>
                    <li class="footer__item">
                            <a href="https://www.linkedin.com/in/marie-jacquemin-fanti-408466250/" class="footer__link">Linkedin</a>
                    </li>
                    <li class="footer__item">
                            <a href="https://github.com/marie-jacquemin-fanti" class="footer__link">GitHub</a>
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