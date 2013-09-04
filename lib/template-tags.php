<?php

/**
 * Register a new image picker. Do not use before init or after add_meta_boxes.
 *
 * A function for adding a custom image picker to any post type. This
 * function accepts an identifier string (required) and an optional array
 * which controls the behavior of the image picker.
 *
 * Optional $args contents:
 *
 * - post_types - An array of post_type keys on which this image picker should appear
 * - labels - An array with the following keys
 *     * name - The name of the meta box displayed on the edit content screen. Defaults to "Featured Image".
 *     * set - Text displayed to the user inside of the image picker meta box before an image is selcted. Defaults to "Set featured image".
 *     * remove - Text displayed to the user inside of the image picker meta box after an image is selected. Defaults to "Removed featured image".
 *     * popup_title - Text displayed in the title area of the media picker popup. Defaults to "Set Featured Image".
 *     * popup_select - Text displayed in the selection button of the media picker popup. Defaults to "Set featured image".
 *
 * @param string $name A unique string which identifies the image picker - you will use this when displaying the image
 * @param array $args An array of arguments that modify the behavior of the picker
 * @return boolean True if the image picker was added successful and false otherwise.
 */
function mfi_reloaded_add_image_picker($name, $args = array()) {
	$args = apply_filters('mfi_reloaded_add_image_picker', $args);

	return MFI_Reloaded::add_image_picker($name, $args);
}

/**
 * Returns a boolean value indicating whether an author has selected an image
 * for the queried image picker and post.
 *
 * @param string $name The name of the image picker to query
 * @param int|null $post_id The id of the post to query - defaults to the current post if in the loop
 * @return boolean True if an author has selected an image for the queried image picker and post and false otherwise.
 */
function mfi_reloaded_has_image($name, $post_id = null) {
	return apply_filters('mfi_reloaded_has_template_tag', !!(mfi_reloaded_get_image_id($name, $post_id)), $name, $post_id);
}

/**
 * Returns the identifier of the image that an author has selected for the queried image picker and post
 * or false if no image has been selected.
 *
 * @param string $name The name of the image picker to query
 * @param int|null $post_id The id of the post to query - defaults to the current post if in the loop
 * @return int|boolean The attachment id for the chosen image for the queried image picker if an author
 * has selected an image and false otherwise.
 */
function mfi_reloaded_get_image_id($name, $post_id = null) {
	return apply_filters('mfi_reloaded_get_template_tag', MFI_Reloaded::get_image_id($name, $post_id), $name, $post_id);
}

/**
 * Returns the an HTML image tag for the queried image picker and post or false if no image has been selected.
 *
 * @param string $name The name of the image picker to query
 * @param int|null $post_id The id of the post to query - defaults to the current post if in the loop
 * @param string $size The size of image to retrieve
 * @param array $attributes Extra attributes to add to the HTML image tag
 * @return string|boolean An HTML image tag for the chosen image for the queried image picker if an author
 * has selected an image and false otherwise.
 */
function mfi_reloaded_get_image($name, $size = 'thumbnail', $post_id = null, $attributes = array()) {
	return apply_filters('mfi_reloaded_get_image', MFI_Reloaded::get_image($name, $size, $post_id, $attributes), $name, $size, $post_id, $attributes);
}

/**
 * Echoes the return value of mfi_reloaded_get_image
 *
 * @param string $name The name of the image picker to query
 * @param int|null $post_id The id of the post to query - defaults to the current post if in the loop
 * @param string $size The size of image to retrieve
 * @param array $attributes Extra attributes to add to the HTML image tag
 * @return string|boolean An HTML image tag for the chosen image for the queried image picker if an author
 * has selected an image and false otherwise.
 */
function mfi_reloaded_the_image($name, $size = 'thumbnail', $post_id = null, $attributes = array()) {
	echo apply_filters('mfi_reloaded_the_template_tag', mfi_reloaded_get_image($name, $size, $post_id, $attributes), $name, $size, $post_id, $attributes);
}
