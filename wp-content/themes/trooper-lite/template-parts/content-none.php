<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Radar Themes
 * @subpackage Trooper Lite
 * @since Trooper Lite 1.0.0
 */

?>

<section class="page_404">

	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e( 'Nothing Found', 'trooper-lite' ); ?></h1>
	</header><!-- .page-header -->

  <h2><?php esc_html_e('404', 'trooper-lite'); ?></h2>

	<?php if ( is_search() ) : ?>

		<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'trooper-lite' ); ?></p>
    
    <div class="search-box">
			<?php get_search_form(); ?>
    </div>

	<?php else : ?>

		<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'trooper-lite' ); ?></p>
    
    <div class="search-box">
			<?php get_search_form(); ?>
    </div>

	<?php endif; ?>	    

</section> 