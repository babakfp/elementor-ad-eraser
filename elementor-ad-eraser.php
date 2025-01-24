<?php
namespace Elementor_Ad_Eraser;

defined('ABSPATH') or die();

/**
 * Plugin Name:                       Elementor Ad Eraser
 * Description:                       Removes intrusive ads from the Elementor interface for a cleaner, distraction-free experience.
 * Version:                           1.3.0
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

define('ELEMENTOR_AD_ERASER', [
    'VERSION' => '1.3.0',
    'PATH' => plugin_dir_path(__FILE__),
    'URL' => plugin_dir_url(__FILE__),
]);

require_once ELEMENTOR_AD_ERASER['PATH'] . 'includes/core.php';
