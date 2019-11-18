<?php 
/**
 *
 * @package Radar Themes
 * @subpackage Trooper Lite
 * @since Trooper Lite 1.0.0
 *
 */

get_header(); ?>

<section class="page_404">

    <h2><?php printf("%s", esc_html__('404', 'trooper-lite')); ?></h2>
    <h4><?php printf("%s", esc_html__('Page Not Found!', 'trooper-lite')); ?></h4>
    <p><?php printf("%s", esc_html__('Sorry, we could not find that page for some odd reason. Perhaps searching down below will help you find it next time around.', 'trooper-lite')); ?></p>
    
    <div class="search-box">
		<?php get_template_part( "searchform" ); ?>
    </div>

</section>

<?php get_sidebar(); ?>
<?php get_footer(); ?>