<?php if(have_posts()) { ?>

    <?php while(have_posts()){ ?>

        <?php the_post(); ?>

        <?php get_template_part( 'template-parts/post/content'); ?>

    <?php }?>

    <?php the_posts_pagination(); ?>

    <!--Adding hooks -> allow other developpers to hook into our code -->
    <?php //do_action( 'firsttheme_after_pagination' ); ?> 

<?php } else { ?>

    <?php get_template_part( 'template-parts/post/content' , 'none'); ?>
  
<?php } ?>