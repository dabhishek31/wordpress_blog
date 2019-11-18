<?php 
/**
 * The default template for displaying content
 * 
 * @package Radar Themes
 * @subpackage Trooper Lite
 * @since Trooper Lite 1.0.0
 *
 */

?>

<?php
	
	while ( have_posts() ):
		the_post();
			get_template_part("loop","standard");

	endwhile;

	 paginate_opts(get_theme_mod('trooper_lite_pagnavi'))

?>