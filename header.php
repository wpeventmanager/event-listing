<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Event_Listing
 */
$GLOBALS['event_listing_theme_options'] = event_listing_get_options_value();
global $event_listing_theme_options;
$phone = $event_listing_theme_options['event-listing-header-phone'];
$email = $event_listing_theme_options['event-listing-header-email'];
$social = absint($event_listing_theme_options['event-listing-header-social']);
$search = absint($event_listing_theme_options['event-listing-header-search']);
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>


<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'event-listing'); ?></a>

    <header id="masthead" class="site-header">
        <div class="header-top">
            <div class="container">
                <div class="row">
                    <div class="column column-12 column-t-6 top-left">
                        <?php if (!empty($phone)){ ?>
                        <span class="top-phone">
                            <i class="fa fa-phone"></i>
                            <a href="tel:<?php echo esc_attr($phone);?>"><?php echo esc_html($phone); ?> </a>
                        </span>
                        <?php } ?>
                        <?php if (!empty($email)){ ?>
                        <span class="top-email">
                            <i class="fa fa-envelope"></i>
                            <a href="mailto:<?php echo esc_attr($email);?>"> <?php echo esc_html($email); ?> </a>
                        </span>
                        <?php } ?>
                    </div>
                    <?php
                    if (has_nav_menu('social-menu') && 1 == $social):
                        ?>
                        <div class="column column-12 column-t-6 top-right">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'social-menu',
                                'menu_id' => 'menu-social-1',
                                'container' => 'ul',
                                'menu_class' => 'event-social-menu'
                            ));
                            ?>
                        </div> <!-- .column -->
                    <?php
                    endif;
                    ?>
                </div> <!-- .row -->
            </div> <!-- .container -->
        </div> <!-- .header-top -->
        <div class="header-main">
            <div class="container">
                <div class="row align-middle">
                    <div class="column column-8 column-t-3 order-t-1">
                        <div class="site-branding">
                            <?php
                            the_custom_logo();
                            if (is_front_page() && is_home()) :
                                ?>
                                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                          rel="home"><?php bloginfo('name'); ?></a></h1>
                            <?php
                            else :
                                ?>
                                <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                                         rel="home"><?php bloginfo('name'); ?></a></p>
                            <?php
                            endif;
                            $event_listing_description = get_bloginfo('description', 'display');
                            if ($event_listing_description || is_customize_preview()) :
                                ?>
                                <p class="site-description"><?php echo $event_listing_description; /* WPCS: xss ok. */ ?></p>
                            <?php endif; ?>
                        </div><!-- .site-branding -->
                    </div> <!-- .column -->
                    <?php if($search == 1 ) { ?>
                        <div class="column column-4 column-t-1 order-t-3">
                            <i class="fa fa-phone"></i>
                        </div> <!-- .column -->
                    <?php } ?>

                    <div class="column column-12 column-t-8 order-t-2 text-t-right">
                        <nav id="site-navigation" class="main-navigation">
                            <button class="menu-toggle" aria-controls="primary-menu"
                                    aria-expanded="false"><?php esc_html_e('Primary Menu', 'event-listing'); ?></button>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'menu-1',
                                'menu_id' => 'primary-menu',
                            ));
                            ?>
                        </nav><!-- #site-navigation -->
                    </div> <!-- .column -->
                </div> <!-- .row -->
            </div> <!-- .container -->
        </div> <!-- .header-main -->
    </header><!-- #masthead -->

    <div id="content" class="site-content">
