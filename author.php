<?php get_header(); ?>

<?php 
    $author = get_query_var( 'author' );
    $author_posts = count_user_posts($author);
    $author_display = get_the_author_meta( 'display_name' , $author );
    $auther_description = get_the_author_meta( 'user_description' , $author );
    $author_website = get_the_author_meta( 'user_url' , $author );
?>
   
    <div class="container">

        
        <div class="row">

            <div class="col-lg-4 bg-light h-100 py-3 mt-3 rounded border">
               

                <header>
                    <h4>Author infos</h4>
                    <?php echo get_avatar( $author, 100 ) ?>
                    <h1 class='mt-2'> <?php echo esc_html( $author_display ); ?> </h1>
                    <?php 
                        /* translators : %s is the number of posts */
                        printf(esc_html( _n('%s post' , '%s posts' , $author_posts , 'firsttheme') ) , number_format_i18n($author_posts));
                    ?>

                    <div class="post-autor__title my-2">
                        <?php if($author_website){ ?>
                            <a target='_blank' href=" <?php echo esc_url( $author_website ); ?> ">
                                <?php echo esc_html( $author_website ); ?>
                            </a>

                        <?php } ?>
                       
                    </div>

                    <div class="post-author__description">
                        <?php echo '<em>'. esc_html( $auther_description ) . '</em>' ; ?>
                    </div>
                </header>
            </div>
            <div class="col-lg-8">
                    <main role="main">
                        <?php get_template_part('loop' , 'author'); ?>
                    </main>
                </div>
                
        </div>
    </div>
    
<?php get_footer(); ?>