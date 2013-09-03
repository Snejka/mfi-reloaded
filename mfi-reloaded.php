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

		public static function init() {
			self::add_actions();
			self::add_filters();
			self::initialize_defaults();
		}

		private static function add_actions() {
			// Common actions

			if(is_admin()) {
				// Administrative only actions
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

		/// DISPLAY CALLBACKS

		/// SHORTCODE CALLBACKS

		/// POST META

		/// SETTINGS

		/// UTILITY

		private static function _redirect($url, $code = 302) {
			wp_redirect($url, $code); exit;
		}

		//// LINKS

		/// TEMPLATE TAGS

		public static function get_image_id($name, $post_id) {
			return false;
		}

		public static function get_image($name, $post_id, $size) {
			return false;
		}
	}

	require_once('lib/template-tags.php');
	MFI_Reloaded::init();
}
