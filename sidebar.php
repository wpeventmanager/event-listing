<?php
/**
 * The sidebar containing the main widget area
 *
 * If no active widgets are in the sidebar, hide it completely.
 * 
 * @package WordPress
 * @subpackage Event listing
 * @since Event listing 1.0
 * @license URI: http://www.gnu.org/licenses/gpl-2.0.html
 * @license: GNU General Public License v2 or later
 * 
 */
?>
	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : 
		dynamic_sidebar( 'sidebar-1' );
	endif; ?>