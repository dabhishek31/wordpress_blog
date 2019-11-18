<?php
/**
 *
 * @package Radar Themes
 * @subpackage Trooper Lite
 * @since Trooper Lite 1.0.0
 *
 */

function trooper_lite_pagenavi($pages = '', $range = 4) {
	$showitems = ($range * 2)+1;

	$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
	if(empty($paged)) $paged = 1;

	if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages) {
			$pages = 1;
		}
	}

	if(1 != $pages) {
		echo "<div class=\"pagination\">";
		if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
			echo sprintf('<a href="%s" title="%s">%s</a>', esc_attr(get_pagenum_link(1), 'trooper-lite'), esc_html('Next Page', 'trooper-lite'), esc_html( '&laquo;', 'trooper-lite' ) );
		if($paged > 1 && $showitems < $pages) 
			echo sprintf('<a href="%s" title="%s">%s</a>', esc_attr(($paged - 1), 'trooper-lite'), esc_html('Previous Page', 'trooper-lite'), esc_html( '&lsaquo;', 'trooper-lite' ) );

		for ($i=1; $i <= $pages; $i++) {
			if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
				if ($paged == $i):
					echo sprintf('<span class="current">%s</span>', esc_html($i, 'trooper-lite'));
				else:
					echo sprintf('<a href="%s" id="page-%s" class="inactive">%s</a>', esc_html(get_pagenum_link($i), 'trooper-lite' ), esc_html($i, 'trooper-lite'),esc_html($i, 'trooper-lite'));
				endif;
			}
		}
		echo "</div>\n";
	}
}