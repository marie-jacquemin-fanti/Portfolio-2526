<?php /* Template Name: Formulaire de contacte */ ?>

<?= get_header(); ?>

<?php get_template_part('templates/components/forms/me-contacter'); ?>
<?php get_template_part('templates/components/forms/en/contact'); ?>


<section class="form__container">
    <?php
    $feedback = hepl_session_get('contact_form_feedback') ?? false;
    $errors = hepl_session_get('contact_form_errors') ?? [];
    ?>

    <h2 class="sro">
        Formulaire de contact
    </h2>

    <?php if ($feedback): ?>
        <div>
            <p>Votre message a bien été envoyé. Merci à vous !</p>
        </div>
    <?php endif; ?>
    <?php if ($errors): ?>
        <div>
            <p>Attention ! Merci de corriger les erreurs du formulaire.</p>
        </div>
    <?php endif; ?>


    <!-- L'action redirige vers le fichier de base de Wordpress qui dit qui fait quoi. -->
    <form class="form" action="<?= admin_url('admin-post.php'); ?>" method="POST">
        <div class="form__group">
            <label class="form__label" for="name">Nom de famille *</label>
            <input class="form__input" type="text" id="name" name="name" value="" placeholder="John Doe" required/>
            <?php if ($errors['name'] ?? null): ?>
                <p class="form__error-message"><?= $errors['name']; ?></p>
            <?php endif; ?>
        </div>

        <div class="form__group">
            <label class="form__label" for="email">Adresse mail *</label>
            <input class="form__input" type="email" id="email" name="email" value="" placeholder="Ex: johndoe@example.com" required/>
            <?php if ($errors['email'] ?? null): ?>
                <p class="form__error-message"><?= $errors['email']; ?></p>
            <?php endif; ?>
        </div>

        <div class="form__group">
            <label class="form__label" for="phone">Numéro de téléphone *</label>
            <input class="form__input" type="tel" id="phone" name="phone" value="" placeholder="Ex: +33 6 12 48 75 95" required/>
            <?php if ($errors['phone'] ?? null): ?>
                <p class="form__error-message"><?= $errors['phone']; ?></p>
            <?php endif; ?>
        </div>

        <div class="form__group">
            <label class="form__label" for="sujet">Sujet</label>
            <input class="form__input" type="text" id="sujet" name="sujet" value="" placeholder="Ex: Prise de rendez-vous"/>
            <?php if ($errors['sujet'] ?? null): ?>
                <p class="form__error-message"><?= $errors['sujet']; ?></p>
            <?php endif; ?>
        </div>

        <div class="form__group">
            <label class="form__label" for="message">Message *</label>
            <textarea class="form__textarea" id="message" name="message" placeholder="Ecrivez votre message ici..." required></textarea>
            <?php if ($errors['message'] ?? null): ?>
                <p class="form__error-message"><?= $errors['message']; ?></p>
            <?php endif; ?>
        </div>

        <input type="hidden" name="action" value="contact_form"/>
        <input type="hidden" name="contact_nonce" value="<?= wp_create_nonce('contact_form'); ?>"/>
        <button class="buttons" type="submit">Envoyer</button>
    </form>
</section>

<?= get_footer(); ?>
