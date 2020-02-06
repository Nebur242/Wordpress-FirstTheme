<?php 

    $prev = get_previous_post();
    $next = get_next_post();

?>


<?php if($prev || $next){ ?>

    <nav class="post-navigation m-2" role = 'navigation'>
        <h2 class='d-none'> <?php esc_attr_e( 'Post Navigation', 'firttheme' ); ?> </h2>
        <div class="post-navigation__links d-flex">
            <?php if($prev) {?>
                <div class="post-navigation__post post-navigation__post--prev flex-grow-1">
                    <a href=" <?php the_permalink( $prev->ID ); ?> " class="post-navigation__post">
                        <?php if(has_post_thumbnail( $prev->ID )){ ?>
                            <div class="c-post-navigation__thumbnail">
                                <?php echo get_the_post_thumbnail( $prev->ID, 'thumbnail' ) ; ?>
                            </div>
                        <?php } ?>

                        <div class="post-navigation__content">
                            <span class="post-navigation__subtitle"> <?php esc_html_e( 'Previous Post : ', 'firsttheme' ); ?> </span>
                            <span class="post-navigation__title"> <?php echo esc_html( get_the_title($prev->ID) ); ?> </span>
                        </div>
                    </a>
                </div>
            <?php }?>

            <?php if($next) {?>
                <div class="post-navigation__post post-navigation__post--next flex-grow-1">
                    <a href=" <?php the_permalink( $next->ID ); ?> " class="post-navigation__post">
                        <?php if(has_post_thumbnail( $next->ID )){ ?>
                            <div class="c-post-navigation__thumbnail">
                                <?php echo get_the_post_thumbnail( $next->ID, 'thumbnail' ) ; ?>
                            </div>
                        <?php } ?>

                        <div class="post-navigation__content">
                            <span class="post-navigation__subtitle"> <?php esc_html_e( 'Next Post : ', 'firsttheme' ); ?> </span>
                            <span class="post-navigation__title"> <?php echo esc_html( get_the_title($next->ID) ); ?> </span>
                        </div>
                    </a>
                </div>
            <?php }?>
        </div>
    </nav>

<?php } ?>