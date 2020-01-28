<form method='get' action="<?php echo esc_url( home_url('/') ) ?>" class='d-flex'>
 
    <input type="text" name="s" class="form-control" value = '<?php echo esc_attr( get_search_query() ); ?>' placeholder ="<?php echo esc_attr_x('Search', 'firsttheme') ?>..." required>

    <button type="submit"><span class="dashicons dashicons-search" style='margin-top : 3px;'></span></button>

</form>