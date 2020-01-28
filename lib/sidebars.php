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

    $footer_layout = '3,3,3,3';
    $columns = explode(',' , $footer_layout);
    $footer_bg = 'dark';
    $widget_theme ='';

    if($footer_bg == 'light'){
        $widget_theme = 'bg-dark';
    }
    else{
        $widget_theme = 'bg-light';
    }

    foreach($columns as $i => $column){
        register_sidebar( 
            array(
                'id' => 'footer-sidebar' . ($i+1),
                'name' => sprintf( esc_html__('Footer Widgets column %s ' , 'firsttheme'), $i+1 ) ,
                'description' => esc_html__( 'This sidebar appears in the blog posts page.', 'firsttheme' ),
                'before_widget' => '<section id="%1$s" class="p-2 %2$s ' .  $widget_theme.' ">',
                'after_widget' => '</section>',
                'before_title' => '<h5>',
                'after_title' => '</h5>'
            ) 
        );

    }

    add_action('widgets_init','firsttheme_sidebar_widgets');

?>