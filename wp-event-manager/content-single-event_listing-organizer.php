<?php
/**
 * Single view event meta box
 *
 * Hooked into single_event_listing_start priority 20
 *
 * @since  1.14.0
 */

global $post;
do_action( 'single_event_listing_meta_before' );
?>
<section class="meta box-default-layout">
  <div class="row">
  <div class="col-md-12">
     
     <div class="event-title">
        <?php the_title();?>
     </div>    

      <?php do_action( 'single_event_listing_meta_start' ); ?>
        <ul class="when-where">
            <li><?php display_event_type($post); ?></li>
            <li><?php display_organizer_name(); ?></li>
            <li class="event-start-date">
                <?php printf( __( 'Updated %s ago', 'event-listing' ), human_time_diff( get_the_modified_time( 'U' ), current_time( 'timestamp' ) ) ); ?>
                <?php if ( is_event_cancelled() ) : ?>
                <?php _e( 'This event has been cancelled', 'event-listing' ); ?>          
                <?php elseif ( ! attendees_can_apply() && 'preview' !== $post->post_status ) : ?>
                <?php _e( 'Registrations have closed', 'event-listing' ); ?>
	            <?php endif; ?>
            </li>
    	    <li class="event-location"><?php echo esc_html(display_event_location()); ?></li>
         </ul>
      <?php do_action( 'single_event_listing_meta_end' ); ?>
  </div>
  </div>
 <div style="clear:both;"></div>
</section>
<?php do_action( 'single_event_listing_meta_after' ); ?>
<?php
/**
 * Single view organizer information box
 *
 * Hooked into single_event_listing_start priority 30
 *
 * @since  1.0.0
 */

if ( ! get_organizer_name() ) {
	return;
}
?>
<div class="organizer-details" itemscope itemtype="http://data-vocabulary.org/Organization"> 
                           
                           
                           <div class="organizer-logo-and-details-box box-default-layout">
                           <!-- Organizer logo section start -->
                           <div class="text-center">                                      
                                <?php do_action( 'event_single_organizer_logo_start' ); ?>
                                    <?php display_organizer_logo(); ?>  
                                <?php do_action( 'event_single_organizer_logo_end' ); ?>
                           </div>
                           <!-- Organizer logo section end  -->
                           
                           <!-- Organizer description start -->                              
	    	   	            <h3  class="section-title"><?php _e( 'About', 'event-listing' ); ?> <?php echo esc_html(display_organizer_name()); ?></h3>                          
                       	    <div class="text-justify"><?php echo esc_html( get_organizer_description()); ?></div>
                           <!-- Organizer description end-->
                           
                           <?php if ( attendees_can_apply() ) : ?>
                    			<?php get_event_manager_template( 'event-registration.php' ); ?>
                    	   <?php endif; ?>
                    	   
                           
                           <?php do_action( 'single_event_listing_button_start' ); ?>
                         
                           
                           
                                <!-- For more details information start -->
                                 <?php if(get_event_link_to_eventpage()): ?>
                                     <div class="text-center">
                                        <a class="link-button" data-toggle="modal" href="<?php echo esc_html(get_event_link_to_eventpage()); ?>"  target="_blank" ><?php _e( 'View More Details', 'event-listing' );?></a>
                                      </div> 
                                 <?php endif; ?>                                     
                                 <!-- For more details infomation end-->
                                 
                                 <!-- Video popup box section start -->
                                 <?php if( get_organizer_video()):?> 
                                       <div class="text-center">
                                              <a id="event-watch-video-button" class="link-button" data-toggle="modal" ><?php _e( 'Watch Video', 'event-listing' );?></a>
                                        </div> 
                                        
                                        <div class="modal fade" id="watch-video-modal" tabindex="-1" role="dialog" aria-labelledby="organizer-watch-video-modal-dialog" aria-hidden="true">
                                          <div class="modal-dialog">
					                        <div class="modal-content">
                                              <div class="modal-header">
                                                  <span class="close" data-dismiss="modal" aria-label="Close" aria-hidden="true">&times;</span>
                                                  <h4 class="modal-title" id="organizer-watch-video-modal-dialog"><?php _e( 'Watch Video', 'event-listing' );?></h4>
                                               </div>
                                               <div class="modal-body">
                                                  <?php echo wp_oembed_get(display_organizer_video() , array( 'autoplay' => 1, 'rel' => 0) );?>
                                               </div>
                                              </div>
                                            </div>
                                          </div>                                             
                                <?php endif; ?>
                                <!-- Video popup box section end -->
                             <?php do_action( 'single_event_listing_button_end' ); ?>
                               </div>                 
                                 <!-- Event Location and Time start-->   
                                <div class="when-and-where-box box-default-layout">
                                    <h3 class="section-title"><?php _e( 'When & Where', 'event-listing' );?></h3>
                                      <ul class="when-where">
                                        <li class="event-start-date">                                           
                                         <?php _e('From:','event-listing');?><?php $timestamp = strtotime(get_event_start_date()); if($timestamp!=null):echo date("M j, Y",$timestamp).','.get_event_start_time(); endif;?>
                                        </li>
                                        <li class="event-end-date">                                             
                                          <?php _e('To:','event-listing');?><?php $timestamp = strtotime(get_event_end_date());  if($timestamp!=null): echo date("M j, Y",$timestamp).','.get_event_end_time();  endif; ?>
                                        </li>
                					    <li class="event-location">					    
                					     <?php _e('Location:','event-listing');?>
                					     <?php if(get_event_location($post)=='Anywhere' || get_event_location($post) == '' ): 
                						      _e('Online Event','event-listing') ; 
                					      else:
                					          echo '<strong>' . esc_html(get_event_venue_name()) . '</strong><br><p class="text-center">'. esc_html(get_event_address()). ', ' . esc_html(get_event_pincode()) .', '. esc_html(get_event_location()) . '.</p>'; 
                					      endif;?>
                					    </li>
				                     </ul>
                                </div> 
				                <!-- Event Location and Time End-->
                                                     
                                 <!-- Event Registration End Date start-->
                                 
                                 <?php if(get_event_registration_end_date()): ?>   
                                 <div class="registration-end-date-box box-default-layout">
                                         <div>
                                            <h3 class="section-title"><?php _e( 'Registration End Date', 'event-listing' );?></h3>
                                             <ul class="when-where">
                                                <li class="registration-end-date">                                        
                                                    <?php $timestamp = strtotime(get_event_registration_end_date()); if($timestamp!=null): echo date("M j, Y",$timestamp).','.date("g:i a",$timestamp); endif; ?>
                                                 </li>
                                              </ul>
                                          </div>    
                                           </div>
                                 <?php endif; ?>
                                 
                                  <!-- Registration End Date End-->
                    
                   <!-- Organizer website and social networks links section start -->
                   
                   
                    <?php 
                    $websiteurl= get_organizer_website();			       
                    $facebook= get_organizer_facebook();
		                $twitter= get_organizer_twitter();			          
                    $linkedin=get_organizer_linkedin();
                    $xing=get_organizer_xing();
                    $pinterest=get_organizer_pinterest();
                    $instagram=get_organizer_instagram();
                    $youtube=get_organizer_youtube();
                    $googleplus=get_organizer_google_plus(); 	
                    if(   $websiteurl|| 
                          $facebook  || 
                          $twitter   || 
                          $linkedin  || 
                          $xing      || 
                          $pinterest || 
                          $instagram || 
                          $youtube   || 
                          $googleplus )  
                   {  ?>     
                       <div class="organizer-social-box box-default-layout">
                        	 <div>
                             	<h3 class="section-title"><?php _e( 'Organizer Social', 'event-listing' );?></h3>
                                <ul class="organizer-social">
                                <!-- Organizer website section start -->
                                 <?php if($websiteurl) { ?>
                                 	<li><a href=" <?php echo esc_url($websiteurl); ?>" class="website-link" target="_blank"><?php _e( 'Website', 'event-listing' );?></a></li>
                                 <?php  } ?>			    
                                <!-- Organizer website section end -->
                                <!-- Organizer facebook section start -->
                                <?php if($facebook) { ?>
                                	<li><a href=" <?php echo esc_url($facebook); ?>"  class="fb-link" target="_blank"><?php _e( 'Facebook', 'event-listing' );?></a></li>
                                 <?php } ?>			    
                                 <!-- Organizer facebook section end -->
                                                                    
                                 <!-- Organizer twitter section start -->
                                 <?php if($twitter) { ?>
                                 	<li><a href=" <?php echo esc_url($twitter); ?>"  class="twitter-link"  target="_blank"><?php _e( 'Twitter', 'event-listing' );?></a></li>
                                 <?php } ?>
                                 <!-- Organizer twitter section end -->
                                                                    
                                 <!-- Organizer linkedin section start -->
                                 <?php if($linkedin) { ?>
                                 	<li><a href=" <?php echo esc_url($linkedin); ?>" class="linkedin-link" target="_blank"><?php _e( 'Linkedin', 'event-listing' );?></a></li>
                                 <?php } ?>			    
                                 <!-- Organizer linkedin section end -->
                                            
                                 <!-- Organizer xing section start -->
                                 <?php if($xing) { ?>
                                 	<li><a href=" <?php echo esc_url($xing); ?>"  class="xing-link" target="_blank"><?php _e( 'Xing', 'event-listing' );?></a></li>
                                 <?php } ?>			    
                                 <!-- Organizer xing section end -->
                                            
                                  <!-- Organizer pinterest section start -->
                                  <?php if($pinterest) { ?>
                                  	<li><a href=" <?php echo esc_url($pinterest); ?>" class="pinterest-link" target="_blank"><?php _e( 'Pinterest', 'event-listing' );?></a></li>
                                  <?php } ?>			    
                                 <!-- Organizer pinterest section end -->
                                            
                                 <!-- Organizer instagram section start -->
                                 <?php if($instagram) { ?>
                                 	<li><a href=" <?php echo esc_url($instagram); ?>"  class="instagram-link" target="_blank"><?php _e( 'Instagram', 'event-listing' );?></a></li>
                                 <?php } ?>			    
                                 <!-- Organizer instagram section end -->
                                            
                                 <!-- Organizer youtube section start -->
                                 <?php if($youtube) { ?>
                                 	<li><a href=" <?php echo esc_url($youtube); ?>"  class="youtube-link" target="_blank"><?php _e( 'Youtube', 'event-listing' );?></a></li>
                                 <?php } ?>			    
                                 <!-- Organizer youtube section end -->
                                            
                                 <!-- Organizer googleplus section start -->
                                 <?php if($googleplus) { ?>
                                 	<li><a href=" <?php echo esc_url($googleplus); ?>"  class="gplus-link" target="_blank"><?php _e( 'Google', 'event-listing' );?></a></li></li>
                                <?php } ?>	
                                <!-- Organizer googleplus section end -->			    
                      				    	   
                  	</ul> 
        		</div>
        		       </div>
    		       <?php  } ?>	
    		
           <!-- Organizer website and social networks links section end -->   
                                        
            
              
</div>  <!-- organizer-details end -->   