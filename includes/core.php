<?php
/**
 * Base functions
 * Keep in mind that all functions should be prefixed with `aesir_`
 *
 * @package Project-Aesir
 * @since   1.0.0
 */

define('AESIR_THEME_NAME',     'project-aesir');
define('AESIR_THEME_URL',      get_bloginfo('template_url'));
define('AESIR_ASSETS',         AESIR_THEME_URL . '/dist');
define('AESIR_ASSETS_CSS',     AESIR_ASSETS . '/css');
define('AESIR_ASSETS_JS',      AESIR_ASSETS . '/js');


/**
 * Aesir setup
 *
 * @since   1.0.0
 */
function aesir_setup() {
    // Requirements
    //  - Post-thumbnail support
    //  - Menu locations
    //  - Run fuction

    add_theme_support('post-thumbnails');

    register_nav_menus(array(
        'primary' => __('Main Menu', AESIR_THEME_NAME),
        'footer' => __('Footer Menu', AESIR_THEME_NAME),
    ));

    do_action('aesir_setup');
}
add_action('after_setup_theme', 'aesir_setup');

/**
 * Include a partial file. Use it like this:
 * aesir_partial('example');
 *
 * @param $partial_name
 * @param $partial_folder ** Optional **
 * @return mixed
 *
 * @since 1.0.1
 * @version 1.0.0
 */

function aesir_partial($partial_name, $partial_folder = null) {

    if (!empty($partial_folder)) {
        return include(locate_template('partials/'. $partial_folder . '/' . $partial_name . '.php'));
    } else {
        return include(locate_template('partials/' . $partial_name . '.php'));
    }

}
