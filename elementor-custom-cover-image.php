<?php
/**
 * Plugin Name: Elementor Custom Cover Image Field
 * Description: Adds a custom cover image field to Elementor's post settings and a dynamic tag to retrieve it.
 * Version: 1.0
 * Author: Your Hareesh
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Initialize the plugin
function elementor_custom_cover_image_init() {

    // Check if Elementor is installed and activated
    if ( ! did_action( 'elementor/loaded' ) ) {
        add_action( 'admin_notices', 'elementor_custom_cover_image_fail_load' );
        return;
    }

    // Include necessary files
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-elementor-custom-cover-image-widget.php';
    require_once plugin_dir_path( __FILE__ ) . 'includes/class-elementor-custom-cover-image-tag.php';

    // Add custom field to post settings
    add_action( 'elementor/documents/register_controls', [ 'Elementor_Custom_Cover_Image_Widget', 'register_controls' ] );

    // Save cover image URL as post meta
    add_action( 'elementor/document/after_save', [ 'Elementor_Custom_Cover_Image_Widget', 'save_cover_image' ] );

    // Register custom dynamic tag
    add_action( 'elementor/dynamic_tags/register', function( $dynamic_tags ) {
        $dynamic_tags->register_tag( 'Elementor_Custom_Cover_Image_Tag' );
    } );
}
add_action( 'init', 'elementor_custom_cover_image_init' );

// Show admin notice if Elementor is not active
function elementor_custom_cover_image_fail_load() {
    echo '<div class="error"><p>' . __( 'Elementor Custom Cover Image Field requires Elementor to be installed and activated.', 'plugin-name' ) . '</p></div>';
}