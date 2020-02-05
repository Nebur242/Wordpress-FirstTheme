<?php get_header(); ?>
   
<?php  

    $layout = firsttheme_meta(get_the_ID(), '_firsttheme_post_layout', 'full' );
    $sidebar = is_active_sidebar( 'primary-sidebar' );

    if($layout === 'sidebar' && !$sidebar){
        $layout = 'full';
    }

?>

  
    <div class="row">
        <div class="col-lg-<?php echo $layout === 'sidebar' ? '8' : '12' ; ?>">
            <main role="main">
            <?php if(have_posts()) { ?>

                <?php while(have_posts()){ ?>

                    <?php the_post(); ?>

                    <?php get_template_part( 'template-parts/post/content'); ?>

                <?php }?>

                <!--Adding hooks -> allow other developpers to hook into our code -->
                <?php //do_action( 'firsttheme_after_pagination' ); ?> 

                <?php } else { ?>

                <?php get_template_part( 'template-parts/post/content' , 'none'); ?>

                <?php } ?>
            </main>
        </div>
        
        <?php if($layout === 'sidebar'){ ?>
            <div class="col-lg-4 bg-light shadow p-3 border rounded mt-2">
                <h1>This is the sidebar</h1>
                <?php get_sidebar(); ?>
            </div>
        <?php } ?>
    </div>
 
    
<?php get_footer(); ?>