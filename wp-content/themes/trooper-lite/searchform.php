<?php
/**
 *
 * @package Radar Themes
 * @subpackage Trooper Lite
 * @since Trooper Lite 1.0.0
 *
 */

global $trooper_lite_search_form_button, $trooper_lite_is_in_sidebar;


	if ($trooper_lite_search_form_button == 'searchButton' || get_search_query() == '') {
		$search_string = '';
	} else {
		$search_string = get_search_query();
	}

	if (empty($trooper_lite_search_form_button)) {
		$trooper_lite_search_form_button = 'submitButton';
	}

	$class      = 'footer_search_input';
	$form_class = ' gray-form';

	if ( $trooper_lite_is_in_sidebar === true ) {
		$class      = 'rt-search-input';
		$search_string = '';
		$form_class = '';
	} elseif ( is_search() && $trooper_lite_is_in_sidebar === 'content' ) {
		$class      = 'span5';
		$form_class = '';
	}
	$random = rand();
?>

<div class="search radar-search" id="radar-search-<?php echo esc_attr( $random ); ?>">
	<form action="<?php echo esc_url(home_url()); ?>" method="get" class="<?php echo esc_attr( $form_class ); ?> search-form" role="search">
		<input type="text" name="s" class="<?php echo esc_attr( $class ); ?> search-field" value="<?php echo esc_attr( $search_string ); ?>" placeholder="<?php esc_html('Type here for search...', 'trooper-lite'); ?>"/>
	</form>
</div>