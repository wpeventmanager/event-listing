<?php
/**
 * The template for displaying image attachments
 *
 * @package WordPress
 * @subpackage Event Listing
 * @since Event Listing 1.0
 * @license URI: http://www.gnu.org/licenses/gpl-2.0.html
 * @license: GNU General Public License v2 or later
 */

// Retrieve attachment metadata.
$metadata = wp_get_attachment_metadata();

get_header();
?>
<section id="primary" class="content-area image-attachment">
	<div id="content" class="site-content" role="main">
<?php
	// Start the Loop.
	while ( have_posts() ) : the_post();
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header class="entry-header">
				<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
				<div class="entry-meta">
					<span class="entry-date"><time class="entry-date" datetime="<?php echo esc_attr( get_the_date( 'c' ) ); ?>"><?php echo esc_html( get_the_date() ); ?></time></span>
					<span class="full-size-link"><a href="<?php echo esc_url( wp_get_attachment_url() ); ?>"><?php echo esc_html( $metadata['width'] ); ?> &times; <?php echo esc_html( $metadata['height'] ); ?></a></span>
					<span class="parent-post-link"><a href="<?php echo esc_url( get_permalink( $post->post_parent ) ); ?>" rel="gallery"><?php echo get_the_title( $post->post_parent ); ?></a></span>
					<?php edit_post_link( __( 'Edit', 'event-listing' ), '<span class="edit-link">', '</span>' ); ?>
				</div><!-- .entry-meta -->
			</header><!-- .entry-header -->
			<div class="entry-content">
				<div class="entry-attachment">
					<div class="attachment">
							<?php echo wp_get_attachment_image( get_the_ID() ,'full');?>
					</div><!-- .attachment -->
					<?php if ( has_excerpt() ) : ?>
					<div class="entry-caption">
						<?php the_excerpt(); ?>
					</div><!-- .entry-caption -->
					<?php endif; ?>
				</div><!-- .entry-attachment -->
				<?php
					the_content();
					wp_link_pages( array(
						'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'event-listing' ) . '</span>',
						'after'       => '</div>',
						'link_before' => '<span>',
						'link_after'  => '</span>',
					) );
				?>
			</div><!-- .entry-content -->
		</article><!-- #post-## -->
		<nav id="image-navigation" class="navigation image-navigation">
			<div class="nav-links">
			<?php previous_image_link( false, '<div class="previous-image">' . __( 'Previous Image', 'event-listing' ) . '</div>' ); ?>
			<?php next_image_link( false, '<div class="next-image">' . __( 'Next Image', 'event-listing' ) . '</div>' ); ?>
			</div><!-- .nav-links -->
		</nav><!-- #image-navigation -->
		<?php comments_template(); ?>
	<?php endwhile; // end of the loop. ?>
	</div><!-- #content -->
</section><!-- #primary -->
<?php
get_sidebar();
get_footer();
