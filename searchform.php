<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ) ?>">
    <label>
        <span class="screen-reader-text"><?php _e( 'Search for:', 'event-listing' )?></span>
        <input type="search" class="search-field" placeholder="<?php echo esc_attr_e( 'Search &hellip;', 'event-listing' ) ?>" value="<?php echo get_search_query() ?>" name="s" />
    </label>
    <button type="submit" class="search-submit"><i class="fa fa-search"></i></button>
</form>