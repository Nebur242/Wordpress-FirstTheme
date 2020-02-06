<?php 

    function firsttheme_comment_callback($comment , $args , $depth){
?>

    <li id='comment-<?php comment_ID(); ?>' <?php comment_class( 'comment', $comment->comment_parent ? 'comment--child' : '') ?>>

        <article class="comment__body bg-light d-flex">

         
            <?php echo get_avatar( $comment, 30, false, false, array('class' => 'comment__avatar')); ?>
            

            <div class="flex-grow-1 d-flex justify-content-between px-2">
               

               <div>
                    <div><?php echo get_comment_author_link($comment); ?></div>

                    <a href=" <?php echo esc_url( get_comment_link($comment , $args)) ?> " class="comment__time">

                        <time datetime = '<?php comment_time( 'c' ); ?>'>

                            <?php 
                                printf(esc_html__( "%s ago" , 'firsttheme' ),  human_time_diff( get_comment_time('U'), current_time( 'U' ) ));

                            ?>

                        </time>

                    </a>
               </div>

                <?php edit_comment_link(esc_html__( 'Edit Comment', 'firsttheme' ) , '<span class=" comment__edit-link ">' , '</span>'); ?>

            </div>

          
            
        </article>

<?php
} 
?>