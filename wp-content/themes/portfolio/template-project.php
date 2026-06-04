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
<main itemscope itemtype="https://schema.org/CollectionPage">

    <!-- Afficher tous les projets -->
    <section class="project" itemscope itemtype="https://schema.org/ItemList">
        <h2 class="sro">Mes projets</h2>
        <?php $position = 1; ?>
        <?php if ($query->have_posts()):
        while ($query->have_posts()): $query->the_post();
            $project_title = get_field('project_title');
            $project_description = get_field('project_description');
            $project_button = get_field('project_button');
            $project_image = get_field('project_image');
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
                    <a class="buttons" href="<?= get_the_permalink() ?>"
                       itemprop="url"
                       title="Lien vers mon projet : <?= get_the_title() ?>"
                    >EN SAVOIR PLUS !</a>
                </div>

                <?php if ($project_image): ?>
                    <div class="stack">
                        <div class="card card-1">
                            <img class="project__image"
                                 itemprop="image"
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
</main>
<?php endif; ?>
<?php wp_reset_postdata(); ?>

<?php get_footer(); ?>

