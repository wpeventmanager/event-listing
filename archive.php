<?php
/**
 * The template file for archives.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 * 
 * @license URI: http://www.gnu.org/licenses/gpl-2.0.html
 * @license: GNU General Public License v2 or later
 
 **/
get_header(); ?>
<div class="site-content">
	<div class="container">
		<main id="main" class="site-main" role="main">
			<div class="row">
		<?php if ( have_posts() ) : ?>
		  <header class="page-header">
			  <?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
		  </header><!-- .page-header -->
		  <div class="clear"></div>
	  <?php
	  // Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );

			// End the loop.
			endwhile;
			
		  the_posts_pagination( array(
			  'mid_size' => 3,
			  'prev_text' => '<i class="fa fa-angle-double-left"></i>',
			  'next_text' => '<i class="fa fa-angle-double-right"></i>',
			  ) );
  endif; ?>
			
			</div>

		</main>
	</div>
</div>
<?php get_footer(); ?>
