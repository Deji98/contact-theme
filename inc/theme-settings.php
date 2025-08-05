<?php
function st14_add_admin_page() {
    add_menu_page(
        'Studio14 Theme Settings', 
        'Theme Settings', 
        'manage_options', 
        'st14_theme_settings', 
        'st14_theme_settings_page', 
        'dashicons-admin-generic', 
        12
    );
}
add_action('admin_menu', 'st14_add_admin_page');

function st14_sanitize_social_url($input, $platform = '') {
    if (empty($input)) {
        return '';
    }

    // Extract the platform from the option name if not provided
    if (empty($platform)) {
        if (strpos($input, 'facebook') !== false || strpos($input, 'fb') !== false) {
            $platform = 'facebook';
        } elseif (strpos($input, 'instagram') !== false || strpos($input, 'ig') !== false) {
            $platform = 'instagram';
        } elseif (strpos($input, 'youtube') !== false || strpos($input, 'yt') !== false) {
            $platform = 'youtube';
        }
    }

    // Remove any existing protocol and www
    $url = preg_replace('~^(?:https?://)?(?:www\.)?~i', '', $input);
    
    // Remove any trailing slashes
    $url = rtrim($url, '/');

    // Handle different input formats
    switch ($platform) {
        case 'facebook':
            if (strpos($url, 'facebook.com') === false) {
                if (strpos($url, '/') === false) {
                    $url = 'facebook.com/' . $url;
                } else {
                    $url = 'facebook.com' . $url;
                }
            }
            break;
        case 'instagram':
            if (strpos($url, 'instagram.com') === false) {
                if (strpos($url, '/') === false) {
                    $url = 'instagram.com/' . $url;
                } else {
                    $url = 'instagram.com' . $url;
                }
            }
            break;
        case 'youtube':
            if (strpos($url, 'youtube.com') === false) {
                if (strpos($url, '/') === false) {
                    $url = 'youtube.com/c/' . $url;
                } else {
                    $url = 'youtube.com' . $url;
                }
            }
            break;
    }

    return 'https://' . $url;
}

function st14_custom_settings() {
    register_setting('st14-settings-group', 'st14_logo');
    register_setting('st14-settings-group', 'st14_phone');
    register_setting('st14-settings-group', 'st14_address');
    register_setting('st14-settings-group', 'st14_email');
    register_setting('st14-settings-group', 'st14_facebook', array(
        'sanitize_callback' => function($input) {
            return st14_sanitize_social_url($input, 'facebook');
        }
    ));
    register_setting('st14-settings-group', 'st14_instagram', array(
        'sanitize_callback' => function($input) {
            return st14_sanitize_social_url($input, 'instagram');
        }
    ));
    register_setting('st14-settings-group', 'st14_youtube', array(
        'sanitize_callback' => function($input) {
            return st14_sanitize_social_url($input, 'youtube');
        }
    ));
}
add_action('admin_init', 'st14_custom_settings');

function st14_theme_settings_page() {
    ?>    <div class="wrap">
        <h1><?php echo esc_html__('Studio14 Theme Settings', 'studio14'); ?></h1>
        <form method="post" action="options.php">
            <?php settings_fields('st14-settings-group'); ?>
            <?php do_settings_sections('st14-settings-group'); ?>
            
            <table class="form-table">
                <tr>
                    <th><?php echo esc_html__('Logo Image', 'studio14'); ?></th>
                    <td>
                        <input type="text" name="st14_logo" value="<?php echo esc_attr(get_option('st14_logo')); ?>" />
                        <button type="button" class="button" id="upload_logo_button"><?php echo esc_html__('Upload Logo', 'studio14'); ?></button>
                    </td>
                </tr>
                <tr>
                    <th><?php echo esc_html__('Phone Number', 'studio14'); ?></th>
                    <td>
                        <input type="text" name="st14_phone" value="<?php echo esc_attr(get_option('st14_phone')); ?>" />
                    </td>
                </tr>
                <tr>
                    <th><?php echo esc_html__('Address', 'studio14'); ?></th>
                    <td>
                        <textarea name="st14_address"><?php echo esc_textarea(get_option('st14_address')); ?></textarea>
                    </td>
                </tr>
                <tr>
                    <th><?php echo esc_html__('Email', 'studio14'); ?></th>
                    <td>
                        <input type="email" name="st14_email" value="<?php echo esc_attr(get_option('st14_email')); ?>" />
                    </td>
                </tr>
                <tr>
                    <th><?php echo esc_html__('Facebook', 'studio14'); ?></th>
                    <td>
                        <input type="text" name="st14_facebook" value="<?php echo esc_attr(get_option('st14_facebook')); ?>"/>
                    </td>
                </tr>
                <tr>
                    <th><?php echo esc_html__('Instagram', 'studio14'); ?></th>
                    <td>
                        <input type="text" name="st14_instagram" value="<?php echo esc_attr(get_option('st14_instagram')); ?>"/>
                    </td>
                </tr>
                <tr>
                    <th><?php echo esc_html__('YouTube', 'studio14'); ?></th>
                    <td>
                        <input type="text" name="st14_youtube" value="<?php echo esc_attr(get_option('st14_youtube')); ?>"/>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>    <?php
}
