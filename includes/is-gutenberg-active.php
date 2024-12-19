<?php
namespace Elementor_Ad_Eraser;

defined('ABSPATH') or die();

/**
 * Check if Gutenberg is active.
 * Must be used not earlier than plugins_loaded action fired.
 *
 * @return bool
 */
function is_gutenberg_active() {
    $gutenberg = false;
    $block_editor = false;

    // Gutenberg is installed and activated.
    if (has_filter('replace_editor', 'gutenberg_init')) {
        $gutenberg = true;
    }

    // Block editor
    if (version_compare($GLOBALS['wp_version'], '5.0-beta', '>')) {
        $block_editor = true;
    }

    if (!$gutenberg && !$block_editor) {
        return false;
    }

    if (!is_plugin_active('classic-editor/classic-editor.php')) {
        return true;
    }

    $use_block_editor = get_option('classic-editor-replace') === 'no-replace';

    return $use_block_editor;
}
