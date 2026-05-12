<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= get_the_title(); ?> | Marie Jacquemin-Fanti</title>
    <link rel="stylesheet" type="text/css" href="<?= dw_asset('css'); ?>">
    <script defer src="<?= dw_asset('js') ?>"></script>
    <meta name="description"
          content="Portfolio de Marie Jacquemin-Fanti, UI/UX Designer. Découvrez mes projets et apprenez à me connaître.">
    <meta name="author" content="Marie Jacquemin-Fanti">
    <meta itemprop="name" content="Portfolio de Marie Jacquemin-Fanti, UI/UX Designer">
    <meta name="keywords"
          content="Portfolio, UI/UX Designer, Carnet de croquis, Marie Jacquemin-Fanti, Optimisation, Accessibilité, SEO, Contact, Projets web,Front-end,Back-end,Compétences, CV en ligne">

    <meta property="og:title" content="Marie Jacquemin-Fanti — UI/UX Designer">

    <meta property="og:description"
          content="Découvrez mes projets UI/UX et mon univers créatif.">

    <meta property="og:image"
          content="https://monsite.be/share.jpg">

    <meta property="og:url" content="https://monsite.be">
</head>


<body>
<!-- Navigation principale -->
<nav class="navigation">
    <h2 class="sro">Menu de navigation</h2>
    <button class="navigation__burger" aria-label="Ouvrir le menu">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <ul class="navigation__menu">
        <?php foreach (dw_get_navigation_links('header') as $link) : ?>
            <li class="navigation__list-item">
                <a class="navigation__link" href="<?= $link->href ?>"><?= $link->label ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
</nav>

