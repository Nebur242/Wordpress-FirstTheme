<?php 


    function firsttheme_customize_register($wp_customize){

        $wp_customize->get_setting( 'blogname' )->transport = 'postMessage';

        //Refreshing just the Blogname part sending an ajax refresh request
        $wp_customize->selective_refresh->add_partial('blogname' , array(
            'selector' => '.header__blogname',
            'container_inclusive' => false,
            'render_callback' => function(){
                bloginfo('name');
            }
        ));

        //Refreshing just the footer part sending an ajax refresh request
        $wp_customize->selective_refresh->add_partial('firsttheme_footer_partial' , array(
            'settings' => 'firsttheme_site_info',
            'selector' => '.site-info',
            'container_inclusive' => true,
            'render_callback' => function(){
                get_template_part( 'template-parts/footer/info' );
            }
        ));

        $wp_customize->add_section('firsttheme_footer_options' , array(


            'title' => esc_html__('Footer Options' , 'firsttheme'),
            'description' => esc_html__('You can change footer options from here.' , 'firsttheme'),
            'priority' => 30

        ));

        $wp_customize->add_setting('firsttheme_site_info' , array(

            'defaut' => '',
            'sanitize_callback' => 'firsttheme_sanitize_site_info',
            'transport' => 'postMessage'

        ));

        $wp_customize->add_control('firsttheme_site_info' , array(

            'type' => 'text',
            'label' => esc_html__('Site Info' , 'firsttheme'),
            'section' => 'firsttheme_footer_options' 

        ));

    }

    add_action('customize_register', 'firsttheme_customize_register');

    function firsttheme_sanitize_site_info($input){

        $allowed = array(
            'a' => array(
                'href' => array(),
                'title' => array()
            )
        );

        return wp_kses( $input, $allowed );

    }


?>