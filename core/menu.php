<?php
/* 
 * Extending walker calss that iterates over each data record and then displays this record accordingly. we can improve wordpress navigation menu output using walker class.
 *
 * @theme Name: Event Listing
 * @theme URI: http://wp-eventmanager.com/theme/
 * @author: WP Event Manager
 * @author URI: http://www.wp-eventmanager.com/
 * @copyright Copyright (C) 2017 WP Event Manager 
 * @license URI: http://www.gnu.org/licenses/gpl-2.0.html
 * @license: GNU General Public License v2 or later
 * @version: 1.5
 */ 
/**
 * Create HTML list of left menu part with nav menu items.
 * Replacement for the native Walker, using the custom menu class.
 *
 *
 * @since 1.0
 */
class event_listing_header_menu_left_walker extends Walker_Nav_Menu
{

      /**
       * Start the element output.
       *
       * @param  string $output Passed by reference. Used to append additional content.
       * @param  object $item   Menu item data object.
       * @param  int $depth     Depth of menu item. May be used for padding.
       * @param  array $args    Additional strings.
       * @return void
       */
      public function start_el(&$output,  $item, $depth = 0, $args = array(), $id = 0)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           $class_names = ' class="'. esc_attr( $class_names ) . '"';

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '<strong>';
           $append = '</strong>';
           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            $item_output .= '<a'. $attributes .'>';
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }
}
/**
 * Create HTML list of right menu part with nav menu items.
 * Replacement for the native Walker, using the custom menu class.
 *
 * Important: Wordpress counts the first submenu as 0 depth.
 *       
 *
 * @since 1.0.0
 */
class event_listing_header_menu_right_walker extends Walker_Nav_Menu
{

      /**
       * Start the element output.
       *
       * @param  string $output Passed by reference. Used to append additional content.
       * @param  object $item   Menu item data object.
       * @param  int $depth     Depth of menu item. May be used for padding.
       * @param  array $args    Additional strings.
       * @return void
       */
      public function start_el(&$output,  $item, $depth = 0, $args = array(), $id = 0)
      {
           global $wp_query;
           $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';               

           $class_names = $value = '';

           $classes = empty( $item->classes ) ? array() : (array) $item->classes;

           $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
           
         
           $class_names = ' class="'. esc_attr( $class_names ) .'"';        
      

           $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';           
         
           $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
           $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
           $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
           $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

           $prepend = '<strong>';
           $append = '</strong>';
           $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

           if($depth != 0)
           {
                     $description = $append = $prepend = "";
           }

            $item_output = $args->before;
            
            //To get : <a aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle" href="#">MY ACCOUNT<span class="caret"></span></a>
            
            if($item->title =='My Account')
            {
            	$item_output .= '<a'. $attributes . ' aria-expanded="true" role="button" data-toggle="dropdown" class="dropdown-toggle"' .'>';
            }
            else
            {            
              $item_output .= '<a'. $attributes . '>';
            }  
            $item_output .= $args->link_before .$prepend.apply_filters( 'the_title', $item->title, $item->ID ).$append;
            $item_output .= $description.$args->link_after;
            $item_output .= '</a>';         
            $item_output .= $args->after;

            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
        }  
        
        /**
	 * @see Walker::start_lvl()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return void
	 */
	public function start_lvl( &$output,$depth = 0, $args = array())
	{
		$output .= '<ul class="dropdown-menu">';
	}

	/**
	 * @see Walker::end_lvl()
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @return void
	 */
	public function end_lvl( &$output,$depth = 0, $args = array() )
	{
		$output .= '</ul>';
	}
}


/* Bootstrap_Walker for Wordpress
 * Author: George Huger, Illuminati Karate, Inc
 * More Info: http://illuminatikarate.com/blog/bootstrap-walker-for-wordpress
 *
 * Formats a Wordpress menu to be used as a Bootstrap dropdown menu (http://getbootstrap.com).
 *
 * Specifically, it makes these changes to the normal Wordpress menu output to support Bootstrap:
 *
 *        - adds a 'dropdown' class to level-0 <li>'s which contain a dropdown
 *         - adds a 'dropdown-submenu' class to level-1 <li>'s which contain a dropdown
 *         - adds the 'dropdown-menu' class to level-1 and level-2 <ul>'s
 *
 * Supports menus up to 3 levels deep.
 * 
 */
class Bootstrap_Walker extends Walker_Nav_Menu
{    
 
        /* Start of the <ul>
         *
         * Note on $depth: Counterintuitively, $depth here means the "depth right before we start this menu". 
         *                   So basically add one to what you'd expect it to be
         */        
        public function start_lvl(&$output,$depth = 0, $args = array())
        {
            $tabs = str_repeat("\t", $depth);
            // If we are about to start the first submenu, we need to give it a dropdown-menu class
            if ($depth == 0 || $depth == 1) { //really, level-1 or level-2, because $depth is misleading here (see note above)
                $output .= "\n{$tabs}<ul class=\"dropdown-menu\">\n";
            } else {
                $output .= "\n{$tabs}<ul>\n";
            }
            return;
        }
 
        /* End of the <ul>
         *
         * Note on $depth: Counterintuitively, $depth here means the "depth right before we start this menu". 
         *                   So basically add one to what you'd expect it to be
         */        
        public function end_lvl(&$output,$depth = 0, $args = array()) 
        {
            if ($depth == 0) { // This is actually the end of the level-1 submenu ($depth is misleading here too!)
 
                // we don't have anything special for Bootstrap, so we'll just leave an HTML comment for now
                $output .= '<!--.dropdown-->';
            }
            $tabs = str_repeat("\t", $depth);
            $output .= "\n{$tabs}</ul>\n";
            return;
        }
 
        /* Output the <li> and the containing <a>
         * Note: $depth is "correct" at this level
         */        
        public function start_el(&$output,  $item, $depth = 0, $args = array(), $id = 0) 
        {    
            global $wp_query;
            $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
            $class_names = $value = '';
            $classes = empty( $item->classes ) ? array() : (array) $item->classes;
 
            /* If this item has a dropdown menu, add the 'dropdown' class for Bootstrap */
            if ($item->hasChildren) {
                $classes[] = 'dropdown';
                // level-1 menus also need the 'dropdown-submenu' class
                if($depth == 1) {
                    $classes[] = 'dropdown-submenu';
                }
            }
 
            /* This is the stock Wordpress code that builds the <li> with all of its attributes */
            $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
            $class_names = ' class="' . esc_attr( $class_names ) . '"';
            $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';            
            $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
            $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
            $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
            $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
            $item_output = $args->before;
 
            /* If this item has a dropdown menu, make clicking on this link toggle it */
            if ($item->hasChildren && $depth == 0) {
                $item_output .= '<a'. $attributes .' class="dropdown-toggle" data-toggle="dropdown">';
                //$item_output .= '<a'. $attributes .'>';
            } else {
                $item_output .= '<a'. $attributes .'>';
            }
 
            $prepend = '<strong>';
            $append = '</strong>';
            $item_output .= $args->link_before .$prepend. apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after .$append;
 
            /* Output the actual caret for the user to click on to toggle the menu */            
            if ($item->hasChildren && $depth == 0) {
                $item_output .= '<b class="caret"></b></a>';
            } else {
                $item_output .= '</a>';
            }
 
            $item_output .= $args->after;
            $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            return;
        }
 
        /* Close the <li>
         * Note: the <a> is already closed
         * Note 2: $depth is "correct" at this level
         */        
        public function end_el (&$output,$item, $depth = 0, $args = array())
        {
            $output .= '</li>';
            return;
        }
 
        /* Add a 'hasChildren' property to the item
         * Code from: http://wordpress.org/support/topic/how-do-i-know-if-a-menu-item-has-children-or-is-a-leaf#post-3139633 
         */
        public function display_element ($element, &$children_elements, $max_depth, $depth = 0, $args, &$output)
        {
            // check whether this item has children, and set $item->hasChildren accordingly
            $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);
 
            // continue with normal behavior
            return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
        }        
}
?>