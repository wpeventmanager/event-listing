<?php
/**
 * The template for displaying Category pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Eventlisting
 * @since Eventlisting 1.0
 * @license URI: http://www.gnu.org/licenses/gpl-2.0.html
 * @license: GNU General Public License v2 or later
 * 
 */

get_header(); ?>
	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<?php if ( have_posts() ) : ?>
			<header class="archive-header">
				<h1 class="archive-title"><?php the_archive_title( '<h1 class="page-title">', '</h1>' ); ?></h1>
				<?php the_archive_description( '<div class="taxonomy-description">', '</div>' );?>
				<?php
					// Show an optional term description.
					$term_description = term_description();
					if ( ! empty( $term_description ) ) :
						printf( __('<div class="taxonomy-description">%s</div>','event-listing'), $term_description );
					endif;
				?>
			</header><!-- .archive-header -->
			
        <?php endif;?>

		</div><!-- #content -->
	</section><!-- #primary -->
<?php
get_sidebar();

get_footer(); ?>
