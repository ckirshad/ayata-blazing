<?php
function ayata_blazing_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary' => __('Primary Menu', 'ayata-blazing'),
    ));
}
add_action('after_setup_theme', 'ayata_blazing_setup');

function ayata_blazing_scripts() {
    wp_enqueue_style('main-styles', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'ayata_blazing_scripts');


function ayata_blazing_enqueue_styles() {
    wp_enqueue_style('tailwind-styles', get_template_directory_uri() . '/build/style.css', array(), filemtime(get_template_directory() . '/build/style.css'));
}

add_action('wp_enqueue_scripts', 'ayata_blazing_enqueue_styles');

function ayata_blazing_allowed_block_types($allowed_blocks, $block_editor_context) {
    // Allow only custom blocks
    return array(
        'ayata-blazing/custom-message',
        // Add other custom blocks here
    );
}

add_filter('allowed_block_types_all', 'ayata_blazing_allowed_block_types', 10, 2);



function ayata_blazing_register_blocks() {
    $script_path = get_template_directory() . '/build/index.js';
    $editor_style_path = get_template_directory() . '/build/editor.css';
    $style_path = get_template_directory() . '/build/style.css';

    if (file_exists($script_path)) {
        wp_register_script(
            'ayata-blazing-blocks',
            get_template_directory_uri() . '/build/index.js',
            array( 'wp-blocks', 'wp-element', 'wp-editor' ),
            filemtime( $script_path )
        );
    }

    if (file_exists($editor_style_path)) {
        wp_register_style(
            'ayata-blazing-blocks-editor',
            get_template_directory_uri() . '/build/editor.css',
            array(),
            filemtime( $editor_style_path )
        );
    }

    if (file_exists($style_path)) {
        wp_register_style(
            'ayata-blazing-blocks',
            get_template_directory_uri() . '/build/style.css',
            array(),
            filemtime( $style_path )
        );
    }

    register_block_type( 'ayata-blazing/custom-message', array(
        'editor_script' => 'ayata-blazing-blocks',
        'editor_style' => 'ayata-blazing-blocks-editor',
        'style' => 'ayata-blazing-blocks',
    ));
}
add_action( 'init', 'ayata_blazing_register_blocks' );

