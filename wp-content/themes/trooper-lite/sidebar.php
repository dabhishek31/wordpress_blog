<?php
/**
 * The sidebar definer for displaying widgets
 *
 * @package Radar Themes
 * @subpackage Trooper Lite
 * @since Trooper Lite 1.0.0
 *
 */
?>

<div id="panel-container" style="display: none;">

    <div class="slideout-menu-close-btn"><i class="fa fa-remove"></i></div>

    <div id="panel-sb" class="content_2">

        <div class="sidebar_closed" id="sidebar_closed" title="Close Sidebar" data-toggle="tooltip">
            <i class="icon-close"></i>
        </div>

        <?php

        if ( is_active_sidebar( 'sidebar' ) ) :
            dynamic_sidebar( 'sidebar' );
        else :

    /*
     * This content shows up if there are no widgets defined in the backend.
    */
    ?>

    <div class="no-widgets">
        <p><?php esc_html( 'This is a widget ready area. Add some and they will appear here.', 'trooper-lite' );  ?></p>
    </div>

    <?php endif; ?>

    </div>
</div>
