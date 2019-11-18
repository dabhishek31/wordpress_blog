<?php
/**
 * Theme dropdown menu classes.
 *
 * Contains functions to make dropdown sub menus for both sidebar menus included in
 * the Trooper Lite Theme.
 *
 * @package Radar Themes
 * @subpackage Trooper Lite
 * @since Trooper Lite 1.0.0
 *
 */

// Default menu drop-down
class trooper_lite_submenu extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = Array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"drilldown-sub\">\n";
		$output .= '<li class="drilldown-back"><a href="#"><i class="fa fa-angle-left"></i>Back</a></li>';
	}
}

// Wide menu drop-down
class trooper_lite_submenu_alt extends Walker_Nav_Menu {
	function start_lvl(&$output, $depth = 0, $args = Array()) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu-child sub-menu-hide\">\n";
	}
}