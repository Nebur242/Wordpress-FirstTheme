<?php get_header(); ?>
   

    <div class="container">

        <div class="row">
            <header>
                <?php the_archive_title( '<h1>', '</h1>' ); ?>
                <?php the_archive_description( '<p>', '</p>' ) ?>
            </header>
        </div>

        <div class="row">
            <div class="col-lg-<?php echo is_active_sidebar( 'primary-sidebar' ) ? '8' : '12'; ?>">
                    <main role="main">
                        <?php get_template_part('loop' , 'archive'); ?>
                    </main>
                </div>
                
                <?php if(is_active_sidebar( 'primary-sidebar' )): ?>
                    <div class="col-lg-4 bg-light shadow p-3 border rounded mt-2">
                        <h1 class='text-warning'>This is the sidebar</h1>
                        <?php get_sidebar(); ?>
                    </div>
                <?php endif; ?>
        </div>
    </div>
    
<?php get_footer(); ?>