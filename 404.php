<?php get_header(); ?>
   
    <div class="container">

        <div class="row">
            <div class="col">

                    <header>
                        <h1 class='text-center'>
                            <?php esc_html_e( 'Nothing found here, maybe you can try to search ?', 'firsttheme' ); ?>
                        </h1>
                    </header>
                    <main role="main" class='py-4'>
                       <?php get_search_form(); ?>
                    </main>
                </div>
                
                
        </div>
    </div>
    
<?php get_footer(); ?>