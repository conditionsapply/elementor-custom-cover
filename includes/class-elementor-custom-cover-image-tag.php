<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Elementor_Custom_Cover_Image_Tag extends \Elementor\Core\DynamicTags\Tag {

    public function get_name() {
        return 'custom-cover-image-tag';
    }

    public function get_title() {
        return __( 'Custom Cover Image', 'plugin-name' );
    }

    public function get_group() {
        return 'post'; // Categorize it under post-related tags
    }

    public function get_categories() {
        return [ \Elementor\Modules\DynamicTags\Module::IMAGE_CATEGORY ]; // Image category is appropriate
    }

    protected function register_controls() {
        // No controls needed for this tag
    }

    public function render() {
        $post_id = get_the_ID();
        $cover_image_serialized = get_post_meta( $post_id, 'cover_image', true );

        // Unserialize the data if it's serialized
        $cover_image = maybe_unserialize( $cover_image_serialized );

        if ( is_array( $cover_image ) && isset( $cover_image['url'] ) ) {
            $cover_image_url = $cover_image['url'];
            echo esc_url( $cover_image_url );
        } else {
            echo esc_url( \Elementor\Utils::get_placeholder_image_src() );
        }
    }
}