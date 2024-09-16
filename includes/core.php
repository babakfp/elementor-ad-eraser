<?php

namespace ELEMENTOR_AD_ERASER;

defined("ABSPATH") or die();

if (!class_exists("Elementor_Ad_Eraser")) {
    final class Elementor_Ad_Eraser
    {
        public function __construct()
        {
            add_action("admin_enqueue_scripts", function () {
                if (is_plugin_active("elementor/elementor.php")) {
                    wp_enqueue_style(
                        "elementor-ad-eraser-admin-ui",
                        Elementor_Ad_Eraser_Globals::url() .
                            "static/css/admin-ui.css",
                        [],
                        Elementor_Ad_Eraser_Globals::$version
                    );
                }
            });
            // add_action( "elementor/editor/wp_head", [ $this, "farsi_font_face" ] );
            // add_action( "elementor/editor/after_enqueue_styles", fn() => wp_enqueue_style ( "elementor-ad-eraser::elementor-editor", Elementor_Ad_Eraser_Globals::url() . "static/css/elementor-editor.css", [], Elementor_Ad_Eraser_Globals::$version ) );
            // add_action( "elementor/preview/enqueue_styles", fn() => wp_enqueue_style ( "elementor-ad-eraser::elementor-preview", Elementor_Ad_Eraser_Globals::url() . "static/css/elementor-preview.css", [], Elementor_Ad_Eraser_Globals::$version ) );
            // add_action( "elementor/editor/after_enqueue_scripts", fn() => wp_enqueue_script ( "elementor-ad-eraser::elementor-editor", Elementor_Ad_Eraser_Globals::url() . "static/js/elementor-editor.js", [], Elementor_Ad_Eraser_Globals::$version ) );
        }
    }

    new Elementor_Ad_Eraser();
}
