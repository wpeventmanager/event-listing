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
?>
<?php
$query_args = array(
    'post_type' => 'post',
    'ignore_sticky_posts' => true,
    'posts_per_page' => 3
);

$query = new WP_Query($query_args);
if ($query->have_posts()) :

    ?>
    <section class="event-slider-wrapper">
        <?php
        while ($query->have_posts()) :
            $query->the_post();

            $post_id = get_the_ID();
            $thumbnail_url = get_the_post_thumbnail_url();
            ?>
            <div class="event-slider-single text-center" style="background-image: url(<?php echo $thumbnail_url; ?>);">
                <div class="event-slider-content">
                    <h2> <a href="<?php the_title(); ?>"> <?php the_title(); ?></h2></a>
                     <?php the_excerpt_embed(); ?>
                    <div class="read-more-btn"> <a href="<?php the_permalink(); ?>" class="btn"> <?php _e('Read More', 'event-listing'); ?></a> </div>
                </div>
            </div> <!-- .event-slider-single -->
        <?php
        endwhile;
        wp_reset_postdata();
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
                <div class="column column-12 column-t-9">
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
                <div class="column column-12 column-t-3">
                    <?php
                    get_sidebar();
                    ?>
                </div> <!-- .column -->
            </div> <!-- .row -->
        </div> <!-- .container -->
    </section>
<?php
endif;
get_footer();