/**
 * Admin JavaScript for Studio14 Theme
 * Handles functionality in the WordPress admin area
 * 
 * @package Studio14
 * @since 1.0.0
 */

( function( $ ) {
    'use strict';

    // Media Uploader for Logo
    $('#upload_logo_button').on('click', function(e) {
        e.preventDefault();
          var mediaUploader = wp.media({ 
            title: studio14Admin.uploadLogoTitle,
            multiple: false
        });

        mediaUploader.on('select', function() {
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            $('input[name="st14_logo"]').val(attachment.url);
        });

        mediaUploader.open();
    });

})( jQuery );
