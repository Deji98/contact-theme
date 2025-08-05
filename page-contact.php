<?php
/**
 * Template Name: Contact Page
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div class="contact-page">
    
    <div class="st14-header">
        <div class="st14top-header">
            <h4><?php _e('Contact Us', 'studio14'); ?></h4>
            <div class="st14-vertical-line"></div>

            <h4><?php _e('Members Login', 'studio14'); ?></h4>
            <div class="st14-vertical-line"></div>

            <h4 class="st14-search"><i class="fas fa-search"></i><span><?php _e('Search', 'studio14'); ?></span></h4>
        </div>
        
        <div class="st14-nav">
            <div class="st14-logo">
                <img src="<?php echo get_option('st14_logo') ? esc_url(get_option('st14_logo')) : get_template_directory_uri() . '/assets/Images/s14_logo.png'; ?>" alt="Logo">
            </div>
            <div class="st14-nav-text">
                <h4><?php _e('WHO WE ARE', 'studio14'); ?></h4>
                <h4><?php _e('WHAT WE DO', 'studio14'); ?></h4>
                <h4><?php _e('EVENTS', 'studio14'); ?></h4>
                <h4><?php _e('JOIN AND SUPPORT', 'studio14'); ?></h4>
                <h4><?php _e('NEWS', 'studio14'); ?></h4>
                <h4 class="st14-button1"><?php _e('BECOME A MEMBER', 'studio14'); ?></h4>
                <h4 class="st14-button2"><?php _e('DONATE', 'studio14'); ?></h4>
            </div>
        </div>
    </div>    <div class="st14-body">
        <div class="st14-body-left">
            <h2><?php _e('Contact Us', 'studio14'); ?></h2>
            <hr class="st14-hr"> <br />

            <h3><?php _e('Address:', 'studio14'); ?></h3>
            <p><?php _e('We are based at SOAS, University of London.', 'studio14'); ?></p>

            <p><?php _e('Royal African Society, SOAS, 21 Russell Square London WC1B 5EA', 'studio14'); ?></p>

            <p><?php _e('Tel:', 'studio14'); ?> <?php echo esc_html(get_option('st14_phone')) ?: '+44 (0)207 074 5176'; ?></p>

            <?php
            while ( have_posts() ) :
                the_post();
                ?>                <div class="st14-content st14-custom-content">
                    <?php the_content(); ?>
                </div>
            <?php
            endwhile;
            ?>
        </div>

        <div class="st14-body-right">
            <div class="st14-logo">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/Images/st14-map.png" alt="map">
            </div>

            <div class="st14-enquiries">
                <p class="yeh"><?php _e('General Enquiries', 'studio14'); ?></p>

                <p><?php _e('For General Enquiries, please send an email to', 'studio14'); ?> <span>ros@soas.ac.uk</span> <?php _e('or get in touch via the contact form below', 'studio14'); ?></p>
                <p><?php _e('For Donations and Legacies, please contact Caitlin Pearson on', 'studio14'); ?> <span>caitlin.pearson@soas.ac.uk</span></p>
            </div>
        </div>
    </div>

    <div class="st14-img-footer">
            <div class="st14-background-container">
            <div class="content">
                <p><?php _e('Help us tell the African Story', 'studio14'); ?></p>
                <h4 class="st14-button3"><?php _e('DONATE', 'studio14'); ?> <i class="fas fa-angle-right"></i></h4>
            </div>
    </div>

    <div class="st14-footer">
        <div class="mission-footer">
            <h3><?php _e('Our Mission', 'studio14'); ?></h3> 
            <p><?php _e('The Royal African Society is a membership organisation that provides opportunities for people to connect, celebrate and engage critically with a wide range of topics and ideas about Africa today.', 'studio14'); ?></p>
            <p><?php _e('We amplify African voices and interests in academia, business, politics, the arts and education, reaching a network of more than one million people globally.', 'studio14'); ?></p>
        </div>
        <div class="contact-footer">
            <h3><?php _e('Contact Us', 'studio14'); ?></h3> 
            <p><small><?php _e('email', 'studio14'); ?></small><br><?php echo esc_html(get_option('st14_email')) ?: __('hello@ras.com', 'studio14'); ?></p>
            <p><small><?php _e('address', 'studio14'); ?></small><br><?php echo nl2br(esc_html(get_option('st14_address'))) ?: __('The Royal African Society is hosted by SOAS, University of London. Registered Charity 1062764', 'studio14'); ?></p>
            <p><?php _e('Registered Charity 1062764', 'studio14'); ?></p>
        </div>
        <div class="sitemap-footer">
            <h3><?php _e('Site Map', 'studio14'); ?></h3> 
            <p><?php _e('About Us', 'studio14'); ?></p>
            <p><?php _e('WHAT WE DO', 'studio14'); ?></p>
            <p><?php _e('EVENTS', 'studio14'); ?></p>
            <p><?php _e('MEMBERSHIP', 'studio14'); ?></p>
            <p><?php _e('CONTACT US', 'studio14'); ?></p>
        </div>
        <div class="follow-footer">
            <h3><?php _e('Follow Us', 'studio14'); ?></h3>
            <div class="social-icons">
                <p><a href="<?php echo esc_url(get_option('st14_facebook')) ?: home_url('/'); ?>"><i class="fab fa-facebook-f"></i></a></p>
                <p><a href="<?php echo esc_url(get_option('st14_instagram')) ?: home_url('/'); ?>"><i class="fab fa-instagram"></i></a></p>
                <p><a href="<?php echo esc_url(get_option('st14_youtube')) ?: home_url('/'); ?>"><i class="fab fa-youtube"></i></a></p>
            </div>
        </div>
    </div>

    <div class="st14-copyright">
        <p><?php _e('© 2019 Royal African Society ltd - All rights reserved.', 'studio14'); ?></p>
        <p class="link"><?php _e('Privacy Policy', 'studio14'); ?></p>
        <p class="link"><?php _e('Terms Of Use', 'studio14'); ?></p>
        <p class="link"><?php _e('Privacy Policy', 'studio14'); ?></p>
    </div>

</div>

<?php wp_footer(); ?>
</body>
</html>
