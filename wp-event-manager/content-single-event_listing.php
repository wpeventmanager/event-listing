<div class="single_event_listing" itemscope itemtype="http://schema.org/EventPosting">
<meta itemprop="title" content="<?php echo esc_attr( $post->post_title ); ?>" />
    <!-- Main if condition start -->
	<?php if ( get_option( 'event_manager_hide_expired_content', 1 ) && 'expired' === $post->post_status ) : ?>
		<div class="event-manager-info"><?php _e( 'This listing has expired.', 'event-listing' ); ?></div>
	<?php else : ?>
		<?php
			/**
			 * single_event_listing_start hook
			 *	
			 */
			do_action( 'single_event_listing_start' );
			do_action( 'set_single_listing_view_count', $post);
		?>
		<div class="row">                   
             <!-- Event description column start -->                             
            <div class="col-md-8 text-justify"> 
                <div class="box-default-layout">
              <?php do_action('single_event_overview_start');?>
              <div class="event-details">
                <h3 class="section-title"><?php _e( 'Event Overview', 'event-listing' ); ?></h3>  
               <?php $event_banners = get_event_banner(); ?> 
                <?php if( is_array( $event_banners) && sizeof($event_banners ) > 1 )
                { ?>
                    <div id="single-event-slider" class="carousel slide" data-ride="carousel">
                   
                      <!-- Wrapper for slides -->
                      <div class="carousel-inner">
                       
                        <?php 
                        $active = 'active';
                           foreach($event_banners as $banner_key => $banner_value ){
                        ?>
                        <div class="item <?php echo esc_html($active); ?>">
                          <img src="<?php echo esc_url($banner_value); ?>"  alt="<?php echo esc_attr( get_organizer_name( $post ) );?>">
                        </div>
                        <?php
                        $active ='';
                           }
                         ?>
                      </div>

                    </div>                    
                     <div class="clearfix">
        <div id="thumbcarousel" class="carousel slide" data-interval="false">
            <div class="carousel-inner">
               
                <?php 
                $slide_to = 0;
                foreach($event_banners as $banner_key => $banner_value ){ 
                     if( $slide_to == 0) {
                        $thumbanils_num = +4;
                        echo '<div class="item active">';
                      }
                      elseif( $slide_to == $thumbanils_num){
                        $thumbanils_num = $thumbanils_num + 4;
                        echo '</div><div class="item">';
                      }                
                
                ?>
                    <div data-target="#myCarousel" data-slide-to="<?php echo esc_html($slide_to);?>" class="thumb"><img src="<?php echo esc_html($banner_value); ?>"></div>
                    <?php
                     $slide_to++;
                    } ?>
                </div><!-- /items -->
                
                  <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a>
                
            </div><!-- /carousel-inner -->
        
        </div> <!-- /thumbcarousel -->
          </div><!-- /clearfix -->

   <?php 
		} 
        else {
           display_event_banner();
        } 
        ?> 
                <?php echo apply_filters( 'display_event_description', get_the_content() ); ?>               
              </div>
              <?php do_action('single_event_overview_end'); ?>
                </div>
            
              <!-- Event Ticket start-->  
                                <div class="ticket-information-box box-default-layout">
                                  <h3 class="section-title"><?php _e( 'Ticket Information', 'event-listing' ); ?></h3>
                                   <ul class="when-where">
                                      <li class="event-ticket">#<?php echo get_event_ticket_option(); ?></li>
                                   </ul>
                                </div>
                                 <!--Event Ticket End-->   
            
                
                <!-- Social sharing section start -->
           <!--<div class="share-this-event-box box-default-layout">
           
           <div>                                               		    
           		<h3 class="section-title"><?php //_e( 'Share This Event', 'event-listing' );?></h3>
           		<ul class="social-share">
                	<li><a href="http://www.facebook.com/sharer/sharer.php?u=<?php //esc_url(display_event_permalink()); ?>" class="fb-icon" target="_blank"></a></li>
                    <li><a href="http://twitter.com/share?text=twitter&url=<?php //esc_url(display_event_permalink()); ?>" class="twitter-icon"  target="_blank"></a></li>
                    <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=&title=&summary=&source=<?php //esc_url(display_event_permalink()); ?>" class="linkedin-icon" target="_blank"></a></li>	
                    <li><a href="https://www.xing.com/spi/shares/new?url=<?php //esc_url(display_event_permalink()); ?>" class="xing-icon" target="_blank"></a></li>									
                    <li><a href="https://plus.google.com/share?url=<?php //esc_url(display_event_permalink()); ?>" class="gplus-icon" target="_blank"></a></li>								  
                    <li><a href="https://pinterest.com/pin/create/button/?url=<?php //esc_url(display_event_permalink()); ?>" class="pinterest-icon" target="_blank"></a></li>  								  
                </ul>
          </div>
          
          </div>-->
          <!-- Social sharing section end -->  
                
            </div>   
            <!-- Event description column end -->
                                                    
           <!-- Organizer logo, Contact button, event location, time and social sharing column start -->                       
            <div class="col-md-4 text-justify ">                            
                <?php  get_event_manager_template_part( 'content', 'single-event_listing-organizer' ); ?>
            </div>  <!-- col-md-4 --> 
           <!-- Organizer logo, Contact button, event location, time and social sharing column end -->
                 
	 	</div>
	 	
	<?php
    /**
     * single_event_listing_end hook
     */
    	do_action( 'single_event_listing_end' );
    ?>
  <?php endif; ?><!-- Main if condition end -->
</div>

