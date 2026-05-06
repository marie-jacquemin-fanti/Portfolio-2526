<?php get_header(); ?>
<?php
$terms = get_terms('project_type');
$taxonomy = isset($_GET['filter']) ? sanitize_text_field($_GET['filter']) : '';

$query = new WP_Query([
    'post_type' => 'project', //Dans function.php, le nom donnée au tout
    'post_status' => 'publish',
    'posts_per_page' => 3, //Le nombre que l'on veut afficher.
]);


/*if ($taxonomy !== '') {
    $args['tax_query'] = [
        [
            'taxonomy' => 'project_type',
            'field' => 'slug',
            'terms' => $taxonomy,
        ]
    ];
}*/


?>


    <!--    <h1>Nos formations --><?php //= $taxonomy ?><!--!</h1>-->

    <!--<div>
        <ul>
            <li>
                <a href="/project">Tout</a>
                 TODO: à changer plus tard ^^ quand tu rajouteras les taxos -->
<?php /*if (empty($terms->errors)): */ ?>
<?php /*foreach ($terms as $term): */ ?>
    <a href="/project?filter=<?php /*= $term->slug */ ?>">
        <?php /*= $term->name; */ ?>
    </a>
<?php /*endforeach; */ ?>
<?php /*endif; */ ?>
    </li>
    </ul>
    </div>-->


    <!-- Afficher tous les projets -->
    <section class="project">
    <h2 class="sro">Mes projets</h2>
<?php if ($query->have_posts()):
    while ($query->have_posts()): $query->the_post();
        $project_title = get_field('project_title');
        $project_description = get_field('project_description');
        $project_button = get_field('project_button');
        $project_image = get_field('project_image');
        ?>
        <article class="project__container">
            <div class="project__content">
                <?php if ($project_title): ?>
                    <h3 class="project__title"><?= $project_title ?></h3>
                <?php endif; ?>
                <?php if ($project_description): ?>
                    <p class="project__text"><?= $project_description ?></p>
                <?php endif; ?>
                <a class="buttons" href="<?= get_the_permalink() ?>"
                   title="Lien vers mon projet : <?= get_the_title() ?>"
                   target="_blank">EN SAVOIR PLUS !</a>
            </div>

            <?php if ($project_image): ?>
                <div class="stack">
                    <div class="card card-1">
                        <img class="project__image"
                             src="<?= $project_image['url'] ?>"
                             alt="<?= $project_image['alt'] ?>"
                             width="<?= $project_image['width'] ?>"
                             height="<?= $project_image['height'] ?>"
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
<?php endif; ?>
<?php wp_reset_postdata(); ?>
<?php get_footer(); ?>