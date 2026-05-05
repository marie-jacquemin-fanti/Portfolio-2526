<?php /* Template Name: A propos */ ?>
<?php get_header(); ?>

<?php
//Texte média 2
$title_about_me = get_field('title_about_me');
$description_about_me = get_field('description_about_me');
$image_about_me = get_field('image_about_me');

$skill_bush = get_field('skill_bush');

$image_education_1 = get_field('image_education_1');
$title_education_1 = get_field('title_education_1');
$text_education_1 = get_field('text_education_1');

$image_education_2 = get_field('image_education_2');
$title_education_2 = get_field('title_education_2');
$text_education_2 = get_field('text_education_2');

$image_education_3 = get_field('image_education_3');
$title_education_3 = get_field('title_education_3');
$text_education_3 = get_field('text_education_3');

$image_education_4 = get_field('image_education_4');
$title_education_4 = get_field('title_education_4');
$text_education_4 = get_field('text_education_4');

$image_education_5 = get_field('image_education_5');
$title_education_5 = get_field('title_education_5');
$text_education_5 = get_field('text_education_5');
?>

<!-- Jacquemin-Fanti Marie -->
<section class="about-me">
    <div class="about-me__content">
        <?php if ($title_about_me): ?>
            <h3 class="about-me__title"> <?= $title_about_me ?> </h3>
        <?php endif; ?>
        <?php if ($description_about_me): ?>
            <p class="about-me__text"> <?= $description_about_me ?> </p>
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

<!-- Buisson de compétence -->
<section>
    <h2 class="sro">Buisson de compétence</h2>
    <img src="<?= $skill_bush['url'] ?>"
         alt="<?= $skill_bush['alt'] ?>"
    >
</section>

<section class="education">
    <h2 class="sro">Parcours scolaire</h2>

    <div class="education__content">
        <div class="postit">
            <p class="education__title"> <?= $title_education_1 ?> </p>
            <p class="education__text"> <?= $text_education_1 ?> </p>
        </div>
        <img class="education__image"
             src="<?= $image_education_1['url'] ?>"
             alt="<?= $image_education_1['alt'] ?>"
             width="<?= $image_education_1['width'] ?>"
             height="<?= $image_education_1['height'] ?>"
        >
    </div>

    <div class="education__content">
        <div class="postit">
            <p class="education__title"> <?= $title_education_2 ?> </p>
            <p class="education__text"> <?= $text_education_2 ?> </p>
        </div>

        <img class="education__image"
             src="<?= $image_education_2['url'] ?>"
             alt="<?= $image_education_2['alt'] ?>"
             width="<?= $image_education_2['width'] ?>"
             height="<?= $image_education_2['height'] ?>"
        >
    </div>

    <div class="education__content">
        <div class="postit">
            <p class="education__title"> <?= $title_education_3 ?> </p>
            <p class="education__text"> <?= $text_education_3 ?> </p>
        </div>

        <img class="education__image"
             src="<?= $image_education_3['url'] ?>"
             alt="<?= $image_education_3['alt'] ?>"
             width="<?= $image_education_3['width'] ?>"
             height="<?= $image_education_3['height'] ?>"
        >
    </div>

    <div class="education__content">
        <div class="postit">
            <p class="education__title"> <?= $title_education_4 ?> </p>
            <p class="education__text"> <?= $text_education_4 ?> </p>
        </div>

        <img class="education__image"
             src="<?= $image_education_4['url'] ?>"
             alt="<?= $image_education_4['alt'] ?>"
             width="<?= $image_education_4['width'] ?>"
             height="<?= $image_education_4['height'] ?>"
        >
    </div>

    <div class="education__content">
        <div class="postit">
            <p class="education__title"> <?= $title_education_5 ?> </p>
            <p class="education__text"> <?= $text_education_5 ?> </p>
        </div>

        <img class="education__image"
             src="<?= $image_education_5['url'] ?>"
             alt="<?= $image_education_5['alt'] ?>"
             width="<?= $image_education_5['width'] ?>"
             height="<?= $image_education_5['height'] ?>"
        >
    </div>
</section>

<?php get_footer(); ?>
