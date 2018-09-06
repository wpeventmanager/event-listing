<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage eventlisting
 * @since Event Listing 1.0
 * @license URI: http://www.gnu.org/licenses/gpl-2.0.html
 * @license: GNU General Public License v2 or later
 * 
 */
get_header(); ?>
<div id="primary" class="content-area">
	<div id="content" class="site-content" role="main">
		<header class="page-header">
			<h1 class="page-title"><?php _e( 'Not Found', 'event-listing' ); ?></h1>
		</header>
		<div class="page-content">
			<p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'event-listing' ); ?></p>
			<?php get_search_form(); ?>
		</div><!-- .page-content -->
	</div><!-- #content -->
</div><!-- #primary -->
<?php get_footer();?>
