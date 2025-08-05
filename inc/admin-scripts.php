<?php
/**
 * Admin-specific scripts and settings
 *
 * @package Studio14
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

/**
 * Enqueue admin-specific scripts and media uploader
 *
 * @since 1.0.0
 * @return void
 */
function studio14_admin_scripts() {
    wp_enqueue_media();

    wp_enqueue_script(
        'studio14-admin',
        get_template_directory_uri() . '/assets/js/admin.js',
        array('jquery', 'media-upload'),
        _S_VERSION,
        true
    );

    wp_localize_script(
        'studio14-admin',
        'studio14Admin',
        array(
            'uploadLogoTitle' => esc_html__('Upload Logo', 'studio14')
        )
    );
}
add_action('admin_enqueue_scripts', 'studio14_admin_scripts');
