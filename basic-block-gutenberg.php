<?php

/**
 * Plugin name: Basic block Gutenberg
 * Version: 1.0.1
 * Author: Julien Maury
 * Licence: wtfpl
 */
defined("ABSPATH") || die("No direct load please...");

add_action("init", function () {
    $rel_path_css = 'build/style-index.css';
    $rel_path_js = 'build/index.js';

    if (
        !file_exists(plugin_dir_path(__FILE__) . $rel_path_js)
        || !file_exists(plugin_dir_path(__FILE__)  . $rel_path_css)
    ) {
        return;
    }

    wp_register_script(
        'my-block-js',
        plugin_dir_url(__FILE__)  . $rel_path_js,
        [],
        false,
        true
    );

    wp_set_script_translations(
        'my-block-js',
        'basic-block-gutenberg',
        plugin_dir_path(__FILE__) . "languages"
    );

    wp_register_style(
        'my-block-css',
        plugin_dir_url(__FILE__)  . $rel_path_css,
        [],
        false
    );
});

add_action("enqueue_block_editor_assets", "_my_block_add_scripts");
add_action("enqueue_block_assets", "_my_block_add_scripts");
function _my_block_add_scripts()
{
    wp_enqueue_script('my-block-js');
    wp_enqueue_style('my-block-css');
}
