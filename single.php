<?php
/**
 * The template for displaying all single posts and attachments
 *
 
 * @theme Name: Event Listing
 * @theme URI: http://wp-eventmanager.com/theme/
 * @author: WP Event Manager
 * @author URI: http://wp-eventmanager.com/theme/
 * @copyright Copyright (C) 2018 WP Event Manager 
 * @license URI: http://www.gnu.org/licenses/gpl-2.0.html
 * @license: GNU General Public License v2 or later
 * @version: 1.5
 */
get_header();
?>
<div class="content">
          <div class="container">
            <div class="row">
            <div class="col-lg-9">
            
		<?php
		 global $post;
		 echo $post->ID;

		// Start the loop.
		while ( have_posts() ) : the_post();
		?>
		<div class="post-full-image">
		<?php if ( has_post_thumbnail() ) {
			the_post_thumbnail();
		} ?>
		</div>
		<h1 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></a></h1>
		 <?php
		    // Include the single post content template.
			the_content();
            ?> 
            <hr>

			<?php
			//printf( _nx( 'One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;', get_comments_number(), 'comments title', 'event-listing' ),
					//number_format_i18n( get_comments_number() ), get_the_title() );
			?>

            <?php
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) {
				comments_template();
			}
        
            get_the_tag_list();

			// End of the loop.
		endwhile;
		?>
		 <?php the_posts_pagination( array(
                                                    'mid_size' => 2,
                                                    'prev_text' => __( 'Back', 'event-listing' ),
                                                    'next_text' => __( 'Onward', 'event-listing' ),
                                                ) ); ?>
        </div>
       <?php get_sidebar(); ?>
	   </div>
</div>
</div>

<?php get_footer(); ?>
