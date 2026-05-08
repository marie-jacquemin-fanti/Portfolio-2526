<?php

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


register_nav_menu('header', 'Le menu de navigation principal');
register_nav_menu('footer', 'Le menu de navigation du footer');
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


//Custom Post Type
register_post_type('project', [ //Nom du tout
    'label' => 'Projects',
    'description' => 'Les projets que j’ai fait',
    'menu_position' => 2,
    'menu_icon' => 'dashicons-welcome-learn-more',
    'public' => true, //Pour que tout le monde le voie
    'show_ui' => true,
    //à mettre s'il est en public false, mais qu'on veut le voir dans le back-office
    'has_archive' => true,
    'rewrite' => ['slug' => 'projets'],
    'supports' => ['title'],
]);

// Fonction qui retourne l'URL d'un asset (css ou js) compilé par Vite
function dw_asset(string $file): string {

  // Chemin absolu vers le fichier manifest.json généré par Vite
  // get_theme_file_path() retourne le chemin serveur vers le thème WordPress
  $manifest_path = get_theme_file_path('public/.vite/manifest.json');

  // Vérifie si le fichier manifest.json existe
  if (file_exists($manifest_path)) {

    // Lit le contenu du fichier manifest.json
    // file_get_contents = récupère le contenu brut du fichier
    // json_decode(..., true) = convertit le JSON en tableau PHP associatif
    $manifest = json_decode(file_get_contents($manifest_path), true);

    // Vérifie si l'entrée CSS existe dans le manifest ET si on demande un fichier de type "css"
    if (isset($manifest['wp-content/themes/portfolio/assets/css/styles.scss']) && $file === 'css') {

      // Retourne l'URL publique vers le fichier CSS compilé
      // ['file'] contient le nom final généré par Vite (avec hash)
      return get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/assets/css/styles.scss']['file']);
    }

    // Vérifie si l'entrée JS existe dans le manifest ET si on demande un fichier de type "js"
    if (isset($manifest['wp-content/themes/portfolio/assets/js/main.js']) && $file === 'js') {

      // Retourne l'URL publique vers le fichier JS compilé
      return get_theme_file_uri('public/' . $manifest['wp-content/themes/portfolio/assets/js/main.js']['file']);
    }
  }

  // Si manifest introuvable ou asset non trouvé, on retourne une chaîne vide
  return '';
}

//Formulaire de contact
//La fonction va s'executer quand quelqu'un va appuyer sur le bouton de soumision de formulaire. Il va analyser et traiter les information envoyer grâce à ça.
function execute_contact_form(): void
{
    //On configure
    $config = [
        // On va récupérer le name d'un nonce (jeton de sécurité) que nous avons créé dans le template du formulaire.
        'nonce_field' => 'contact_nonce', //Un jeton qui rpouve que ça vien bien de notre site
        // On va récupérer l'action du formulaire qui contient le nonce.
        'nonce_identifier' => 'hepl_contact_form', //TODO : Je ne comprend pas ce que c'est.
    ];

    //On créer un objet avec deux paramettres (les informations de sécuriter juste au dessus et les données du formulaire)
    (new ContactForm($config, $_POST))
        //On nettoie les données et retire tout ce qui peut être dangereux à l'intérieur.
        ->sanitize([
            'name' => 'text_field',
            'email' => 'email',
            'object' => 'text_field',
            'message' => 'textarea_field'
        ])
        //On les valides
        ->validate([
            'name' => ['required'],
            'email' => ['email', 'required'],
            'object' => [],
            'message' => ['required']
        ])
        //On sauvegarde le tout dans wordpress, pour que l'on puisse lire ce qui nous a été envoyer.
        ->save(
        // Dylan Jacquet - dylan.jacquet@hepl.be - Objet du message
            title: fn($data) => $data['name'] . ' - ' . $data['email'] . ' - ' . $data['object'],
            content: fn($data) => $data['message'],
        )
        //Envoie un mail sur mon mail personnel en plus de wordpress qui garde une copie.
        ->send(
            title: fn($data) => 'Nouveau message de ' . $data['name'],
            content: fn($data
            ) => 'Nom complet: ' . $data['name'] . PHP_EOL . 'Adresse mail: ' . $data['email'] . PHP_EOL . 'Objet:' . $data['object'] . PHP_EOL . 'Message:' . $data['message'],
        )
        //On redirige la personne après l'envoyer, pour lui dire que ça à bien fonctionner.
        ->feedback();
}












add_image_size('square-small', 600, 400, true); //TODO : Revoir !



// Ajouts d'une page d'option (exemple de la documentation)
/*acf_add_options_page(array(
    'page_title' => 'Theme General Settings',
    'menu_title' => 'Theme Settings',
    'menu_slug' => 'theme-general-settings',
    'capability' => 'edit_posts',
    'redirect' => false
));*/



