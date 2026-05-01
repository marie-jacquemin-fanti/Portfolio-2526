<?php /* Template Name: Page d'accueil */ ?>
<?php get_header(); ?>

<?php
//En tête
$suptitle = get_field('suptitle');
$title = get_field('title');
$subtitle = get_field('subtitle');


//Texte média 1
$text_media_title_1 = get_field('text-media_title_1');
$text_media_description_1 = get_field('text-media-description_1');
$text_media_button_1 = get_field('text-media-button_1');
$project_image = get_field('project_image');

//Texte média 2
$text_media_title_2 = get_field('text-media_title_2');
$text_media_description_2 = get_field('text-media-description_2');
$text_media_button_2 = get_field('text-media-button_2');
$text_media_image_2 = get_field('text-media-image_2');


//Une boucle personnaliser qui va faire apparaitre les projets de nos CPT.
$query = new WP_Query([
    'post_type' => 'project', //Dans function.php, le nom donné au tout
    'post_status' => 'publish',
    'posts_per_page' => 3, //Le nombre que l'on veut afficher.
]);
?>

<p><?= $suptitle ?></p>
<section>
    <h2> <?= $title ?> </h2>
    <p><?= $subtitle ?></p>
</section>

<!-- Afficher tous les projets -->
<section class="section__project">
    <h2 class="sro">Mes projets</h2>
    <?php if ($query->have_posts()):
    while ($query->have_posts()): $query->the_post();
        $project_title = get_field('project_title');
        $project_description = get_field('project_description');
        $project_button = get_field('project_button');
        $project_image = get_field('project_image');
        ?>
        <article class="projects">
            <div class="project">
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

<!-- Intéresser ? -->
<section class="text-media">
    <?php if ($text_media_title_1): ?>
        <h3 class="text-media__title"> <?= $text_media_title_1 ?> </h3>
    <?php endif; ?>
    <?php if ($text_media_description_1): ?>
        <p class="text-media__text"> <?= $text_media_description_1 ?> </p>
    <?php endif; ?>
    <?php if ($text_media_button_1): ?>
        <a class="buttons" href="<?= $text_media_button_1 ?>">VOIR PLUS !</a>
    <?php endif; ?>
</section>

<!-- Jacquemin-Fanti Marie -->
<section class="text-media-2">
    <div class="text-media-2__content">
        <?php if ($text_media_title_2): ?>
            <h3 class="text-media__title"> <?= $text_media_title_2 ?> </h3>
        <?php endif; ?>
        <?php if ($text_media_description_2): ?>
            <p class="text-media__text-2"> <?= $text_media_description_2 ?> </p>
        <?php endif; ?>
        <?php if ($text_media_button_2): ?>
            <a class="buttons" href="<?= $text_media_button_2 ?>">PLUS SUR MOI !</a>
        <?php endif; ?>
    </div>
    <?php if ($text_media_image_2): ?>
        <img
                src="<?= $text_media_image_2['url'] ?>"
                alt="<?= $text_media_image_2['alt'] ?>"
                width="<?= $text_media_image_2['width'] ?>"
                height="<?= $text_media_image_2['height'] ?>"
        >
    <?php endif; ?>
</section>

<?php get_footer(); ?>

