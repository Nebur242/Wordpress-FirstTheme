<?php if(have_posts()) { ?>

<?php while(have_posts()){ ?>

    <?php the_post(); ?>

    <?php get_template_part( 'template-parts/post/content'); ?>


    <?php

        if(get_theme_mod( 'firsttheme_display_author_info', true )){
            get_template_part( 'template-parts/single/author'); 
        }
        
    ?>

    <?php

        get_template_part( 'template-parts/single/navigation'); 

    ?>

    <?php 
        if(comments_open()){
            comments_template(); 
        }
    ?>

<?php }?>

<!--Adding hooks -> allow other developpers to hook into our code -->
<?php //do_action( 'firsttheme_after_pagination' ); ?> 

<?php } else { ?>

<?php get_template_part( 'template-parts/post/content' , 'none'); ?>

<?php } ?>