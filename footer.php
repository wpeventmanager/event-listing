<?php
/**
 * The footer file for the Event Listing theme.
 *
 * Contains the closing of the #content-part div and all content after
 *
 * @theme Name: Event Listing
 * @theme URI:http://wp-eventmanager.com/theme/
 * @author: WP Event Manager
 * @author URI: http://www.wp-eventmanager.com/
 * @copyright Copyright (C) 2017 WP Event Manager 
 * @license URI: http://www.gnu.org/licenses/gpl-2.0.html
 * @license: GNU General Public License v2 or later
 * @version: 1.0
 */
?>
<div class="clear"></div>
<!--footer star here-->
<footer>
<section class="footer-top">
  <div class="container">
    <div class="row">
      <div class="col-md-3">
         <?php
            if(is_active_sidebar('footer-1'))
            {
                dynamic_sidebar('footer-1');
	        }
        ?> 
      </div>
      <div class="col-md-3">
         <?php
            if(is_active_sidebar('footer-2'))
            {
                dynamic_sidebar('footer-2');
	        }
        ?> 
      </div>
      <div class="col-md-3">
         <?php
            if(is_active_sidebar('footer-3'))
            {
                dynamic_sidebar('footer-3');
	        }
        ?> 
      </div>
      <div class="col-md-3">
         <?php
            if(is_active_sidebar('footer-4'))
            {
                dynamic_sidebar('footer-4');
	        }
        ?> 
      </div>
    </div>
  </div>

 </section>
<section class="footer-bottom">
    	<div class="container">
        	<div class="row">
            	<div class="col-md-6 col-sm-6 col-xs-12">
                 <div class="copyright-text">
				 <?php 
					if( get_theme_mod( 'footer_text_block') != "" ) {
						echo esc_html( get_theme_mod( 'footer_text_block') );
					 }
					?>                                                 
                 </div>
                </div>
            </div>
        </div>
    </section>
</footer>
<!--footer section-->
<!--footer end here-->
<?php wp_footer();?>
</body>
</html>