<?php /* Template Name: Page d'accueil */ ?>
<?php get_header(); ?>

<?php
//En tête
$suptitle = get_field('suptitle');
$title = get_field('title');
$subtitle = get_field('subtitle');


//Projet 3
$text_media_title_1 = get_field('text-media_title_1');
$text_media_description_1 = get_field('text-media-description_1');
$text_media_button_1 = get_field('text-media-button_1');
$project_image = get_field('project_image');

//Projet 4
$text_media_title_2 = get_field('text-media_title_2');
$text_media_description_2 = get_field('text-media-description_2');
$text_media_button_2 = get_field('text-media-button_2');
$text_media_image_2 = get_field('text-media-image_2');
//On fait un variable query qui va avoir pour valeur une nouvelle requet wordpress avec comme
$query = new WP_Query([
    'post_type' => 'project', //Dans function.php, le nom donnée au tout
    'post_status' => 'publish',
    'posts_per_page' => 3, //Le nombre que l'on veut afficher.
]);


?>

    <p><?= $suptitle ?></p>
    <section>
        <h2> <?= $title ?> </h2>
        <p><?= $subtitle ?></p>
    </section>


<?php if ($query->have_posts()): while ($query->have_posts()): $query->the_post();
    //Projet
    $project_title = get_field('project_title');
    $project_description = get_field('project_description');
    $project_button = get_field('project_button');
    $project_image = get_field('project_image');
    ?>

    <!-- Projet -->
    <section>
        <?php if ($project_title): ?>
            <h2><?= $project_title ?></h2>
        <?php endif; ?>
        <?php if ($project_description): ?>
            <p><?= $project_description ?></p>
        <?php endif; ?>
        <?php if ($project_image): ?>
            <img
                    src="<?= $project_image['url'] ?>"
                    alt="<?= $project_image['alt'] ?>"
                    width="<?= $project_image['width'] ?>"
                    height="<?= $project_image['height'] ?>"
            >
        <?php endif; ?>
        <a href="<?= get_the_permalink() ?>" title="Lien vers ma page de projet : <?= get_the_title() ?>"
           target="_blank">En savoir plus !</a>
    </section>
<?php endwhile; ?>
<?php endif; ?>

<?php wp_reset_postdata(); ?>

    <!-- Intéresser ? -->
<?php if ($text_media_title_1): ?>
    <h3> <?= $text_media_title_1 ?> </h3>
<?php endif; ?>
<?php if ($text_media_description_1): ?>
    <p> <?= $text_media_description_1 ?> </p>
<?php endif; ?>
<?php if ($text_media_button_1): ?>
    <a href="<?= $text_media_button_1 ?>"></a>
<?php endif; ?>
    <!-- Jacquemin-Fanti Marie -->
<?php if ($text_media_title_2): ?>
    <h3> <?= $text_media_title_2 ?> </h3>
<?php endif; ?>
<?php if ($text_media_description_2): ?>
    <p> <?= $text_media_description_2 ?> </p>
<?php endif; ?>
<?php if ($text_media_button_2): ?>
    <a href="<?= $text_media_button_2 ?>"></a>
<?php endif; ?>
<?php if ($text_media_image_2): ?>
    <img
            src="<?= $text_media_image_2['url'] ?>"
            alt="<?= $text_media_image_2['alt'] ?>"
            width="<?= $text_media_image_2['width'] ?>"
            height="<?= $text_media_image_2['height'] ?>"
    >
<?php endif; ?>


<?php get_footer(); ?>

