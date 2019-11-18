<?php
/**
 * Trooper Lite customizer/theme options definitions to change the
 * look and feel of the website.
 *
 * @package Radar Themes
 * @subpackage Trooper Lite
 * @since Trooper Lite 1.0.0
 *
 */
function trooper_lite_customizer_register($wp_customize) {

    $wp_customize->add_panel(
        'trooper_lite_general_panel',
        array(
            'priority' => 250,
            'capability' => 'edit_theme_options',
            'title' => __('General settings', 'trooper-lite'),
            'description' => __('You can configure your general theme settings here', 'trooper-lite')
        )
    );


    $wp_customize->add_section(
        'trooper_lite_general_logo',
        array(
            'priority' => 10,
            'capability' => 'edit_theme_options',
            'title' => __('Avatar', 'trooper-lite'),
            'description' => __('Please upload your avatar, recommended size should be between 250x250', 'trooper-lite'),
            'panel' => 'trooper_lite_general_panel'
        )
    );

    $wp_customize->add_setting('trooper_lite_logo_name', array('sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage'));
    $wp_customize->add_control(
        'trooper_lite_logo_name',
        array(
            'label' => __('Personal Name', 'trooper-lite'),
            'description' => __('What name would you like to display?', 'trooper-lite'),
            'section' => 'trooper_lite_general_logo',
            'type' => 'text',
        )
    );

    $wp_customize->add_setting('trooper_lite_author_snippet', array('sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage'));
    $wp_customize->add_control(
        'trooper_lite_author_snippet',
        array(
            'label' => __('Short Bio.', 'trooper-lite'),
            'description' => __('Something cool about you?', 'trooper-lite'),
            'section' => 'trooper_lite_general_logo',
            'type' => 'textarea',
        )
    );

    $wp_customize->add_section(
        'trooper_lite_menu_style',
        array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'title' => __('Menu Style', 'trooper-lite'),
            'description' => __('Select a menu layout style', 'trooper-lite'),
            'panel' => 'trooper_lite_general_panel'
        )
    );

    $wp_customize->add_setting('trooper_lite_menu_transition', array('default' => 'menu_slide_right', 'sanitize_callback' => 'trooper_lite_sanitize_select'));
    $wp_customize->add_control(
        'trooper_lite_menu_transition',
        array(
            'type' => 'select',
            'label' => __('Menu Transitions', 'trooper-lite'),
            'description' => __('Select a menu type that you would like to use for the main sidebar', 'trooper-lite'),
            'section' => 'trooper_lite_menu_style',
            'choices' => array(
                'menu_slide_right' => __('Slide Right', 'trooper-lite'),
                'menu_toggle' => __('Toggle Up and down', 'trooper-lite')
            )
        )
    );

    $wp_customize->add_section(
        'trooper_lite_general_footer',
        array(
            'priority' => 100,
            'capability' => 'edit_theme_options',
            'title' => __('Copyright', 'trooper-lite'),
            'description' => __('Footer copyright text.', 'trooper-lite'),
            'panel' => 'trooper_lite_general_panel'
        )
    );

    $wp_customize->add_setting('trooper_lite_footer_cpy', array('sanitize_callback' => 'sanitize_text_field', 'transport' => 'postMessage'));
    $wp_customize->add_control(
        'trooper_lite_footer_cpy',
        array(
            'label' => '',
            'section' => 'trooper_lite_general_footer',
            'type' => 'textfield'
        )
    );
    
    $wp_customize->add_section(
        'trooper_lite_general_footer_scripts',
        array(
            'priority' => 100,
            'capability' => 'edit_theme_options',
            'title' => __('Scripts', 'trooper-lite'),
            'description' => __('Add all scripts here.', 'trooper-lite'),
            'panel' => 'trooper_lite_general_panel'
        )
    );

    $wp_customize->add_setting('trooper_lite_footer_scripts', array('sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control(
        'trooper_lite_footer_scripts',
        array(
            'label' => '',
            'section' => 'trooper_lite_general_footer_scripts',
            'type' => 'textarea'
        )
    );

    $wp_customize->add_section(
        'trooper_lite_general_page_navi',
        array(
            'priority' => 100,
            'capability' => 'edit_theme_options',
            'title' => __('Pagination', 'trooper-lite'),
            'description' => __('Choose a type of pagination.', 'trooper-lite'),
            'panel' => 'trooper_lite_general_panel'
        )
    );

    $wp_customize->add_setting('trooper_lite_pagnavi', array('default' => 'page_default', 'sanitize_callback' => 'trooper_lite_sanitize_select' ));
    $wp_customize->add_control(
        'trooper_lite_pagnavi',
        array(
            'type' => 'select',
            'label' => 'Pagination Type',
            'description' => 'Select a paginate option',
            'section' => 'trooper_lite_general_page_navi',
            'choices' => array(
                'page_numbers' => __('Page Numbers', 'trooper-lite'),
                'page_default' => __('Older/Newer Post', 'trooper-lite')
            )
        )
    );

    // Add Header setting panel and configure settings inside it
    $wp_customize->add_panel(
        'trooper_lite_social_panel',
        array(
            'priority' => 250,
            'capability' => 'edit_theme_options',
            'title' => __('Social Networks', 'trooper-lite'),
            'description' => __('You can configure your theme side-menu settings here.', 'trooper-lite')
        )
    );


    // Add social network setting panel and configure settings inside it
    $wp_customize->add_panel(
        'trooper_lite_sm_panel',
        array(
            'priority' => 250,
            'capability' => 'edit_theme_options',
            'title' => __('Social Media', 'trooper-lite'),
            'description' => __('You can configure your themes social media settings here.', 'trooper-lite')
        )
    );

    // 404 page title
    $wp_customize->add_section(
        'trooper_lite_sm_page_title',
        array(
            'priority' => 40,
            'capability' => 'edit_theme_options',
            'title' => __('Page Title', 'trooper-lite'),
            'description' => __('Set the page title that is displayed on the 404 Error Page.', 'trooper-lite'),
            'panel' => 'trooper_lite_sm_panel'
        )
    );

    $wp_customize->add_setting('trooper_lite_sm_panel', array('sanitize_callback' => 'sanitize_text_field'));

    // Header twitter
    $wp_customize->add_section(
        'trooper_lite_social_twitter',
        array(
            'priority' => 10,
            'capability' => 'edit_theme_options',
            'title' => __('Twitter', 'trooper-lite'),
            'description' => __('Twitter URL for your menu social icon.', 'trooper-lite'),
            'panel' => 'trooper_lite_social_panel'
        )
    );

    $wp_customize->add_setting('trooper_lite_sm_tw', array('sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(
        'trooper_lite_sm_tw',
        array(
            'label' => 'Twitter URL',
            'section' => 'trooper_lite_social_twitter',
            'type' => 'url',
        )
    );

    // Header facebook
    $wp_customize->add_section(
        'trooper_lite_social_facebook',
        array(
            'priority' => 20,
            'capability' => 'edit_theme_options',
            'title' => __('Facebook', 'trooper-lite'),
            'description' => __('Facebook URL for your menu social icon.', 'trooper-lite'),
            'panel' => 'trooper_lite_social_panel'
        )
    );

    $wp_customize->add_setting('trooper_lite_sm_fb', array('sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(
        'trooper_lite_sm_fb',
        array(
            'label' => 'Facebook URL',
            'section' => 'trooper_lite_social_facebook',
            'type' => 'url',
        )
    );

    // Header google plus
    $wp_customize->add_section(
        'trooper_lite_social_gplus',
        array(
            'priority' => 30,
            'capability' => 'edit_theme_options',
            'title' => __('Google+', 'trooper-lite'),
            'description' => __('Google+ URL for your menu social icon.', 'trooper-lite'),
            'panel' => 'trooper_lite_social_panel'
        )
    );

    $wp_customize->add_setting('trooper_lite_sm_gp', array('sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(
        'trooper_lite_sm_gp',
        array(
            'label' => 'Google+ URL',
            'section' => 'trooper_lite_social_gplus',
            'type' => 'url',
        )
    );

    // Header pinterest
    $wp_customize->add_section(
        'trooper_lite_social_pinterest',
        array(
            'priority' => 40,
            'capability' => 'edit_theme_options',
            'title' => __('Pinterest', 'trooper-lite'),
            'description' => __('Pinterest URL for your menu social icon.', 'trooper-lite'),
            'panel' => 'trooper_lite_social_panel'
        )
    );

    $wp_customize->add_setting('trooper_lite_sm_pt', array('sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(
        'trooper_lite_sm_pt',
        array(
            'label' => 'Pinterest URL',
            'section' => 'trooper_lite_social_pinterest',
            'type' => 'url',
        )
    );

    // Header instagram
    $wp_customize->add_section(
        'trooper_lite_social_instagram',
        array(
            'priority' => 50,
            'capability' => 'edit_theme_options',
            'title' => __('Instagram', 'trooper-lite'),
            'description' => __('Instagram URL for your menu social icon.', 'trooper-lite'),
            'panel' => 'trooper_lite_social_panel'
        )
    );

    $wp_customize->add_setting('trooper_lite_sm_insta', array('sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(
        'trooper_lite_sm_insta',
        array(
            'label' => 'Instagram URL',
            'section' => 'trooper_lite_social_instagram',
            'type' => 'url',
        )
    );

    // Header vimeo
    $wp_customize->add_section(
        'trooper_lite_social_vimeo',
        array(
            'priority' => 60,
            'capability' => 'edit_theme_options',
            'title' => __('Vimeo', 'trooper-lite'),
            'description' => __('Vimeo URL for your menu social icon.', 'trooper-lite'),
            'panel' => 'trooper_lite_social_panel'
        )
    );

    $wp_customize->add_setting('trooper_lite_sm_vm', array('sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(
        'trooper_lite_sm_vm',
        array(
            'label' => 'Vimeo URL',
            'section' => 'trooper_lite_social_vimeo',
            'type' => 'url',
        )
    );

    // Header flickr
    $wp_customize->add_section(
        'trooper_lite_social_flickr',
        array(
            'priority' => 60,
            'capability' => 'edit_theme_options',
            'title' => __('Flickr', 'trooper-lite'),
            'description' => __('Flicker URL for your menu social icon.', 'trooper-lite'),
            'panel' => 'trooper_lite_social_panel'
        )
    );

    $wp_customize->add_setting('trooper_lite_sm_flkr', array('sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(
        'trooper_lite_sm_flkr',
        array(
            'label' => 'Flickr URL',
            'section' => 'trooper_lite_social_flickr',
            'type' => 'url',
        )
    );

    // Header soundcloud
    $wp_customize->add_section(
        'trooper_lite_social_soundcloud',
        array(
            'priority' => 60,
            'capability' => 'edit_theme_options',
            'title' => __('Soundcloud', 'trooper-lite'),
            'description' => __('Soundcloud URL for your menu social icon.', 'trooper-lite'),
            'panel' => 'trooper_lite_social_panel'
        )
    );

    $wp_customize->add_setting('trooper_lite_sm_sc', array('sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(
        'trooper_lite_sm_sc',
        array(
            'label' => 'Soundcloud URL',
            'section' => 'trooper_lite_social_soundcloud',
            'type' => 'url',
        )
    );

    // Header Youtube
    $wp_customize->add_section(
        'trooper_lite_social_youtube',
        array(
            'priority' => 60,
            'capability' => 'edit_theme_options',
            'title' => __('Youtube', 'trooper-lite'),
            'description' => __('Youtube URL for your menu social icon.', 'trooper-lite'),
            'panel' => 'trooper_lite_social_panel'
        )
    );

    $wp_customize->add_setting('trooper_lite_sm_yt', array('sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(
        'trooper_lite_sm_yt',
        array(
            'label' => 'Youtube URL',
            'section' => 'trooper_lite_social_youtube',
            'type' => 'url',
        )
    );

    // Header Twitch Tv
    $wp_customize->add_section(
        'trooper_lite_social_twitch',
        array(
            'priority' => 60,
            'capability' => 'edit_theme_options',
            'title' => __('Twitch', 'trooper-lite'),
            'description' => __('Twitch URL for your menu social icon.', 'trooper-lite'),
            'panel' => 'trooper_lite_social_panel'
        )
    );

    $wp_customize->add_setting('trooper_lite_sm_twch', array('sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(
        'trooper_lite_sm_twch',
        array(
            'label' => 'Twitch URL',
            'section' => 'trooper_lite_social_twitch',
            'type' => 'url',
        )
    );

    // Header linkedin
    $wp_customize->add_section(
        'trooper_lite_social_linkedin',
        array(
            'priority' => 60,
            'capability' => 'edit_theme_options',
            'title' => __('Linkedin', 'trooper-lite'),
            'description' => __('Linkedin URL for your menu social icon.', 'trooper-lite'),
            'panel' => 'trooper_lite_social_panel'
        )
    );

    $wp_customize->add_setting('trooper_lite_sm_lnk', array('sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(
        'trooper_lite_sm_lnk',
        array(
            'label' => 'Linkedin URL',
            'section' => 'trooper_lite_social_linkedin',
            'type' => 'url',
        )
    );

    // Header Stackoverflow
    $wp_customize->add_section(
        'trooper_lite_social_stackoverflow',
        array(
            'priority' => 60,
            'capability' => 'edit_theme_options',
            'title' => __('Stackoverflow', 'trooper-lite'),
            'description' => __('Stackoverflow URL for your menu social icon.', 'trooper-lite'),
            'panel' => 'trooper_lite_social_panel'
        )
    );

    $wp_customize->add_setting('trooper_lite_sm_so', array('sanitize_callback' => 'esc_url_raw'));
    $wp_customize->add_control(
        'trooper_lite_sm_so',
        array(
            'label' => 'Stackoverflow URL',
            'section' => 'trooper_lite_social_stackoverflow',
            'type' => 'url',
        )
    );

    $wp_customize->add_section(
        'trooper_lite_social_ex_options',
        array(
            'priority' => 60,
            'capability' => 'edit_theme_options',
            'title' => __('Manager', 'trooper-lite'),
            'description' => __('What kind of icons would you like to display in the left sidebar?', 'trooper-lite'),
            'panel' => 'trooper_lite_social_panel'
        )
    );

    $wp_customize->add_setting('trooper_lite_sm_exopt', array('sanitize_callback' => 'sanitize_text_field'));
    $wp_customize->add_control(
        'trooper_lite_sm_exopt',
        array(
            'label' => 'Show social media icons in left sidebar?',
            'section' => 'trooper_lite_social_ex_options',
            'type' => 'checkbox'
        )
    );

    $wp_customize->selective_refresh->add_partial(
        'trooper_lite_logo_name',
        array(
            'selector' => '#site-title',
        )
    );

    $wp_customize->selective_refresh->add_partial(
        'trooper_lite_author_snippet',
        array(
            'selector' => '#site-description',
        )
    );
    // not working
    $wp_customize->selective_refresh->add_partial(
        'trooper_lite_logo',
        array(
            'selector' => '#site-avatar',
        )
    );

    $wp_customize->selective_refresh->add_partial(
        'trooper_lite_footer_cpy',
        array(
            'selector' => '#footer-text',
        )
    );


    $wp_customize->get_control('custom_logo')->section = 'trooper_lite_general_logo';

}

add_action('customize_register', 'trooper_lite_customizer_register');

/**
 *
 * @param $input
 *
 * @return bool
 * @since Trooper Lite 1.0.0
 */
function trooper_lite_sanitize_checkbox($input) {
    // Boolean check
    return ((isset($input) && true == $input) ? true : false);
}

/**
 *
 * @param $input
 *
 * @return bool
 * @since Trooper Lite 1.0.0
 */
function trooper_lite_sanitize_select($input, $setting) {
    $input = sanitize_key($input);
    $choices = $setting->manager->get_control( $setting->id )->choices;
                     
    //return input if valid or return default option
    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );             
}


/**
 * Bind JS handlers to make Theme Customizer preview reload changes asynchronously.
 * This outputs the javascript needed to automate the live settings preview.
 * Also keep in mind that this function isn't necessary unless your settings
 * are using 'transport'=>'postMessage' instead of the default 'transport'
 * => 'refresh'
 *
 * Used by hook: 'customize_preview_init'
 *
 * @since Trooper Lite 1.0.0
 */
function trooper_lite_customize_preview_js() {
    wp_enqueue_script('trooper_lite_customizer', get_template_directory_uri() . '/assets/js/theme-customizer.js', array('customize-preview'), '20180318', true);
}

add_action('customize_preview_init', 'trooper_lite_customize_preview_js');