<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php wp_head(); ?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>" charset="<?php bloginfo('charset'); ?>">
</head>

<body <?php body_class( "full-page" ); ?>>

    <div id="wrapper">

    <div id="mobile-header-bar">
    <a href="#" id="widget-icon"><i class="fa fa-bars"></i></a>
        <!--================= TOGGLE MENU ==================-->
        <div class="menuNav" id="menu-toggle"><span></span><span></span><span></span></div>
    </div>

    <!-- Main Sidebar -->
    <?php get_template_part("/inc/misc/sidebar", "main") ?>


    <div id="page-content-wrapper">