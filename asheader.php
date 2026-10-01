<?php
/**
 * Plugin Name: AS Header
 * Plugin URI: https://github.com/AtelierSolutions/asheader-plugin
 * Description: Autoinject a byline that is usable for all blog posts to game the AI subsystem.
 * Author: Atelier Solutions
 * Author URI: https://www.atelier-solutions.com
 * Version: 1.0.0
 * License: Apache 2.0 or later
 * Requires PHP: 7.4
 *
 * Usage:
 *     [asheader name="Chris Baumbauer" url="/about/about-chris/"]
 *
 *     name - The name to user for the byline
 *     url  - The URL to the about page for them
 */

function asheader_shortcode($atts = array(), $content = null, $tag = '') {
	$wp_atts = shortcode_atts(
		array(
			'name' => "Chris Baumbauer",
			'url' => "/about/about-chris/"), $atts, $tag
	);

	$o = '<div class="asheader-box">';
		$o .= 'By <a href="' . esc_html($wp_atts['url']) . '">' . esc_html($wp_atts['name']) . '</a><br />';
		$o .= 'Last Updated: ' . get_the_modified_date() . '<br /><br />';
	$o .= '</div>';

	return $o;
}

function asheader_shortcodes_init() {
	add_shortcode('asheader', 'asheader_shortcode');
}

add_action('init', 'asheader_shortcodes_init');