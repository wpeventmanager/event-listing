<?php
/**
 * The header file for the event listing theme.
 *
 * Displays all of the <head><meta http-equiv="Content-Type" content="text/html; charset=windows-1252"> section 
 *
 * @theme Name: Event Listing
 * @theme URI:http://wp-eventmanager.com/theme/
 * @author: WP Event Manager
 * @author URI: http://www.wp-eventmanager.com/
 * @copyright Copyright (C) 2017 WP Event Manager 
 * @license URI: http://www.gnu.org/licenses/gpl-2.0.html
 * @license: GNU General Public License v2 or later
 * @version: 1.5
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">


  <!-- wp head load all enqueue scripts action -->
  
  <?php wp_head(); ?>
  
</head>
<body <?php body_class(); ?>>
<!--header start-->
<header class="site-header">
  <div class="container">
  <div class="row">
  <div class="col-md-12">
  <h1 class="site-branding">
  <?php 
    if ( function_exists( 'the_custom_logo' ) ) {
    	if( get_custom_logo()){
			the_custom_logo();
        }
        else
        { 	
		?>
        <a href="<?php echo home_url();?>" ><?php bloginfo( 'name' ); ?></a>
        <?php  }
    }
    ?>  
    </h1>
    <!--navigation start here-->
    <div class="navigation">
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button"> <span class="sr-only"><?php __('Toggle navigation','event-listing');?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
          </div>
          <div class="navbar-collapse collapse " id="navbar">
           <?php
                if ( has_nav_menu( 'header-menu-primary' ) ) {
                     	wp_nav_menu( array(
					 'container' =>false,
					 'menu_class' => 'nav navbar-nav',
					 'theme_location' => 'header-menu-primary',
					 'echo' => true,
					 'before' => '',
					 'after' => '',
					 'link_before' => '',
					 'link_after' => '',
					 'depth' => 0,
					 'walker' => new Bootstrap_Walker())
				 );
                } ?>

        <?php 
	
	if ( is_user_logged_in() ) 
	{
	    if ( has_nav_menu( 'header-menu-user' ) ) {
	        
	        //For company	 
			 wp_nav_menu( array(
						 'container' =>false,
						 'menu_class' => 'nav navbar-nav',
						 'theme_location' => 'header-menu-user',
						 'echo' => true,
						 'before' => '',
						 'after' => '',
						 'link_before' => '',
						 'link_after' => '',
						 'depth' => 0,
						 'walker' => new Bootstrap_Walker())
					    );   
	    }
	}
	else{
	    if ( has_nav_menu( 'header-menu-login' ) ) {
	        
	        //For company	 
			 wp_nav_menu( array(
						 'container' =>false,
						 'menu_class' => 'nav navbar-nav',
						 'theme_location' => 'header-menu-login',
						 'echo' => true,
						 'before' => '',
						 'after' => '',
						 'link_before' => '',
						 'link_after' => '',
						 'depth' => 0,
						 'walker' => new Bootstrap_Walker())
					    );   
	    }
	}   
			?>	 
          </div>
          <!--/.nav-collapse -->
        </div>
        <!--/.container-fluid -->
      </nav>
    </div>
    <!--navigation end here-->
    </div>
  </div>
  </div>
</header>
<!--header end-->