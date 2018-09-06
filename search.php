<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage Event Listing
 * @since Event Listing 1.0
 * @license URI: http://www.gnu.org/licenses/gpl-2.0.html
 * @license: GNU General Public License v2 or later
 * 
 */
get_header(); ?>
	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php if ( have_posts() ) : ?>
            <div class="inner-page-title" >
              <div class="container">
                <h1><?php printf( __( 'Search Results for: %s', 'event-listing' ), get_search_query() ); ?></h1>
              </div>
            </div>
			<?php
			// Start the loop.
			while ( have_posts() ) : the_post(); ?>
				<?php
				/*
				 * Run the loop for the search to output the results.
				 * If you want to overload this in a child theme then include a file
				 * called content-search.php and that will be used instead.
				 */
				get_template_part( 'content', 'search' );
			// End the loop.
			endwhile;
			// Previous/next page navigation.
			the_posts_pagination( array(
				'prev_text'          => __( 'Previous page', 'event-listing' ),
				'next_text'          => __( 'Next page', 'event-listing' ),
				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'event-listing' ) . ' </span>',
			) );
		// If no content, include the "No posts found" template.
		else :
			?>
					<div class="inner-page-title" >
                      <div class="container">
                        <h1><?php _e( 'Nothing Found', 'event-listing' );?></h1>
                      </div>
                    </div>
					<div class="content">
                        <div class="container">
                           <div class="row">
                              <div class="col-lg-8">
                                    <?php _e('Sorry, but nothing matched your search criteria. Please try again with some different keywords.','event-listing');?>
                              </div>
                            <!--col-lg-8-->
							</div>
                        <!--row-->
						</div>
                     <!--containter-->
					</div>
<!--content-->
	<?php endif; ?>
		</main><!-- .site-main -->
	</section><!-- .content-area -->
<?php get_footer(); ?>
