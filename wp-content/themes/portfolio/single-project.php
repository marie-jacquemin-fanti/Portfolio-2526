<?php get_header(); ?>

<!-- Si on à des posts, on boucle dessus et on affiche le bon post. -->
<?php if (have_posts()): while (have_posts()): the_post(); ?>

    <?php
    $project_description = get_field('project_description');

    $process_description = get_field('process_description');
    $process_image_1 = get_field('process_image_1');
    $process_image_2 = get_field('process_image_2');
    $process_image_3 = get_field('process_image_3');

    $my_inspiration_description = get_field('my_inspiration_description');
    $my_inspiration_image_1 = get_field('my_inspiration_image_1');
    $my_inspiration_image_2 = get_field('my_inspiration_image_2');
    $my_inspiration_image_3 = get_field('my_inspiration_image_3');

    $my_design_description = get_field('my_design_description');
    $my_design_image_1 = get_field('$my_design_image_1');
    $my_design_image_2 = get_field('$my_design_image_2');
    $my_design_image_3 = get_field('$my_design_image_3');
    ?>

    <!-- On prend le title en question et tout ce qui va avec -->
    <h1><?= get_the_title() ?></h1>

    <?php if ($project_description): ?>
        <p><?= get_field($project_description) ?></p>
    <?php endif; ?>


    <div>
        <h3>Le processus</h3>
        <?php if ($process_description): ?>
            <p><?= $process_description ?></p>
        <?php endif; ?>

        <?php if ($process_image_1): ?>
            <img
                    src="<?= $process_image_1['url'] ?>"
                    alt="<?= $process_image_1['alt'] ?>"
                    width="<?= $process_image_1['width'] ?>"
                    height="<?= $process_image_1['height'] ?>"
            >
        <?php endif; ?>

        <?php if ($process_image_2): ?>
            <img
                    src="<?= $process_image_2['url'] ?>"
                    alt="<?= $process_image_2['alt'] ?>"
                    width="<?= $process_image_2['width'] ?>"
                    height="<?= $process_image_2['height'] ?>"
            >
        <?php endif; ?>

        <?php if ($process_image_3): ?>
            <img
                    src="<?= $process_image_3['url'] ?>"
                    alt="<?= $process_image_3['alt'] ?>"
                    width="<?= $process_image_3['width'] ?>"
                    height="<?= $process_image_3['height'] ?>"
            >
        <?php endif; ?>
    </div>

    <div>
        <h3>Mes inspiration</h3>
        <?php if ($my_inspiration_description): ?>
            <p><?= $my_inspiration_description ?></p>
        <?php endif; ?>
        <?php if ($my_inspiration_image_1): ?>
            <img
                    src="<?= $my_inspiration_image_1['url'] ?>"
                    alt="<?= $my_inspiration_image_1['alt'] ?>"
                    width="<?= $my_inspiration_image_1['width'] ?>"
                    height="<?= $my_inspiration_image_1['height'] ?>"
            >
        <?php endif; ?>
        <?php if ($my_inspiration_image_2): ?>
            <img
                    src="<?= $my_inspiration_image_2['url'] ?>"
                    alt="<?= $my_inspiration_image_2['alt'] ?>"
                    width="<?= $my_inspiration_image_2['width'] ?>"
                    height="<?= $my_inspiration_image_2['height'] ?>"
            >
        <?php endif; ?>
        <?php if ($my_inspiration_image_3): ?>
            <img
                    src="<?= $my_inspiration_image_3['url'] ?>"
                    alt="<?= $my_inspiration_image_3['alt'] ?>"
                    width="<?= $my_inspiration_image_3['width'] ?>"
                    height="<?= $my_inspiration_image_3['height'] ?>"
            >
        <?php endif; ?>
    </div>

    <div>
        <h3>Mon design</h3>
        <?php if ($my_design_description): ?>
            <p><?= $my_design_description ?></p>
        <?php endif; ?>
        <?php if ($my_design_image_1): ?>
            <img
                    src="<?= $my_design_image_1['url'] ?>"
                    alt="<?= $my_design_image_1['alt'] ?>"
                    width="<?= $my_design_image_1['width'] ?>"
                    height="<?= $my_design_image_1['height'] ?>"
            >
        <?php endif; ?>
        <?php if ($my_design_image_2): ?>
            <img
                    src="<?= $my_design_image_2['url'] ?>"
                    alt="<?= $my_design_image_2['alt'] ?>"
                    width="<?= $my_design_image_2['width'] ?>"
                    height="<?= $my_design_image_2['height'] ?>"
            >
        <?php endif; ?>
        <?php if ($my_design_image_3): ?>
            <img
                    src="<?= $my_design_image_3['url'] ?>"
                    alt="<?= $my_design_image_3['alt'] ?>"
                    width="<?= $my_design_image_3['width'] ?>"
                    height="<?= $my_design_image_3['height'] ?>"
            >
        <?php endif; ?>
    </div>
    <div>
        <h3>La réalisation</h3>
        <p><?= get_field('realisation_description') ?></p>
        <img src="" alt="">
    </div>
    <div>
        <h3>Le rendu</h3>
        <p><?= get_field('rendering_description') ?></p>
        <img
                src="<?= $text_media_image_2['url'] ?>"
                alt="<?= $text_media_image_2['alt'] ?>"
                width="<?= $text_media_image_2['width'] ?>"
                height="<?= $text_media_image_2['height'] ?>"
        >
    </div>

<?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
<?php endif; ?>
<?php wp_reset_postdata(); ?> <!-- Si on ne fait pas ça, ça garde le mauvais idée. -->
<?php get_footer(); ?>
