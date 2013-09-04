<?php
/*
 Plugin Name: Multiple Featured Images: Reloaded
 Plugin URI: https://github.com/nickohrn/mfi-reloaded
 Description: Here is a short description of the plugin. This should be no more than 150 characters. No markup here.
 Version: 1.0.0-RC1
 Author: Nick Ohrn of Plugin-Developer.com
 Author URI: http://plugin-developer.com/
 */

if(!class_exists('MFI_Reloaded')) {
	class MFI_Reloaded {
		/// CONSTANTS

		//// VERSION
		const VERSION = '1.0.0-RC1';

		//// KEYS

		/// DATA STORAGE
		private static $image_pickers = array();

		public static function init() {
			self::add_actions();
			self::add_filters();
			self::initialize_defaults();
		}

		private static function add_actions() {
			// Common actions

			if(is_admin()) {
				add_action('add_meta_boxes', array(__CLASS__, 'add_image_picker_meta_boxes'));
			} else {
				// Frontend only actions
			}
		}

		private static function add_filters() {
			// Common filters

			if(is_admin()) {
				// Administrative only filters
			} else {
				// Frontend only filters
			}
		}

		private static function initialize_defaults() {

		}

		/// CALLBACKS

		public static function add_image_picker_meta_boxes($post_type) {
			foreach(self::$image_pickers as $image_picker_name => $image_picker_args) {
				if(in_array($post_type, $image_picker_args['post_types'])) {
					add_meta_box(
						'mfi-reloaded-' . sanitize_title_with_dashes($image_picker_name),
						$image_picker_args['labels']['name'],
						array(__CLASS__, 'display_image_picker_meta_box'),
						$post_type,
						'side',
						'default',
						compact('image_picker_name', 'image_picker_args')
					);
				}
			}
		}

		/// DISPLAY CALLBACKS

		public static function display_image_picker_meta_box($post, $meta_box) {
			$image_picker_args = $meta_box['args']['image_picker_args'];
			$image_picker_name = $meta_box['args']['image_picker_name'];

			include('views/meta-boxes/image-picker.php');
		}

		/// SHORTCODE CALLBACKS

		/// POST META

		/// SETTINGS

		/// UTILITY

		private static function _normalize_args($args) {
			$normalized_args = array();

			if(!isset($args['post_types'])) {
				$normalized_args['post_types'] = array('post', 'page');
			} else if(!is_array($args['post_types'])) {
				$normalized_args['post_types'] = array($args['post_types']);
			} else {
				$normalized_args['post_types'] = $args['post_types'];
			}

			$default_labels = array(
				'name' => __('Featured Image'),
				'set' => __('Set featured image'),
				'remove' => __('Remove featured image'),
				'popup_title' => __('Set Featured Image'),
				'popup_select' => __('Set featured image'),
			);

			if(!isset($args['labels']) || !is_array($args['labels'])) {
				$normalized_args['labels'] = $default_labels;
			} else {
				$normalized_args['labels'] = shortcode_atts($default_labels, $args['labels']);
			}

			return $normalized_args;
		}

		private static function _redirect($url, $code = 302) {
			wp_redirect($url, $code); exit;
		}

		//// LINKS

		/// TEMPLATE TAGS

		public static function add_image_picker($name, $args) {
			if(!is_string($name) || isset(self::$image_pickers[$name])) {
				return false;
			}

			self::$image_pickers[$name] = self::_normalize_args($args);
		}

		public static function get_image_id($name, $post_id) {
			return false;
		}

		public static function get_image($name, $size, $post_id, $attributes) {
			return false;
		}
	}

	require_once('lib/template-tags.php');
	MFI_Reloaded::init();
}
