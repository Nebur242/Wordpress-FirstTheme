<?php
    $footer_layout = sanitize_text_field( get_theme_mod('firsttheme_footer_layout' , '3,3,3,3') );
    $footer_layout = preg_replace('/\s+/' , '' , $footer_layout);
    $columns = explode(',' , $footer_layout);
    $footer_bg = firsttheme_sanitize_footer_bg( get_theme_mod( 'firsttheme_footer_bg', 'dark' ) );
    $widgets_active = false;

    if($footer_bg == 'dark'){
        $widget_theme_text = 'light ';
    }
    else{
        $widget_theme_text  = 'dark ';
    }
    
    foreach($columns as $i => $column) {
        if(is_active_sidebar( 'footer-sidebar'.($i+1 ))){
            $widgets_active = true;
        }
    } 
?>

<?php if($widgets_active) {?>
    <div class='container-fluid p-2 mt-5 bg-<?php echo $footer_bg; ?>'>

        <div class="container">
            <div class="row">
                <?php foreach($columns as $i => $column) { ?>

                    <div class="col-md-<?php echo $column; ?> p-2 text-<?php echo $widget_theme_text; ?> bg-<?php echo $footer_bg; ?> ">

                        <?php if(is_active_sidebar( 'footer-sidebar'.($i+1 ))){
                            dynamic_sidebar('footer-sidebar'.($i+1));
                        } ?>
                
                    </div>

                <?php } ?>
            </div>

        </div>

    </div>
<?php } ?>