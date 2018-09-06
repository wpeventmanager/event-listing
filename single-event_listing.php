<?php
/* 
 * A look at single event listings.
 * Single event listing pages use your theme’s single.php template and expand the content area to include parts like organizer information and the apply button.
 *
 * @theme Name: Event Listing
 * @theme URI: http://wp-eventmanager.com/theme/
 * @author: WP Event Manager
 * @author URI: http://www.wp-eventmanager.com/
 * @copyright Copyright (C) 2017 WP Event Manager 
 * @license URI: http://www.gnu.org/licenses/gpl-2.0.html
 * @license: GNU General Public License v2 or later
 * @version: 1.0
 */ 
?>
<?php get_header(); ?>
<div class="content">
  <div class="event-info-section">
    <div class="container">
      <div class="row">   
		<!-- Start the Loop -->
		<?php while ( have_posts() ) : the_post(); ?>
			<?php  the_content(); ?>			
		<?php endwhile; ?>
		<!-- End the Loop -->	
	 </div>
    </div>
</div>
</div>
<div class="clear"></div>
<?php get_footer(); ?>