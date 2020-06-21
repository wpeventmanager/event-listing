<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package Event_Listing
 */

get_header();
?>
    <div class="container">
        <div class="row justify-center">
            <div class="column column-12 column-t-8">
                <div id="primary" class="content-area">
                    <main id="main" class="site-main">

                        <section class="error-404 not-found text-center">
                            <header class="page-header">
                                <h1 class="page-title"><?php esc_html_e( '404', 'event-listing' ); ?></h1>
                                <h2><?php esc_html_e( 'Page Not Found', 'event-listing' ); ?></h2>
                            </header><!-- .page-header -->

                            <div class="page-content">
                                <p><?php esc_html_e( 'Opps! This does not seem to be the web page you are searching for.', 'event-listing' ); ?></p>

                                <a href="<?php echo esc_url(home_url()); ?>" title="Goto Home" class="btn">
                                    <?php _e('Homepage', 'event-listing'); ?>
                                </a>

                            </div><!-- .page-content -->
                        </section><!-- .error-404 -->

                    </main><!-- #main -->
                </div><!-- #primary -->
            </div> <!-- .column -->
        </div> <!-- .row -->
    </div> <!-- .container -->
<?php
get_footer();
