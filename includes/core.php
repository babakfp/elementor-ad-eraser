<?php

namespace ELEMENTOR_AD_ERASER;

defined("ABSPATH") or die();

require_once Elementor_Ad_Eraser_Globals::dir() .
    "includes/is-gutenberg-active.php";

if (!class_exists("Elementor_Ad_Eraser")) {
    final class Elementor_Ad_Eraser
    {
        public function __construct()
        {
            add_action("admin_enqueue_scripts", function () {
                if (is_gutenberg_active()) {
                    wp_enqueue_style(
                        "elementor-ad-eraser--gutenberg",
                        Elementor_Ad_Eraser_Globals::url() .
                            "static/css/gutenberg.css",
                        [],
                        Elementor_Ad_Eraser_Globals::$version
                    );
                }

                if (is_plugin_active("elementor/elementor.php")) {
                    wp_enqueue_style(
                        "elementor-ad-eraser--admin-ui",
                        Elementor_Ad_Eraser_Globals::url() .
                            "static/css/admin-ui.css",
                        [],
                        Elementor_Ad_Eraser_Globals::$version
                    );
                }
            });

            add_action(
                "elementor/editor/after_enqueue_styles",
                fn() => wp_enqueue_style(
                    "elementor-ad-eraser--elementor-editor",
                    Elementor_Ad_Eraser_Globals::url() .
                        "static/css/elementor-editor.css",
                    [],
                    Elementor_Ad_Eraser_Globals::$version
                )
            );

            add_action(
                "elementor/preview/enqueue_styles",
                fn() => wp_enqueue_style(
                    "elementor-ad-eraser--elementor-preview",
                    Elementor_Ad_Eraser_Globals::url() .
                        "static/css/elementor-preview.css",
                    [],
                    Elementor_Ad_Eraser_Globals::$version
                )
            );

            // Dequeue elementor ai styles and scripts

            add_action(
                "elementor/editor/after_enqueue_styles",
                function () {
                    wp_dequeue_style("elementor-ai-editor");
                },
                100
            );

            add_action(
                "elementor/preview/enqueue_styles",
                function () {
                    wp_dequeue_style("elementor-ai-layout-preview");
                },
                100
            );

            if (is_admin()) {
                add_action(
                    "wp_enqueue_media",
                    function () {
                        wp_dequeue_script("elementor-ai-media-library");
                    },
                    100
                );
            }

            add_action(
                "elementor/editor/before_enqueue_scripts",
                function () {
                    wp_dequeue_script("elementor-ai");
                    wp_dequeue_script("elementor-ai-layout");
                },
                100
            );

            add_action(
                "enqueue_block_editor_assets",
                function () {
                    wp_dequeue_script("elementor-ai-gutenberg");
                },
                100
            );

            add_action(
                "admin_enqueue_scripts",
                function () {
                    wp_dequeue_script("elementor-ai-admin");

                    // "Optimize your images to enhance site performance by using Image Optimizer". I think this is a paid plugin (or at least it requires login). Not sure if this works.
                    wp_dequeue_script("media-hints");
                },
                100
            );
        }
    }

    new Elementor_Ad_Eraser();
}
