<?php if(have_posts()) { ?>

<?php while(have_posts()){ ?>

    <?php the_post(); ?>

    <?php get_template_part( 'template-parts/page/content'); ?>


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