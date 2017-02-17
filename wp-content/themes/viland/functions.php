<?php
/**
 * Created by PhpStorm.
 * User: chutienphuc
 * Date: 22/04/2015
 * Time: 17:44
 */


/**
 * Get path of theme
 */
define('THEME_URL', get_stylesheet_directory());
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (!isset($content_width)) {
    $content_width = 1170;
}

/**
 * Set function to support sutunam theme
 */

if (!function_exists('sutunam_theme_setup')) {
    function sutunam_theme_setup()
    {

        /*
         * Set translate to sutunam theme
         */
        $language_folder = THEME_URL . '/languages';
        load_theme_textdomain('sutunam', $language_folder);

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Formats.
         *
         * See: https://codex.wordpress.org/Post_Formats
         */
        add_theme_support('post-formats', array(
            'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat'
        ));

        // Setup the WordPress core custom background feature.
        $default_background = array(
            'default-color' => '#e8e8e8',
        );
        add_theme_support('custom-background', $default_background);

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
        ));

        // This theme uses wp_nav_menu() in two locations.
        register_nav_menus(array(
            'top-menu' => __('Top Menu', 'sutunam')
        ));

        /*
         * Create footer for viland theme
         */
        $footerBlock1 = array(
            'name' => __('Footer Block One', 'sutunam'),
            'id' => 'footer-block-1',
            'description' => 'Footer block 1',
            'class' => 'footer-sidebar',
            'before_title' => '<h3 class="footer-title">',
            'after_title' => '</h3>',

        );

        register_sidebar($footerBlock1);

        $footerBlock2 = array(
            'name' => __('Footer Block Two', 'sutunam'),
            'id' => 'footer-block-2',
            'description' => 'Footer block 2',
            'class' => 'footer-sidebar',
            'before_title' => '<h3 class="footer-title">',
            'after_title' => '</h3>',

        );
        register_sidebar($footerBlock2);

        $footerBlock3 = array(
            'name' => __('Footer Block Three', 'sutunam'),
            'id' => 'footer-block-3',
            'description' => 'Footer block 3',
            'class' => 'footer-sidebar',
            'before_title' => '<h3 class="footer-title">',
            'after_title' => '</h3>',

        );
        register_sidebar($footerBlock3);

//        $left_sidebar = array(
//            'name' => __('Left Sidebar', 'sutunam'),
//            'id' => 'left-sidebar',
//            'description' => 'Left sidebar for Cozano theme',
//            'class' => 'left-sidebar',
//            'before_title' => '<h3 class="left-sidebar-title">',
//            'after_title' => '</h3>'
//        );
//        register_sidebar($left_sidebar);

        add_theme_support('post-thumbnails');

    }

    add_action('init', 'sutunam_theme_setup');
}

/**
 * Display menu
 */
if (!function_exists('sutunam_menu')) {
    function sutunam_menu($slug)
    {
        $menu = array(
            'theme_location' => $slug,
            'container' => 'nav',
            'container_class' => $slug
        );
        wp_nav_menu($menu);
    }
}

/**
 * Add testimonials
 */
require_once( get_template_directory() . '/lib/testimonials.php' );

add_action( 'wp_enqueue_scripts','stn_frontend_scripts' );
add_filter( 'wp_default_editor', create_function('', 'return "tinymce";') );
/**
 * Enqueue js  css
 */
function stn_frontend_scripts() {
    /*============ Styles ============ */
    wp_enqueue_style( 'styles',   get_template_directory_uri() . '/css/style.css');
    wp_enqueue_style( 'custom',   get_template_directory_uri() . '/css/custom.css');
    wp_enqueue_style( 'styles-editor',   get_template_directory_uri() . '/style.css');
    wp_enqueue_style( 'filter',   get_template_directory_uri() . '/css/filtrify.css');
    /*============ Javascripts ============ */
    wp_enqueue_script( 'jquery',   get_template_directory_uri() . '/js/jquery.js');
    wp_enqueue_script( 'custom',   get_template_directory_uri() . '/js/custom.js',array('jquery'), '3.1.1', true);
}