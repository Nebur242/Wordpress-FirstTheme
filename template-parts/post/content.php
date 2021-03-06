<article <?php post_class( 'post mb-3  mt-3') ?> >

   
    <?php if(get_the_post_thumbnail() != ''){ ?>
        
        <div>
        
            <?php the_post_thumbnail( 'large' ); ?>
        
        </div>

    <?php } ?>

    <header>
        <?php if(is_single()){ ?>
            <h1 class='display-3'>
                <a href=" <?php the_permalink(); ?> " title='<?php the_title_attribute(); ?>'> <?php the_title() ?> </a>
            </h1>
        <?php } else { ?>

            <h2 class='display-4'>
                <a href=" <?php the_permalink(); ?> " title='<?php the_title_attribute(); ?>'> <?php the_title() ?> </a>
            </h2>

        <?php } ?>
    </header>

    <div> <?php firsttheme_post_meta(); ?> </div>

    <div> 

        <?php if(is_single()){ ?>

            <?php 
                the_content(); 
                wp_link_pages();
            ?> 
            
                
        <?php } else { ?>

            <?php the_excerpt(); ?> 

        <?php } ?>
      
    </div>

    <?php if(is_single()){ ?>

        <footer>
        
            <?php if(has_category()){
                echo '<div>';
                    /*translators: used between categories */
                    $cats_list = get_the_category_list( esc_html__( ', ', 'firsttheme' ));
                     /*translators: %s is between the categories list*/
                    printf(esc_html__( 'Posted in : %s', 'firsttheme' ) , $cats_list);
                echo '</div>';
            } ?> 

            <?php if(has_tag()){
                echo '<div class="my-1">';
                    /*translators: used between categories */
                    $tags_list = get_the_tag_list( '<ul class = "p-0"><li class="badge badge-light mr-2">#' , '</li><li class="badge badge-light">#' , '</li></ul>' );
                    /*translators: %s is between the categories list*/
                   echo $tags_list;
                echo '</div>';
            } ?> 
        
        </footer>
       
        
    <?php } ?>

    

    <?php if(!is_single()){ firsttheme_readMore_link();} ?>

    <?php //echo firsttheme_delete_post(); ?>

  
       
   
   

</article>