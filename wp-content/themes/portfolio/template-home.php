<?php /* Template Name: Home page */ ?>
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

//Section à propos de moi
$title_about_me = get_field('title_about_me');
$description_about_me = get_field('description_about_me');
$button_about_me = get_field('button_about_me');
$image_about_me = get_field('image_about_me');


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

<!-- Intéresser ? -->
<section class="interest">
    <?php if ($text_media_title_1): ?>
        <h3 class="interest__title"> <?= $text_media_title_1 ?> </h3>
    <?php endif; ?>
    <?php if ($text_media_description_1): ?>
        <p class="interest__text"> <?= $text_media_description_1 ?> </p>
    <?php endif; ?>
    <?php if ($text_media_button_1): ?>
        <a class="buttons" href="<?= $text_media_button_1 ?>"><?= $text_media_button_1['title'] ?></a>
    <?php endif; ?>
</section>

<!-- Jacquemin-Fanti Marie -->
<section class="about-me">
    <div class="about-me__content">
        <?php if ($title_about_me): ?>
            <h3 class="about-me__title"> <?= $title_about_me ?> </h3>
        <?php endif; ?>
        <?php if ($description_about_me): ?>
            <p class="about-me__text"> <?= $description_about_me ?> </p>
        <?php endif; ?>
        <?php if ($button_about_me): ?>
            <a class="buttons" href="<?= $button_about_me ?>"><?= $button_about_me['title']?></a>
        <?php endif; ?>
    </div>
    <?php if ($image_about_me): ?>
        <img
                src="<?= $image_about_me['url'] ?>"
                alt="<?= $image_about_me['alt'] ?>"
                width="<?= $image_about_me['width'] ?>"
                height="<?= $image_about_me['height'] ?>"
        >
    <?php endif; ?>
</section>

<?php get_footer(); ?>

