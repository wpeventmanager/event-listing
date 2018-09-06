<?php
/**
 * The main template file
 * @license URI: http://www.gnu.org/licenses/gpl-2.0.html
 * @license: GNU General Public License v2 or later
 * 
 */
get_header(); ?>
<div class="events-section">
<?php if ( have_posts() ) : ?>
        <!--innerpage content start here-->
        <div class="content">
          <div class="container">
            <div class="row">
              <div class="col-lg-8">
                <?php while ( have_posts() ) : the_post();?>
                <div class="post">
                  <div class="post-image"><?php echo get_the_post_thumbnail( $post->ID, 'thumbnail' ); ?></div>
                  <div class="post-thumb-text">
                    <h1 class="post-title"><a href="<?php echo get_permalink($post->ID);?>"><?php echo esc_html(get_the_title()) ; ?></a></h1>
                    <time datetime="<?php echo get_the_date('c'); ?>" itemprop="datePublished"><?php echo get_the_date(); ?></time>
                    <div class="post-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="readmore-bn"><a href="<?php echo the_permalink();?>"><?php _e('Read more','event-listing');?></a></div>
                  </div>
                  <?php endwhile;?>
                  <?php the_posts_pagination( array(
                                                    'mid_size' => 2,
                                                    'prev_text' => __( 'Back', 'event-listing' ),
                                                    'next_text' => __( 'Onward', 'event-listing' ),
                                                ) ); ?>
                  
                </div>
                 <!--col-lg-8-->
             <?php  get_sidebar();   ?>
             
              </div>
            </div>
          </div> 
    <?php endif;?>
</div>
<?php get_footer(); ?>
