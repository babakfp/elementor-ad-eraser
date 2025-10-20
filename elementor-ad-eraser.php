<?php
namespace Elementor_Ad_Eraser;

defined('ABSPATH') || exit();

/**
 * Plugin Name:               Elementor Ad Eraser
 * Description:               Removes intrusive ads from the Elementor interface for a cleaner, distraction-free experience.
 * Version:                   1.5.3
 * Requires PHP:              7.4
 * Requires Plugins:          elementor
 * Author:                    Babak Farkhoopak
 * Author URI:                https://babakfp.gumroad.com
 * Plugin URI:                https://babakfp.gumroad.com/l/elementor-ad-eraser
 * License:                   GPLv3 or later
 * License URI:               https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:               elementor-ad-eraser
 * Domain Path:               /languages
 */

class Globals {
    public static $text_domain = 'elementor-ad-eraser';
    public static $version = '1.5.3';

    public static function url($path) {
        return plugin_dir_url(__FILE__) . $path;
    }

    public static function dir($path) {
        return plugin_dir_path(__FILE__) . $path;
    }
}

include_once ABSPATH . 'wp-admin/includes/plugin.php';

if (is_plugin_active('elementor/elementor.php')) {
    require Globals::dir('/includes/Core.php');
}
