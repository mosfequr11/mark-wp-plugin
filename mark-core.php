
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
	error_log('Plugin activated!');
}
register_activation_hook(__FILE__, 'mark_activation_hook');

// Deactivation hook
function mark_deactivation_hook()
{
	// Code to run on deactivation
	error_log('Plugin deactivated!');
}
register_deactivation_hook(__FILE__, 'mark_deactivation_hook');



// Load a textdomain (optional for translation support).
function wordcount_load()
{
	load_plugin_textdomain('mark-core', false, dirname(plugin_basename(__FILE__)) . '/languages');
}
add_action('plugins_loaded', 'wordcount_load');

// Show word count after post title
// function mark_show_word_count($content)
// {
// 	if (is_singular('post')) {
// 		// $content = get_post_field('post_content');
// 		// echo "<pre>";
// 		// print_r($content);
// 		// echo "</pre>";
// 		$trip_post = wp_strip_all_tags($content);
// 		$word_count = str_word_count($trip_post);
// 		// var_dump($word_count);

// 		// Append word count to the title
// 		$content .= ' <span style="font-size:14px; color:#888;">(' . sprintf(__('%s words', 'mark-core'), $word_count) . ')</span>';
// 	}
// 	return $content;
// }

function mark_show_word_count($content)
{
	$trip_post = wp_strip_all_tags($content);
	$word_count = str_word_count($trip_post);
	$label = __('Total number of words', 'mark-core');
	$label = apply_filters("mark_heading", $label);
	$tag = apply_filters("mark_tag", "h2");
	$content .= sprintf('<%s>%s: %s</%s>', $tag, $label, $word_count, $tag);
	return $content;
}
add_filter('the_content', 'mark_show_word_count', 10, 2);

//Change the Label
function mark_wordcount_heading($h_heading)
{
	$h_heading = "Total Count";
	return  $h_heading;
}
add_filter("mark_heading", "mark_wordcount_heading");

//Change the tag
function mark_wordcount_tag($t_tag)
{
	$t_tag = "h5";
	return  $t_tag;
}
add_filter("mark_tag", "mark_wordcount_tag");

// Check Content reading time
function mark_reading_time($content)
{
	$strip_post = wp_strip_all_tags($content);
	$word_count = str_word_count($strip_post);
	$reading_minute = floor($word_count / 200);
	$reading_second = floor($word_count % 200 / (200 / 60));
	$label = __('Reading time', 'mark-core');
	$label = apply_filters("mark_heading", $label);
	$tag = apply_filters("mark_tag", "h3");
	$content .= sprintf('<%s>%s: %s minuts %s second</%s>', $tag, $label, $reading_minute, $reading_second, $tag);
	return $content;
}
add_filter('the_content', 'mark_reading_time', 10, 2);
