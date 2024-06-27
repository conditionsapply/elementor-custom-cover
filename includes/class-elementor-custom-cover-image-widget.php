<?php

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Elementor_Custom_Cover_Image_Widget {

    public static function register_controls( $document ) {
        $document->start_controls_section(
            'section_custom_cover_image',
            [
                'label' => __( 'Cover Image', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_SETTINGS,
            ]
        );

        $document->add_control(
            'cover_image',
            [
                'label' => __( 'Cover Image', 'plugin-name' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
            ]
        );

        $document->end_controls_section();
    }

    public static function save_cover_image( $document ) {
        $post_id = $document->get_main_id();
        $cover_image = $document->get_settings( 'cover_image' );

        if ( ! empty( $cover_image ) && is_array( $cover_image ) && isset( $cover_image['url'] ) ) {
            update_post_meta( $post_id, 'cover_image', $cover_image );
        } else {
            delete_post_meta( $post_id, 'cover_image' );
        }
    }
}