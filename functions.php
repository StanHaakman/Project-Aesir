<?php
/**
 * Necessary values
 */

define('AESIR_JS_VERSION', null);
define('AESIR_CSS_VERSION', null);

/**
 * Add all base functionality's in this file.
 *
 * @package  Project-Aesir
 * @since    1.0.0
 *
 * @version 1.0
 */
require_once ('includes/core.php');

/******************* ************************/
/***** ONLY EDIT AFTER THIS POINT ***********/
/******************* ************************/

/**
 * Enqueue files fot the theme like CSS and JS files
 */

function aesir_enqueue_files() {
    /**
     * Only load if on the website
     */
    if (!is_admin()) {
        /**
         * Load the styles like this:
         * wp_enqueue_style( $handle, $src, $deps, $ver, $media );
         */
        wp_enqueue_style('main', AESIR_ASSETS_CSS . '/style.css', null, AESIR_CSS_VERSION);

        /**
         *  Load the scripts like this:
         *  wp_enqueue_script( $handle, $src, $deps, $ver, $in_footer );
         */
        wp_enqueue_script('main', AESIR_ASSETS_JS . '/build.min.js', array('jquery'), AESIR_JS_VERSION, true);
    }
}
add_action('init', 'aesir_enqueue_files');
