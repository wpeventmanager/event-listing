<?php
/** 
 * Template Name: Home Template
 * @theme Name: Event Listing
 * @theme URI: http://wp-eventmanager.com/theme/
 * @author: WP Event Manager
 * @author URI: http://www.wp-eventmanager.com/
 * @copyright Copyright (C) 2017 WP Event Manager 
 * @license URI: http://www.gnu.org/licenses/gpl-2.0.html
 * @license: GNU General Public License v2 or later
 * @version: 1.5
 **/ 
  get_header(); ?>
<!--banner section start here-->
<div class="banner-section">

</div>
<!--banner section end here-->
 <div class="events-section">
 <div class="container">
    <div class="row">
       <div class="col-md-9">
           <?php echo do_shortcode('[events show_pagination="true"]');?> 
       </div>
        <?php
           get_sidebar();
        ?> 
    </div>  
  </div> 
</div>

<?php get_footer(); ?>