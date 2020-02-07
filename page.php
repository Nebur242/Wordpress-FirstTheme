<?php get_header(); ?>
   

  
    <div class="row">
        <div class="col-lg-8">
            <main role="main" class="border-left pl-2">
                <?php get_template_part( 'loop', 'page' ); ?>
            </main>
        </div>
        
    
        <div class="col-lg-4 bg-light shadow p-3 border rounded mt-2 h-100">
            <?php get_sidebar(); ?>
        </div>
     
    </div>
 
    
<?php get_footer(); ?>