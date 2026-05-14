<?php /* Template Name: project */ ?>
<?php get_header(); ?>

<?php

//Une boucle personnaliser qui va faire apparaitre les projets de nos CPT.
$query = new WP_Query([
    'post_type' => 'project', //Dans function.php, le nom donné au tout
    'post_status' => 'publish',
    'posts_per_page' => 100, //Le nombre que l'on veut afficher.
]);
?>


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
                   >EN SAVOIR PLUS !</a>
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

