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
            <main role="main" class="border-left pl-2">
                <?php get_template_part( 'loop', 'single' ); ?>
            </main>
        </div>
        
        <?php if($layout === 'sidebar'){ ?>
            <div class="col-lg-4 bg-light shadow p-3 border rounded mt-2 h-100">
                <h1>This is the sidebar</h1>
                <?php get_sidebar(); ?>
            </div>
        <?php } ?>
    </div>
 
    
<?php get_footer(); ?>