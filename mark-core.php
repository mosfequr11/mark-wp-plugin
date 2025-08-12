
<?php
/**
 * Plugin Name: Mark
 * Description: Mark is test Plugin
 * Plugin URI: https://mosfequr.com/
 * Version: 1.1.0
 * Author: Mosfequr
 * Author URI: https://mosfequr.com/
 * Text Domain: elementor
 */

// Activation hook
function mark_activation_hook()
{
	// Code to run on activation
	error_log(message: 'Plugin activated!');
}
register_activation_hook(__FILE__, 'mark_activation_hook');

// Deactivation hook
function mark_deactivation_hook()
{
	// Code to run on deactivation
	error_log('Plugin deactivated!');
}
register_deactivation_hook(__FILE__, 'mark_deactivation_hook');



// Load plugin textdomain
function wordcount_load()
{
	load_plugin_textdomain('mark-core', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'wordcount_load');

// Show word count after post title
function mark_show_word_count_after_title($title, $id = null)
{
	if (is_singular('post') && in_the_loop() && !is_admin()) {
		$content = get_post_field('post_content', $id);
		$word_count = str_word_count(wp_strip_all_tags($content));

		// Append word count to the title
		$title .= ' <span style="font-size:14px; color:#888;">(' . sprintf(__('%s words', 'mark-core'), $word_count) . ')</span>';
	}
	return $title;
}
add_filter('the_title', 'mark_show_word_count_after_title', 10, 2);
