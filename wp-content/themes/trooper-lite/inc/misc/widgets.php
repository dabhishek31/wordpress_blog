<?php
/**
 * Defines a sidebar widget area.
 *
 * @package Radar Themes
 * @subpackage Trooper Lite
 * @since Trooper Lite 1.0.0
 *
 */

if ( ! function_exists( 'trooper_lite_register_widgets' ) ) :
    function trooper_lite_register_widgets () {
        register_sidebar(
            array(
                'name'          => __( 'Panel Area', 'trooper-lite' ),
                'id'            => 'sidebar',
                'class'         => 'normal',
                'before_widget' => '<div class="widget">',
                'after_widget'  => '<div class="clearfix"></div></div>',
                'before_title'  => '<h4>',
                'after_title'   => '</h4>'
            )
        );
    }
endif;