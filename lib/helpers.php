
<?php 
    if(!function_exists('firsttheme_post_meta')){
        function firsttheme_post_meta(){

            echo 'Posted on';
            echo '<a href="'. esc_url( get_permalink()) .'">';
            echo '<time datetime="' .esc_attr(get_the_date( 'c' )) .'"> ' . esc_html(  get_the_date() ) .'</time>'; 
            echo '</a>'; 
            echo ' by :'; 
            echo '<a href="'. get_author_posts_url(get_the_author_meta( 'ID' )) .' "> ' .get_the_author() .' </a>';
         
        } 
    }

    function firsttheme_readMore_link(){
        echo ' <a href="'. esc_url( get_permalink() ) . '" title="'.the_title_attribute(['echo' => false]) .'" >'; 
        echo ' Read more '. '<span class="u-screen-reader-text"> ' . the_title() . '</span> 
        </a>';
    }


    function firsttheme_delete_post(){
        $url = add_query_arg([
            'action' => 'firsttheme_delete_post',
            'post' => get_the_ID(),
            'nonce' => wp_create_nonce( 'firsttheme_delete_post_'.get_the_ID() )
        ] , home_url());
        if(current_user_can( 'delete_posts' ,  get_the_ID()   )){
            return " <a href = ' " . esc_url( $url ) . "'>". esc_html__( 'Delete Post', 'firsttheme' ) . "</a>";
        }
    }

    //get single meta function which checks if there is a value in the string
    function firsttheme_meta($id , $key , $default){
        $value = get_post_meta($id , $key , true);
        if(!$value && $default){
            return $default;
        }

        return $value;
    }

?>
    