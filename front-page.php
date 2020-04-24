<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package event-listing
 */

get_header();
$slider_arr = array();
global $event_listing_theme_options;
$slider_arr[] = absint($event_listing_theme_options['event-listing-slider-page-one']);
$slider_arr[] = absint($event_listing_theme_options['event-listing-slider-page-two']);
$slider_arr[] = absint($event_listing_theme_options['event-listing-slider-page-three']);
//remove duplicate post
$slider_arr = array_unique($slider_arr);
//remove if an element is empty
$slider_arr = array_filter($slider_arr);

if(count($slider_arr) >= 1):

    ?>
    <section class="event-slider-wrapper">
        <?php

    foreach($slider_arr as $post_id) {
            $thumbnail_url = get_the_post_thumbnail_url($post_id);
            ?>
            <div class="event-slider-single text-center" style="background-image: url(<?php echo $thumbnail_url; ?>);">
                <div class="event-slider-content">
                    <h2><a href="<?php echo get_the_permalink($post_id); ?>"> <?php echo get_the_title($post_id); ?></h2></a>
                    <?php echo get_the_excerpt($post_id); ?>
                    <div class="read-more-btn"><a href="<?php echo get_the_permalink($post_id); ?>"
                                                  class="btn"> <?php _e('Read More', 'event-listing'); ?></a></div>
                </div>
            </div> <!-- .event-slider-single -->
        <?php
    }
        ?>
    </section> <!-- .event-slider-wrapper -->
    <?php
endif;
?>
<?php if (have_posts()) : ?>
    <?php

    if (is_active_sidebar('event-listing-front-page')) {
        ?>
        <div class="event-listing-main-sidearea">
            <?php
            dynamic_sidebar('event-listing-front-page');
            ?>
        </div> <!-- .event-listing-main-sidearea -->
        <?php
    }
    ?>
    <section class="main-contain-wrapper">
        <div class="container">
            <div class="row">
                <div class="<?php echo primary_column_class(); ?>">
                    <div id="primary" class="content-area">
                        <main id="main" class="site-main">
                            <?php
                            if ('posts' == get_option('show_on_front')) {
                                ?>
                                <div class="blog-list">
                                    <?php
                                    if (have_posts()) :
                                        /* Start the Loop */
                                        while (have_posts()) : the_post();

                                            /*
                                             * Include the Post-Format-specific template for the content.
                                             * If you want to override this in a child theme, then include a file
                                             * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                                             */
                                            get_template_part('template-parts/content', get_post_format());
                                        endwhile;
                                        /**
                                         * Post Naviagtion
                                         */
                                        the_posts_navigation();

                                    else :
                                        get_template_part('template-parts/content', 'none');
                                    endif;
                                    ?>
                                </div> <!-- .ct-post-list -->
                                <?php
                            } else {
                                while (have_posts()) : the_post();
                                    get_template_part('template-parts/content', 'page');

                                    // If comments are open or we have at least one comment, load up the comment template.
                                    if (comments_open() || get_comments_number()) :
                                        comments_template();
                                    endif;
                                endwhile; // End of the loop.
                            }
                            ?>
                        </main><!-- #main -->
                    </div><!-- #primary -->

                </div> <!-- .column -->
                <?php do_action('event_listing_sidebar'); ?>
            </div> <!-- .row -->
        </div> <!-- .container -->
    </section>
<?php
endif;
get_footer();