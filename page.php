<?php
/**
 * The template for displaying pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages and that
 * other "pages" on your WordPress site will use a different template.
 *
 * @theme Name: Event Listing
 * @theme URI: https://www.wp-eventmanager.com/theme/
 * @author: The WP Event Manager Team
 * @author URI: https://www.wp-eventmanager.com
 * @copyright Copyright (C) 2017 WP Event Manager Team 
 * @license URI: http://www.gnu.org/licenses/gpl-2.0.html
 * @license: GNU General Public License v2 or later
 * @version: 1.4
 */
?>
<?php get_header(); ?>
 <div class="events-section">
 <div class="container">
    <div class="row"> 
       <div class="col-md-12">
       <div class="row">
       <div class="col-md-9">
       
           <?php if (have_posts()) : while (have_posts()) : the_post();?>

                    <?php the_content(); ?>
                    <?php
            			wp_link_pages( array(
            				'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'event-listing' ) . '</span>',
            				'after'       => '</div>',
            				'link_before' => '<span>',
            				'link_after'  => '</span>',
            				'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'event-listing' ) . ' </span>%',
            				'separator'   => '<span class="screen-reader-text">, </span>',
            			) );
            		?>
            <?php endwhile; endif; ?>
        </div>
      <?php get_sidebar();?>
      </div>
      </div>     
  </div>  
  </div> 
</div>
<?php get_footer(); ?>