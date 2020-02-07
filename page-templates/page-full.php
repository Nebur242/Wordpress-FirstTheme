<?php 
/*
Template Name: Full Width Page
*/
get_header(); ?>
   

  
    <div class="row">
        <div class="col">
            <main role="main" class="border-left pl-2">
                <?php get_template_part( 'loop', 'page' ); ?>
            </main>
        </div>
        
    </div>
 
    
<?php get_footer(); ?>