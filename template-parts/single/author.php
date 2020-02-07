<div class='post-author bg-light p-2 rounded mb-3' style = 'display : flex;'>
    <h2 class='d-none'> <?php esc_attr_e( 'About The Author', 'firttheme' ); ?> </h2>

    <?php 
        $author_id = get_the_author_meta( 'ID' );
        $author_posts = get_the_author_posts();
        $author_display = get_the_author();
        $author_posts_url = get_author_posts_url( $author_id );
        $auther_description = get_the_author_meta( 'user_description' );
        $author_website = get_the_author_meta( 'user_url' )
    ?>

    <div class="post-author__avatar">
        <?php echo get_avatar( $author_id, 50 ); ?>
    </div>

    <div class="post-author__content pl-2  pb-3">
        <div class="post-autor__title">
            <?php if($author_website){ ?>
                <a target='_blank' href=" <?php echo esc_url( $author_website ); ?> ">
            <?php } ?>
                    <?php echo esc_html( $author_display ); ?>

            <?php if($author_website){ ?>
                </a>
            <?php } ?>
        </div>

        <div class="post-author__info">
            <a href=" <?php echo esc_url($author_posts_url); ?> ">
                <?php 
                    printf(esc_html( _n('%s post' , '%s posts' , $author_posts , 'firsttheme') ) , number_format_i18n($author_posts));
                ?>
            </a>
        </div>

        <div class="post-author__description">
            <?php echo '<em>'. esc_html( $auther_description ) . '</em>' ; ?>
        </div>
    </div>

</div>