<?php
/**
 *
 * @package Radar Themes
 * @subpackage Trooper Lite
 * @since Trooper Lite 1.0.0
 *
 */

    $site_general_color = echo esc_attr((get_theme_mod("__trooper_lite_site_color"), 'trooper-lite');
?>

<style type="text/css">
    a:hover{
        color: <?php $site_general_color ?> !important;
        text-decoration: none;
    }

    .bypostauthor .fn a {
        color: <?php $site_general_color ?> !important;
    }

    .pagination a:hover {
        border-color: <?php $site_general_color ?> !important;
    }

    .pagination .current {
        color: #121212;
        border-color: <?php $site_general_color ?> !important;
    }

    .sidebar-nav .drilldown-container li.active a,
    .sidebar-nav .drilldown-container li a:hover{
        color: <?php $site_general_color ?> !important;
    }

    a.social-icon:hover >i {
        color: <?php $site_general_color ?> !important;
    }

    .post-article.post-quote .post-content blockquote a:hover{
        color: <?php $site_general_color ?> !important;
    }

    .post-article ul.post-author li a:hover,
    .post-article ul.post-author li a:focus{
        text-decoration: none;
        color: <?php $site_general_color ?> !important;
    }

    .post-article .post-content .post-title a:hover,
    .post-article .post-content .post-title a:focus{
        color: <?php $site_general_color ?> !important;
        text-decoration: none;
    }

    .post-article .post-content .post-title a:hover,
    .post-article .post-content .post-title a:focus{
        color: <?php $site_general_color ?> !important;
        text-decoration: none;
    }

    .post-type-blog.single .post-article .post-content blockquote,
    .post blockquote {
        border-left: 5px solid <?php $site_general_color ?> !important;
    }

    ul.recent-post li .item-text h6 a:hover{color: <?php $site_general_color ?>;}

    ul.widget-link > li > a:hover:before,
    ul.widget-link > li.active > a:before{
        content: "\f111";
        color: <?php $site_general_color ?> !important;
    }

    .send_btn:focus, .send_btn:hover,
    .comment-reply-link:focus, .comment-reply-link:hover {
        background-color: <?php $site_general_color ?> !important;
        border: 1px solid <?php $site_general_color ?> !important;
        color: #fff !important;
        text-decoration: none;
        outline: 0;
    }

</style>