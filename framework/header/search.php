<?php
/**
 *  PHP file for Search
 */
?>

<div class="itng-search-<?php echo $args ?>">
 <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
   <label>
       <span class="screen-reader-text"><?php _ex( 'Search for:', 'label', 'it-news-grid' ); ?></span>
       <input type="text" class="search-field-<?php echo $args ?>" placeholder="<?php echo esc_attr_e( 'Search...', 'it-news-grid' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" tabindex="-1">
       <button type="button" id="go-to-btn" tabindex="-1"></button>
   </label>
</form>
</div>