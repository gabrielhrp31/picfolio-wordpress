<?php
// Load constants first
include('inc/constants.php');

// Include your functions files here
include('inc/enqueues.php');
include('inc/excerpt.php');

include ('inc/custom-fields.php');
include ('inc/categories-image.php');
include ('inc/post-like.php');
include ('inc/post-views.php');

/**
 * Don't hesitate to use the WP code snippet generator Hasty : https://www.wp-hasty.com/
 */

/**
 * Declare theme support
 * ( cf :  http://codex.wordpress.org/Function_Reference/add_theme_support )
 */
function theme_set_theme_supports()
{
    global $wp_version;

    add_theme_support('menus');
    add_theme_support('post-thumbnails');

    add_theme_support('automatic-feed-links');

    // let wordpress manage the title
    add_theme_support('title-tag');

    //add_theme_support( 'custom-background', $args );
    //add_theme_support( 'custom-header', $args );
}

add_action('after_setup_theme', 'theme_set_theme_supports');


/**
 * Declare theme width global var
 */
if ( ! isset($content_width)) {
    // @TODO : edit the value for your own specifications
    $content_width = 1170; // Bootstrap default container value
}


/**
 * Register WordPress menus
 * cf : http://codex.wordpress.org/Function_Reference/wp_nav_menu
 *
 */

// Add NaviWalker Suport
function register_navwalker(){
    require_once get_template_directory() . '/inc/wp-bootstrap-navwalker.php';
}
add_action( 'after_setup_theme', 'register_navwalker' );


//@TODO : declare your menus here
register_nav_menus(array(
    'primary-left' => __( 'Primary Left Menu', 'Logo Left Menu' ),
    'primary-right' => __( 'Primary Right Menu', 'Logo Right Menu' ),
));
register_nav_menus(array(
    'primary-left' => __( 'Primary Left Menu', 'Logo Left Menu' ),
    'primary-right' => __( 'Primary Right Menu', 'Logo Right Menu' ),
));

/**
 * register sidebars
 * cf : https://codex.wordpress.org/Function_Reference/register_sidebar
 *
 * @return void
 */
function theme_register_sidebars()
{
    if ( ! function_exists('register_sidebar')) {
        return;
    }
    //@TODO : declare your sidebar here
    register_sidebar(array(
        'name'          => __('Main sidebar', I18N_DOMAIN),
        'id'            => 'main-sidebar',
        'description'   => '',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}

//add_action( 'widgets_init', 'theme_register_sidebars' ); //@TODO : uncomment if you're need sidebar(s)


/**
 * Set style.css as style in admin editor
 *
 */
function theme_set_editor_style()
{
    add_editor_style(get_stylesheet_directory_uri() . '/dist/css/theme.css');
}

//add_action( 'admin_init', 'theme_set_editor_style' ); //@TODO : Uncomment if you use it

/**
 * Remove emojis CSS and JS
 */
function theme_remove_emojis()
{
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 99);
}
//add_action( 'init', 'theme_remove_emojis' ); //@TODO: Uncomment if you don't need emojis and want to optimize your site


// add support to featured image
add_theme_support( 'post-thumbnails' );

// add a custom logo suport
function mytheme_setup() {
    add_theme_support('custom-logo', array(
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    ));
}

add_action('after_setup_theme', 'mytheme_setup');


//adicionar tipo de posts para o slider
// Register Custom Post Type
function custom_post_slide() {

    $labels = array(
        'name'                  => _x( 'Slide', 'Post Type General Name', 'text_domain' ),
        'singular_name'         => _x( 'Slides', 'Post Type Singular Name', 'text_domain' ),
        'menu_name'             => __( 'Slides', 'text_domain' ),
        'name_admin_bar'        => __( 'Slides', 'text_domain' ),
        'archives'              => __( 'Categoria', 'text_domain' ),
        'attributes'            => __( 'Atributos do Item', 'text_domain' ),
        'parent_item_colon'     => __( 'Item Pai:', 'text_domain' ),
        'all_items'             => __( 'Todos os Itens', 'text_domain' ),
        'add_new_item'          => __( 'Adicionar Novo Item', 'text_domain' ),
        'add_new'               => __( 'Adicionar Novo', 'text_domain' ),
        'new_item'              => __( 'Novo Item', 'text_domain' ),
        'edit_item'             => __( 'Editar Item', 'text_domain' ),
        'update_item'           => __( 'Atualizar Item', 'text_domain' ),
        'view_item'             => __( 'Ver Item', 'text_domain' ),
        'view_items'            => __( 'Ver Itens', 'text_domain' ),
        'search_items'          => __( 'Buscar Item', 'text_domain' ),
        'not_found'             => __( 'Não Encontrado', 'text_domain' ),
        'not_found_in_trash'    => __( 'Não Encontrado Trash', 'text_domain' ),
        'featured_image'        => __( 'Imagem', 'text_domain' ),
        'set_featured_image'    => __( 'Escolher Imagem', 'text_domain' ),
        'remove_featured_image' => __( 'Remover Imagem', 'text_domain' ),
        'use_featured_image'    => __( 'Usar Como Imagem', 'text_domain' ),
        'insert_into_item'      => __( 'Inserir no Item', 'text_domain' ),
        'uploaded_to_this_item' => __( 'Enviar par este item', 'text_domain' ),
        'items_list'            => __( 'Listar Itens', 'text_domain' ),
        'items_list_navigation' => __( 'Navegar pelos Itens', 'text_domain' ),
        'filter_items_list'     => __( 'Filterar na Lista de Itens', 'text_domain' ),
    );
    $args = array(
        'label'                 => __( 'Slides', 'text_domain' ),
        'description'           => __( 'Insira o slides de cada categoria!', 'text_domain' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail' ),
        'taxonomies'            => array( 'category' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-images-alt',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'post_slide', $args );

}
add_action( 'init', 'custom_post_slide', 0 );

// Register Theme Features
function custom_theme_features()  {

    // Add theme support for Post Formats
    add_theme_support( 'post-formats', array( 'status', 'quote', 'gallery', 'image', 'video', 'audio', 'link', 'aside', 'chat' ) );
}
add_action( 'after_setup_theme', 'custom_theme_features' );
// Disable the toolbar completely for all users
add_filter('show_admin_bar', '__return_false');