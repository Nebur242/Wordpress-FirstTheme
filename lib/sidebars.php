<?php 

    function firsttheme_sidebar_widgets(){
        register_sidebar( 
            array(
                'id' => 'primary-sidebar',
                'name' => esc_html__('Primary Sidebar' , 'firsttheme'),
                'description' => esc_html__( 'This sidebar appears in the blog posts page.', 'firsttheme' ),
                'before_widget' => '<section id="%1$s" class="mb-3 %2$s">',
                'after_widget' => '</section>',
                'before_title' => '<h5>',
                'after_title' => '</h5>'
            ) 
        );
    }
    $widget_theme_text ='';
    $footer_layout = sanitize_text_field( get_theme_mod('firsttheme_footer_layout' , '3,3,3,3') );
    $footer_layout = preg_replace('/\s+/' , '' , $footer_layout);
    $columns = explode(',' , $footer_layout);
    $footer_bg = firsttheme_sanitize_footer_bg( get_theme_mod( 'firsttheme_footer_bg', 'dark' ) );
    

    if($footer_bg == 'dark'){
        $widget_theme_text = 'light';
    }
    else{
        $widget_theme_text  = 'dark';
    }

    foreach($columns as $i => $column){
        register_sidebar( 
            array(
                'id' => 'footer-sidebar' . ($i+1),
                'name' => sprintf( esc_html__('Footer Widgets column %s ' , 'firsttheme'), $i+1 ) ,
                'description' => esc_html__( 'This sidebar appears in the blog posts page.', 'firsttheme' ),
                'before_widget' => '<section id="%1$s" class="p-2 %2$s">',
                'after_widget' => '</section>',
                'before_title' => '<h5>',
                'after_title' => '</h5>'
            ) 
        );

    }

    add_action('widgets_init','firsttheme_sidebar_widgets');

?>