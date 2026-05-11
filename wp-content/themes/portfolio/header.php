<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= get_the_title() ?></title>
    <link rel="stylesheet" type="text/css" href="<?= dw_asset('css'); ?>">
    <script defer src="<?= dw_asset('js') ?>" ></script>
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

