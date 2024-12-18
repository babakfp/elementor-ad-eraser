<?php

namespace ELEMENTOR_AD_ERASER;

defined("ABSPATH") or die();

/**
 * Plugin Name:                       Elementor Ad Eraser
 * Description:                       Removes intrusive ads from the Elementor interface for a cleaner, distraction-free experience.
 * Version:                           1.0.0
 * Tested up to:                      6.6.2
 * Requires at least:                 5.0.0
 * Requires PHP:                      7.4.33
 * Author:                            babakfp
 * Author URI:                        https://babakfp.ir
 * License:                           GPLv3 or later
 * License URI:                       https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain:                       elementor-ad-eraser
 * Domain Path:                       /languages
 */

if (!class_exists("Elementor_Ad_Eraser_Globals")) {
    final class Elementor_Ad_Eraser_Globals
    {
        public static $version = "1.0.0";

        public static function url()
        {
            return plugin_dir_url(__FILE__);
        }

        public static function dir()
        {
            return plugin_dir_path(__FILE__);
        }
    }
}

require_once Elementor_Ad_Eraser_Globals::dir() . "includes/core.php";
