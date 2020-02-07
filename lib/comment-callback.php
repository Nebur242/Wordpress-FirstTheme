<?php 

    function firsttheme_comment_callback($comment , $args , $depth){
        $tag = ($args['style'] === 'div') ? 'div' : 'li';

        
?>

    <<?php echo $tag ?> id='comment-<?php comment_ID(); ?>' <?php comment_class( 'comment p-2 bg-light rounded mb-3', $comment->comment_parent ? 'comment--child' : '') ?>>

        <article class="comment__body bg-light d-flex my-3" id='div-comment-<?php comment_ID(); ?>'>
      <?php   echo $comment->comment_type; ?>
         
            <?php if($args['avatar_size'] != 0 ) echo get_avatar( $comment, $args['avatar_size'], false, false, array('class' => 'comment__avatar rounded-circle')); ?>
            

            <div class='flex-grow-1'>
                <div class="flex-grow-1 d-flex justify-content-between pl-2">
                

                <div>
                        <div class='h5 mt-1'><?php echo get_comment_author_link($comment); ?></div>

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

                <?php if($comment->comment_approved == '0') { ?>

                    <p class="comment__awaiting-moderation"> <?php esc_html_e( 'Your comment is awaiting moderation.', 'firsttheme' ); ?> </p>

                <?php } ?>

                <div class='mt-2'>
                        <div class='p-2'>
                            <?php 
                                /* if($comment->comment_type == '' || (($comment->comment_type == 'trackback') && !$args['short_ping']) ){
                                     
                                } to get back soon */
                                comment_text() ;
                                
                            ?>
                        </div>
                       

                        <?php 
                            comment_reply_link( array_merge($args ,  array(
                                'depth' => $depth,
                                'add_below' => 'div-comment',
                                'before' => '<div class = "text-white btn btn-success float-right">',
                                'after' => '</div>'
                            ) ) );
                        
                        ?>
                
                </div>
            
            
            </div>
        </article>

<?php
} 
?>