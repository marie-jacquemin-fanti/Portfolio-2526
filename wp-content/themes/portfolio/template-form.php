<?php /* Template Name: Formulaire de contacte */ ?>

<?= get_header(); ?>

<?php //get_template_part('templates/components/stage/stage'); ?>
<?php get_template_part('templates/components/forms/me-contacter'); ?>


    <!--<form action="" method="post" enctype="multipart/form-data">

        <div>
            <label for="name">Nom *</label>
            <input id="name" name="name" type="text" placeholder="Ex: Dumont" required>
        </div>
        <div>
            <label for="email">Adresse mail *</label>
            <input id="email" name="email" type="email" placeholder="Ex: jeandumont@gmail.com" required>
        </div>
        <div>
            <label for="phone">Numéro de téléphone</label>
            <input id="phone" name="phone" type="tel" placeholder="Ex: jeandumont@gmail.com" required>
        </div>
        <div>
            <label for="subject">Sujet</label>
            <input id="subject" name="subject" type="text" placeholder="Ex: jeandumont@gmail.com" required>
        </div>
        <div>
            <label for="message">Message</label>
            <textarea id="message" name="message" type="text" placeholder="Ecrivez votre message ici..." required>
        </div>

        <button type="submit">Envoyer</button>
    </form>-->
<?php echo do_shortcode('[contact-form-7 id="123" title="Contact"]'); ?>

<?= get_footer(); ?>