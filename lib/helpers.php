
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

?>
    