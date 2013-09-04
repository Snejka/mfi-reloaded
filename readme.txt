=== Multiple Featured Images: Reloaded ===

Contributors: nickohrn
Donate link: http://example.com/
Tags: admin, images
Requires at least: 3.6
Tested up to: 3.6
Stable tag: 1.0.0
License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

This plugin allows developers to easily register additional image pickers for any post type.

== Description ==

This plugin allows developers to easily register additional image pickers for any post type.

== Installation ==

1. Upload `mfi-reloaded` to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Use the provided template tags to create image pickers and display the data you need

== Frequently Asked Questions ==

= How do I add an image picker? =

Easy! In your theme's functions.php file, add the following code:

`function register_custom_image_pickers() {
	if(function_exists('mfi_reloaded_add_image_picker')) {
		mfi_reloaded_add_image_picker('hero-image', array(
			'post_types' => array('post'),
			'labels' => array(
				'name' => __('Hero Image'),
				'set' => __('Set hero image'),
				'remove' => __('Remove hero image'),
				'popup_title' => __('Set Hero Image'),
				'popup_select' => __('Set hero image'),
			),
		));

		mfi_reloaded_add_image_picker('sidekick-image', array(
			'post_types' => array('post'),
			'labels' => array(
				'name' => __('Sidekick Image'),
				'set' => __('Set sidekick image'),
				'remove' => __('Remove sidekick image'),
				'popup_title' => __('Set Sidekick Image'),
				'popup_select' => __('Set sidekick image'),
			),
		));
	}
}
add_action('init', 'register_custom_image_pickers');`

Feel free to provide whatever values you need.

An answer to that question.

== Changelog ==

= 1.0 =

* Initial release

== Upgrade Notice ==

= 1.0 =

Initial release.
