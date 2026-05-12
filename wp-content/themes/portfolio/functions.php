<?php
// Démarrer le système de sessions pour pouvoir afficher des messages de feedback
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

use controllers\ContactForm;

include('core/theme/configuration.php');
include('core/controllers/ContactForm.php');

//Travailler avec la session de PHP
function hepl_session_flash($key, $value): void
{
    if (!isset($_SESSION['hepl_flash'])) {
        $_SESSION['hepl_flash'] = [];
    }

    $_SESSION['hepl_flash'][$key] = $value;
}

function hepl_session_get($key)
{
    if (isset($_SESSION['hepl_flash']) && array_key_exists($key, $_SESSION['hepl_flash'])) {
        // 1. Récupérer la donnée qui a été flash.
        $value = $_SESSION['hepl_flash'][$key];
        // 2. Supprimer la donnée de la session.
        unset($_SESSION['hepl_flash'][$key]);
        // 3. Retourner la donnée récupérée.
        return $value;
    }

    // La donnée n'existait pas dans la session flash, donc je retourne null.
    return null;
}


function execute_contact_form(): void
{
    $config = [
        // On va récupérer le name d'un nonce (jeton de sécurité) que nous avons créé dans le template du formulaire
        'nonce_field' => 'contact_nonce',
        // On va récupérer l'action du formulaire qui contient le nonce.
        'nonce_identifier' => 'contact_form',
    ];

    (new ContactForm($config, $_POST))
        ->sanitize([
            'name' => 'text_field',
            'email' => 'email',
            'phone' => 'text_field',
            'sujet' => 'text_field',
            'message' => 'textarea_field'
        ])
        ->validate([
            'name' => ['required'],
            'email' => ['email', 'required'],
            'phone' => ['required'],
            'sujet' => [],
            'message' => ['required']
        ])
        ->save(
        // Dylan Jacquet - dylan.jacquet@hepl.be - Objet du message
            title: fn($data) => $data['name'] . ' - ' . $data['email'] . ' - ' . $data['sujet'],
            content: fn($data) => $data['message'],
        )
        ->send(
            title: fn($data) => 'Nouveau message de ' . $data['name'],
            content: fn($data
            ) => 'Nom complet: ' . $data['name'] . PHP_EOL . 'Adresse mail: ' . $data['email'] . PHP_EOL . 'Objet:' . $data['sujet'] . PHP_EOL . 'Message:' . $data['message'],
        )
        ->feedback();
}

// Déclaration d'un CPT (Custom Post Type) "Message" pour les messages de contact
register_post_type('message', [
    'label' => 'Messages de contact',
    'description' => 'Les messages de contact',
    'menu_position' => 2,
    'menu_icon' => 'dashicons-buddicons-pm',
    'public' => false,
    'show_ui' => true,
    //à mettre s'il est en public false, mais qu'on veut le voir dans le back-office
    'has_archive' => false,
    'supports' => ['title', 'editor'],
]);

// Pour les utilisateurs connectés
// Pour les utilisateurs non connectés
add_action('admin_post_nopriv_contact_form', 'execute_contact_form');
// admin_post_... = C'est un hook spécial qui va traiter les formulaires envoyés à admin-post.php
add_action('admin_post_contact_form', 'execute_contact_form');

// Déclaration des menus dans wordpress
register_nav_menu('header', 'Le menu de navigation principal qui se trouve en haut de la page');
register_nav_menu('footer', 'Le menu de navigation de fin de page');
register_nav_menu('social-media', 'Le menu de navigation pour les réseaux sociaux');
register_nav_menu('utils', 'Le menu de navigation pour les ressources utiles');

// Function permettant de récupérer les éléments d'un menu de navigation sous forme de lien
function dw_get_navigation_links(string $location): array
{
    // Récupérer l'objet W¨pour le menu
    $locations = get_nav_menu_locations();

    if (!isset($locations[$location])) {
        return [];
    }

    $nav_id = $locations[$location];
    $nav = wp_get_nav_menu_items($nav_id);

    // Transformer le menu en tableau de liens, chaque lien va être un objet personnalisé
    $links = [];

    foreach ($nav as $post) {
        $link = new stdClass();
        $link->href = $post->url;
        $link->label = $post->title;

        $links[] = $link;
    }

    return $links;
}

// Fonction qui retourne l'URL d'un asset (css ou js) compilé par Vite
function dw_asset(string $file): string
{
    $manifest_path = get_theme_file_path('public/.vite/manifest.json');

    if (file_exists($manifest_path)) {
        $manifest = json_decode(file_get_contents($manifest_path), true);
        if (isset($manifest['wp-content/themes/portfolio/assets/css/styles.scss']) && $file === 'css') {
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/assets/css/styles.scss']['file']);
        }

        if (isset($manifest['wp-content/themes/portfolio/assets/js/main.js']) && $file === 'js') {

            // Retourne l'URL publique vers le fichier JS compilé
            return get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/assets/js/main.js']['file']);
        }
    }

    return '';
}

add_theme_support('post-thumbnails', ['training']);

register_taxonomy('training_level', ['training'], [
    'label' => 'Le niveau de la formation',
    'public' => true,
    'hierarchical' => true,
]);

acf_add_options_page(array(
    'page_title' => 'Theme General Settings',
    'menu_title' => 'Theme Settings',
    'menu_slug' => 'theme-general-settings',
    'capability' => 'edit_posts',
    'redirect' => false
));

load_theme_textdomain('hepl-trad', get_template_directory() . '/locales');

function __hepl($translation): ?string
{
    return __($translation, 'hepl-trad');
}

add_image_size('square-small', 400, 400, true);
add_image_size('square-medium', 800, 800, true);
add_image_size('square-large', 1200, 1200, true);


//Custom Post Type
register_post_type('project', [ //Nom du tout
    'label' => 'Projects',
    'description' => 'Les projets que j’ai fait',
    'menu_position' => 2,
    'menu_icon' => 'dashicons-portfolio',
    'public' => true, //Pour que tout le monde le voie
    'show_ui' => true,
    //à mettre s'il est en public false, mais qu'on veut le voir dans le back-office
    'has_archive' => true,
    'rewrite' => ['slug' => 'projets'],
    'supports' => ['title'],
]);


//SVG
function my_own_mime_types( $mimes ) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter( 'upload_mimes', 'my_own_mime_types' );