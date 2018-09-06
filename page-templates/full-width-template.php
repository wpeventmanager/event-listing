<?php
/** 
 * Template Name: Full width
 * @theme Name: Event Listing
 * @theme URI:http://wp-eventmanager.com/theme/
 * @author: WP Event Manager
 * @author URI: http://www.wp-eventmanager.com/
 * @copyright Copyright (C) 2017 WP Event Manager 
 * @license URI: http://www.gnu.org/licenses/gpl-2.0.html
 * @license: GNU General Public License v2 or later
 * @version: 1.0
 **/
?>
<?php get_header(); ?>
<!--banner section start here-->
<div class="banner-section">
 
</div>
<!--banner section end here-->
 <div class="events-section">
 <div class="container">
    <div class="row"> 
       <div class="col-md-12">
           <?php if (have_posts()) : while (have_posts()) : the_post();?>
                    <?php the_content(); ?>
            <?php endwhile; endif; ?>
      </div>     
  </div>  
  <?php get_sidebar();?>
  </div> 
</div>
<?php get_sidebar();?>
<?php get_footer(); ?>