<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Radar Themes
 * @subpackage Trooper Lite
 * @since Trooper Lite 1.0.0
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("abcd"); ?>>
  <div class="inner p60">

    <div class="date">
        <?php printf("%s ", get_the_date(get_option( 'date_format' ))); ?>
    </div>

	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h1 class="entry-title"><a class="animsition-link" href="' . esc_url( get_permalink() ) . '" rel="'. get_the_ID() .'">', '</a></h1>' );
		endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'trooper-lite' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'trooper-lite' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-bottom">
		<div class="tags">
			<?php trooper_lite_get_tags(); ?>
		</div>

		<div class="share-post pull-right">
			<?php printf( '<a href="%s" title="%s">%s</a>', esc_url(get_permalink()), esc_html(get_the_title()), esc_html('Read More', 'trooper-lite')  ); ?>
		</div>
	</footer>


</div><!-- end inner -->
</article><!-- #post-<?php the_ID(); ?> -->
