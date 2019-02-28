<?php

/**
 * @wordpress-plugin
 * Plugin Name:       Kntnt compatibility plugin for WP-Rocket and Mautic
 * Plugin URI:        https://www.kntnt.com/
 * Description:       Exclude Mautic's JS to be cached by WP-Rocket.
 * Version:           1.0.1
 * Author:            Thomas Barregren
 * Author URI:        https://www.kntnt.com/
 * License:           GPL-3.0+
 * License URI:       http://www.gnu.org/licenses/gpl-3.0.txt
 */

defined('ABSPATH') || die;

add_filter('rocket_minify_excluded_external_js', function ($external_js) {

    // Mautic
    if ($wpmautic_options = get_option('wpmautic_options')) {
        $external_js[] = parse_url($wpmautic_options['base_url'], PHP_URL_HOST);
    }

    return $external_js;

});
