<?php 

    $footer_bg = 'dark';
    $site_info = get_theme_mod( 'firsttheme_site_info', '' );

?>


<?php if($site_info){ ?>
    <div class="container-fluid bg-<?php echo $footer_bg; ?> pb-2">
        <div class="row d-flex justify-content-center">
            <div class="text-light site_info__text">
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