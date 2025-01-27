<?php
namespace Elementor_Ad_Eraser;

defined('ABSPATH') || exit();

require_once ELEMENTOR_AD_ERASER['PATH'] . 'includes/is-gutenberg-active.php';

if (!class_exists('Elementor_Ad_Eraser')) {
    final class Elementor_Ad_Eraser {
        public function __construct() {
            $this->add_custom_styles();
            $this->remove_elementor_ai();
        }

        private function add_custom_styles() {
            add_action('admin_enqueue_scripts', function () {
                if (is_gutenberg_active()) {
                    wp_enqueue_style('elementor-ad-eraser--gutenberg', ELEMENTOR_AD_ERASER['URL'] . 'static/css/gutenberg.css', [], ELEMENTOR_AD_ERASER['VERSION']);
                }

                wp_enqueue_style('elementor-ad-eraser--admin-ui', ELEMENTOR_AD_ERASER['URL'] . 'static/css/admin-ui.css', [], ELEMENTOR_AD_ERASER['VERSION']);
            });

            add_action('elementor/editor/after_enqueue_styles', fn() => wp_enqueue_style('elementor-ad-eraser--elementor-editor', ELEMENTOR_AD_ERASER['URL'] . 'static/css/elementor-editor.css', [], ELEMENTOR_AD_ERASER['VERSION']));

            add_action('elementor/preview/enqueue_styles', fn() => wp_enqueue_style('elementor-ad-eraser--elementor-preview', ELEMENTOR_AD_ERASER['URL'] . 'static/css/elementor-preview.css', [], ELEMENTOR_AD_ERASER['VERSION']));

            add_action(
                'admin_enqueue_scripts',
                function () {
                    if (!is_plugin_active('elementor-pro/elementor-pro.php')) {
                        wp_enqueue_style('elementor-ad-eraser--admin-ui-elementor-pro-not-active', ELEMENTOR_AD_ERASER['URL'] . 'static/css/admin-ui-elementor-pro-not-active.css', [], ELEMENTOR_AD_ERASER['VERSION']);
                        wp_enqueue_script('elementor-ad-eraser--admin-ui-elementor-pro-not-active', ELEMENTOR_AD_ERASER['URL'] . 'static/js/admin-ui-elementor-pro-not-active.js', [], ELEMENTOR_AD_ERASER['VERSION']);
                    }
                },
                100
            );
        }

        private function remove_elementor_ai() {
            add_action(
                'elementor/editor/after_enqueue_styles',
                function () {
                    wp_dequeue_style('elementor-ai-editor');
                },
                100
            );

            add_action(
                'elementor/preview/enqueue_styles',
                function () {
                    wp_dequeue_style('elementor-ai-layout-preview');
                },
                100
            );

            if (is_admin()) {
                add_action(
                    'wp_enqueue_media',
                    function () {
                        wp_dequeue_script('elementor-ai-media-library');
                    },
                    100
                );
            }

            add_action(
                'elementor/editor/before_enqueue_scripts',
                function () {
                    wp_dequeue_script('elementor-ai');
                    wp_dequeue_script('elementor-ai-layout');
                },
                100
            );

            add_action(
                'enqueue_block_editor_assets',
                function () {
                    wp_dequeue_script('elementor-ai-gutenberg');
                },
                100
            );

            add_action(
                'admin_enqueue_scripts',
                function () {
                    wp_dequeue_script('elementor-ai-admin');

                    // "Optimize your images to enhance site performance by using Image Optimizer". I think this is a paid plugin (or at least it requires login). Not sure if this works.
                    wp_dequeue_script('media-hints');
                },
                100
            );
        }
    }

    new Elementor_Ad_Eraser();
}
