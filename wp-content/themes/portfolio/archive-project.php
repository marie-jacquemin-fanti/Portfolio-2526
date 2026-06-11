<?php
$filter = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';

$args = [
    'post_type' => 'project',
    'post_status' => 'publish',
    'posts_per_page' => 3,
];

if ($filter !== '') {
    $args['tax_query'] = [
        [
            'taxonomy' => 'project_category',
            'field' => 'slug',
            'terms' => $filter,
        ]
    ];
}

$query = new WP_Query($args);

?>
<?php get_header(); ?>
<?php
$langue = pll_current_language(); // retourne 'fr' ou 'en'
$header = get_field('header_' . $langue, 'option');

$terms = get_terms([
    'taxonomy' => 'project_category',
    'hide_empty' => true,
]);


?>
    <main itemscope itemtype="https://schema.org/CollectionPage">

    <h1 class="title_page"><?= esc_html($header) ?></h1>

    <nav aria-label="Filtres des projets" class="ressourcesnav">
        <h2 class="sro">Filter</h2>
        <ul class="ressourcesfilter-list">
            <li class="ressourcesfilter-item">
                <a href="<?= get_post_type_archive_link('project') ?>" class="ressourcesfilter-link <?= $filter === '' ? 'active' : '' ?>">
                    Tout
                </a>
            </li>
            <?php foreach ($terms as $term) : ?>
                <li class="ressourcesfilter-item">
                    <a href="<?= get_post_type_archive_link('project') ?>?filter=<?= $term->slug ?>" class="ressourcesfilter-link <?= $filter === $term->slug ? 'active' : '' ?>">
                        <?= $term->name ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>

    <!-- Afficher tous les projets -->
    <section class="project" itemscope itemtype="https://schema.org/ItemList">
    <h2 class="sro">Mes projets</h2>

<?php $position = 1; // Pour itemprop="position" ?>
<?php if ($query->have_posts()):
    while ($query->have_posts()): $query->the_post();
        $project_title = get_field('project_title');
        $project_description = get_field('project_description');
        $project_button = get_field('project_button');
        $project_image = get_field('project_image');
        $project_button = get_field('project_button');
        $project_button_text = get_field('project_button_text');
        ?>
        <article class="project__container" itemscope
                 itemtype="https://schema.org/CreativeWork"
                 itemprop="itemListElement">
            <div class="project__content">
                <?php if ($project_title): ?>
                    <h3 class="project__title" itemprop="name"><?= $project_title ?></h3>
                <?php endif; ?>
                <?php if ($project_description): ?>
                    <p class="project__text" itemprop="description"><?= $project_description ?></p>
                <?php endif; ?>
                <meta itemprop="position" content="<?= $position++ ?>">
                <a class="buttons"
                   href="<?= $project_button['url'] ?>"
                   itemprop="url"
                   title="Lien vers mon projet : <?= get_the_title() ?>">
                    <?= $project_button_text ?>
                </a>
            </div>

            <?php if ($project_image): ?>
                <div class="stack">
                    <div class="card card-1">
                        <img class="project__image"
                             src="<?= $project_image['url'] ?>"
                             alt="<?= $project_image['alt'] ?>"
                             width="<?= $project_image['width'] ?>"
                             height="<?= $project_image['height'] ?>"
                             itemprop="image"
                        >
                    </div>
                    <div class="card card-2">
                        <img class="project__image"
                             src="<?= $project_image['url'] ?>"
                             alt="<?= $project_image['alt'] ?>"
                             width="<?= $project_image['width'] ?>"
                             height="<?= $project_image['height'] ?>"
                        >
                    </div>
                    <div class="card card-3">
                        <img class="project__image"
                             src="<?= $project_image['url'] ?>"
                             alt="<?= $project_image['alt'] ?>"
                             width="<?= $project_image['width'] ?>"
                             height="<?= $project_image['height'] ?>"
                        >
                    </div>
                </div>
            <?php endif; ?>
        </article>
    <?php endwhile; ?>
    </section>
    </main>
<?php endif; ?>
<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>