<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= get_the_title() ?></title>
    <link rel="stylesheet" type="text/css" href="<?= dw_asset('css'); ?>">
    <script src="<?= dw_asset('js') ?>" defer></script>
</head>


<body>

<!-- Navigation homemade -->
<nav class="navigation">
    <h2 class="sro">Menu de navigation</h2>
    <ul class="navigation__list">
        <?php foreach (dw_get_navigation_links('header') as $link) : ?>
            <li class="navigation__list-item">
                <a class="navigation__link" href="<?= $link->href ?>"><?= $link->label ?></a>
            </li>
        <?php endforeach; ?>

        <!-- Fait apparaitre le FR et EN sur la page accueil -->
       <!-- <?php /*foreach (pll_the_languages(['raw' => true]) as $lang): */?>
            <li class="navigation__list-item-language <?php /*= $lang['current_lang'] ? 'navigation__list-item-language--active' : '' */?>">
                <a class="navigation__link-language" lang="<?php /*= $lang['locale'] */?>"
                   hreflang="<?php /*= $lang['locale'] */?>"
                   href="<?php /*= $lang['url'] */?>"><?php /*= strtoupper($lang['slug']) */?></a>
            </li>
        --><?php /*endforeach; */?>

    </ul>

</nav>

