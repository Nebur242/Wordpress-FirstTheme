<?php 

function firsttheme_add_meta_box(){
    add_meta_box(
        'firsttheme_post_meta',
        esc_html__( 'Post Settings', 'firsttheme' ),
        'firsttheme_post_metabox_html',
        'post',
        'normal',
        'default'
    );
}


add_action('add_meta_boxes', 'firsttheme_add_meta_box');

function firsttheme_post_metabox_html($post){

    $subtitle = get_post_meta( $post->ID, '_firsttheme_post_subtitle', true );
    $layout = get_post_meta( $post->ID, '_firsttheme_post_layout', true );
    wp_nonce_field( 'firsttheme_post_metabox', 'firsttheme_update_post_nonce' );

    ?>

    <p>
        <label for="firsttheme_post_metabox_html"> <?php esc_html_e('Post Subtitle', 'firsttheme'); ?> </label>
        <br>
        <input class='widefat' type="text" name='firsttheme_post_subtitle_field' value='<?php echo esc_attr( $subtitle ); ?>' id='firsttheme_post_metabox_html'>

    </p>

    <p>
       <label for="firsttheme_post_layout_field"> <?php esc_html_e( 'Layout', 'firsttheme' ); ?> </label>
       <select name="firsttheme_post_layout_field" id="firsttheme_post_layout_field" class="widefat">
            <option <?php selected( $layout, 'full' ); ?> value="full"> <?php esc_html_e( 'Full Width', 'firsttheme' ); ?> </option>
            <option <?php selected( $layout, 'sidebar' ); ?> value="sidebar"> <?php esc_html_e( 'Post With Sidebar', 'firsttheme' ); ?> </option>
       </select>
    </p>

   
    <?php

}

function firsttheme_save_post_metabox($post_id , $post){

    $edit_cap = get_post_type_object( $post->post_type )->cap->edit_post;

    if(!current_user_can( $edit_cap , $post_id )){
        return;
    }

    if(!isset($_POST['firsttheme_update_post_nonce']) || !wp_verify_nonce( $_POST['firsttheme_update_post_nonce'], firsttheme_post_metabox )){
        return;
    }

    if(array_key_exists('firsttheme_post_subtitle_field' , $_POST)){
        update_post_meta( 
            $post_id,
            '_firsttheme_post_subtitle',
            sanitize_text_field(  $_POST['firsttheme_post_subtitle_field'] )
        );
    }

    if(array_key_exists('firsttheme_post_layout_field' , $_POST)){
        update_post_meta( 
            $post_id,
            '_firsttheme_post_layout',
            sanitize_text_field(  $_POST['firsttheme_post_layout_field'] )
        );
    }
}

add_action('save_post', 'firsttheme_save_post_metabox', 10, 2);



?>