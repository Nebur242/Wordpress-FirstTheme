<?php 
    $widget_theme_text ='';
    $footer_bg = firsttheme_sanitize_footer_bg( get_theme_mod( 'firsttheme_footer_bg', 'dark' ) );
    $site_info = get_theme_mod( 'firsttheme_site_info', '' );

    

    if($footer_bg == 'dark'){
        $widget_theme_text = 'light ';
    }
    else{
        $widget_theme_text  = 'dark ';
    }

?>


<?php if($site_info){ ?>
    <div class="container-fluid bg-<?php echo $footer_bg; ?> pb-2 site-info">
        <div class="row d-flex justify-content-center">
            <div class="text-<?php echo $widget_theme_text; ?> site_info__text">
                <?php 
                     $allowed = array(
                        'a' => array(
                            'href' => array(),
                            'title' => array()
                        )
                    );
                    echo wp_kses( $site_info, $allowed ); 
                ?>
            </div>
        </div>
    </div>

<?php } ?>