<?php
/**
 * Trooper Lite functions and definitions to setup theme
 * and provides some helper functions.
 *
 * @package Radar Themes
 * @subpackage Trooper Lite
 * @since Trooper Lite 1.0.0
 *
 */

 // Define file directories
define('TROOPER_THEME_VERSION', '1.0');
define('TROOPER_HOME', 			trailingslashit(get_template_directory()));
define('TROOPER_FUNCTIONS', 	trailingslashit(get_template_directory()) . 'functions');
define('TROOPER_ASSETS', 		trailingslashit(get_template_directory()) . 'assets');
define('TROOPER_INC', 			trailingslashit(get_template_directory()) . 'inc');

class Trooper_Lite_Setup {

    // Theme version
    protected $version;

    // Theme unique id
    protected $theme_slug;

    public function __construct() {
        $this->version = '1.0';
        $this->theme_slug = 'trooper-lite';
    }

    function trooper_lite_setup() {

        global $content_width;

        /**
         * Set up the content width value based on the theme's design.
         */
        if (!isset($content_width)) {
            $content_width = 980;
        }

        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         */
        load_theme_textdomain( 'trooper-lite', get_template_directory() . '/languages' );

        // This theme styles the visual editor with editor-style.css to match the theme style.
        add_editor_style();

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/reference/functions/add_theme_support/#post-thumbnails
         */
        add_theme_support('post-thumbnails');

        /**
         * Enables plugins and themes to manage the document title tag.
         *
         * #link https://developer.wordpress.org/reference/functions/add_theme_support/#title-tag
         */
        add_theme_support("title-tag");

        /*
         * Enable support for Post Formats.
         * See https://developer.wordpress.org/reference/functions/add_theme_support/#post-formats
         */
        add_theme_support('post-formats', array('video', 'audio', 'gallery', 'status', 'quote'));

        /**
         * Enable support for custom Logo image
         * See ...
         */
        add_theme_support( 
            'custom-logo',             
            array(
                'height'      => 120,
                'width'       => 120,
                'flex-height' => true,
                'flex-width'  => true,
                'header-text' => array( 'site-title', 'site-description' ),
            )
        );

        // Modify post gallery
        add_filter('post_gallery', array($this, 'modify_post_gallery'));

        // Modify Read More link
        add_filter('the_content_more_link', array($this, 'modify_read_more_link'));

        // Modify Comments
        add_filter('the_content_more_link', array($this, '_trooper_lite_comment'));

        // Register Widgets for sidebar
        add_action('widgets_init', 'trooper_lite_register_widgets');

        // Register Customizer
        add_action('customize_preview_init', 'trooper_lite_customize_preview_js_css');

        // Add JS/Style
        add_action('wp_enqueue_scripts', array($this, 'trooper_lite_enqueue_scripts'));
        add_action('wp_enqueue_scripts', array($this, 'trooper_lite_enqueue_styles'));
        add_action('admin_enqueue_scripts', array($this, 'trooper_lite_admin_scripts'));


        function paginate_opts($opt) {
            switch ($opt) {
                case "page_numbers":
                    trooper_lite_pagenavi();
                break;

                case "page_default":
                    the_posts_pagination();
                break;

                default:
            }
        }


    } // end trooper-lite setup

    /**
     * Post gallery modification.
     *
     * @return string Modified post gallery.
     */

    public function modify_post_gallery() {
        $post = get_post(get_the_ID());
        if (!$post) {
            return array();
        }
        if (!has_shortcode($post->post_content, 'gallery')) {
            return array();
        }
        $images_ids = array();
        if (preg_match_all('/' . get_shortcode_regex() . '/s', $post->post_content, $matches, PREG_SET_ORDER)) {
            foreach ($matches as $shortcode) {
                if ('gallery' === $shortcode[2]) {
                    $data = shortcode_parse_atts($shortcode[3]);
                    if (!empty($data['ids'])) {
                        $images_ids = explode(',', $data['ids']);
                    }
                }
            }
        }

        $gallery = $images_ids;

        $output = '<div class="rt-gallery centered">';
        $output .= '<div class="photoset-grid" data-layout="1231">';
        foreach ($gallery as $attachment):
            $output .= wp_get_attachment_image($attachment, 'large');
        endforeach;
        $output .= '</div></div>';
        return $output;
    }

    public function modify_read_more_link() {
        return '';
    }

    public function _trooper_lite_comment() {
        return;
    }

    /**
     * Enqueue styles.
     */
    function trooper_lite_enqueue_styles() {
        // Add fonts, used in the main stylesheet.
        wp_enqueue_style( 'trooper-font', 'https://fonts.googleapis.com/css?family=Unica+One', array(), $this->version );
        wp_enqueue_style( 'trooper-font-poppins', 'https://fonts.googleapis.com/css?family=Poppins:200,300,400,500', array(), $this->version );

        // Font Awesome icons font style
        wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/assets/css/icons/font-awesome.min.css', array(), '4.7' );

        // Lightbox Gallery
        wp_enqueue_style( 'lightbox', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '4.7' );

        // Load our main stylesheet.
        wp_enqueue_style( 'trooper-style', get_stylesheet_uri(), array(), $this->version );

    }

    /**
     * Enqueue scripts.
     */
    function trooper_lite_enqueue_scripts() {
        wp_enqueue_script( 'trooper-plugins', get_template_directory_uri() . '/assets/js/plugins.js', array( 'jquery' ), '1.1', true );
        wp_enqueue_script( 'trooper-main',  get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), $this->version, true );

        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }

    /**
     * Enqueue admin scripts
     */
    
    function trooper_lite_admin_scripts() {
        if(is_admin()) {
            wp_enqueue_script('trooper-admin-script', get_template_directory_uri()  . '/assets/js/admin-script.js', array('jquery'), $this->version, true);
        }
    }

}

$trooper_lite_setup = new Trooper_Lite_Setup();
add_action( 'after_setup_theme', array( $trooper_lite_setup, 'trooper_lite_setup' ), 16 );

// Customizer Options
require_once (TROOPER_FUNCTIONS . '/customizer.php');

// Customizer bindings
require_once (TROOPER_INC . '/misc/customizer-init.php');

// Tags for posts
require_once (TROOPER_INC . '/misc/template-core.php');

 // Sub Menu declarations
require_once (TROOPER_INC . '/misc/menus.php');

// Pagination
require_once (TROOPER_INC . '/misc/pagination.php');

// Sidebar widget area
require_once (TROOPER_INC . '/misc/widgets.php');
