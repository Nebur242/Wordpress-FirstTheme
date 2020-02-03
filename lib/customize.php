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


        /*--------------------------------- General settings ---------------------------------*/
        $wp_customize->add_section('firsttheme_general_options' , array(
            'title' => esc_html__( 'General Options', 'firsttheme' ),
            'description' => esc_html__( 'You can change global options from here.', 'firsttheme' )
        ));

        $wp_customize->add_setting('firsttheme_accent_color' , array(
            'default' => '#F00',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_hex_color'
        ));

        $wp_customize->add_control( 
            new WP_Customize_Color_Control( 
            $wp_customize, 
            'firsttheme_accent_color', 
            array(
                'label'      => __( 'Accent Color', 'firsttheme' ),
                'section'    => 'firsttheme_general_options'
            ) ) 
        );



         /*--------------------------------- Footer Settings ---------------------------------*/

        //Refreshing just the footer part sending an ajax refresh request
        $wp_customize->selective_refresh->add_partial('firsttheme_footer_partial' , array(
            'settings' => array('firsttheme_footer_bg' , 'firsttheme_footer_layout'),
            'selector' => '#footer',
            'container_inclusive' => false,
            'render_callback' => function(){
                get_template_part( 'template-parts/footer/widgets' );
                get_template_part( 'template-parts/footer/info' );
            }
        ));

        //adding the footer custom field in wordpress customize
        $wp_customize->add_section('firsttheme_footer_options' , array(

            'title' => esc_html__('Footer Options' , 'firsttheme'),
            'description' => esc_html__('You can change footer options from here.' , 'firsttheme'),
            'priority' => 30

        ));

        // adding the custom function to custom fields calling the function firsttheme_sanitize_site_info
        $wp_customize->add_setting('firsttheme_site_info' , array(

            'defaut' => '',
            'sanitize_callback' => 'firsttheme_sanitize_site_info',
            'transport' => 'postMessage'

        ));

        // control what can be added in footer while customizing
        $wp_customize->add_control('firsttheme_site_info' , array(

            'type' => 'text',
            'label' => esc_html__('Site Info' , 'firsttheme'),
            'section' => 'firsttheme_footer_options' 

        ));

        //adding settings for customizing footer background 
        $wp_customize->add_setting('firsttheme_footer_bg' , array(
            'default' => 'dark',
            'transport' => 'postMessage',
            'sanitize_callback' => 'firsttheme_sanitize_footer_bg'
        ));

        $wp_customize->add_control('firsttheme_footer_bg' , array(
            'type' => 'select',
            'label' => esc_html__( 'Footer Background', 'firsttheme' ),
            'choices' => array(
                'light' => esc_html__( 'light', 'firsttheme' ),
                'dark' => esc_html__( 'dark', 'firsttheme' )
            ),
            'section' => 'firsttheme_footer_options'
        ));

        //Adding Footer Layout
        $wp_customize->add_setting('firsttheme_footer_layout' , array(
            'default' => '3,3,3',
            'transport' => 'postMessage',
            'sanitize_callback' => 'sanitize_text_field',
            'validate_callback' => 'firsttheme_validate_footer_layout'
        ));

        $wp_customize->add_control('firsttheme_footer_layout' , array(

            'type' => 'text',
            'label' => esc_html__('Footer Layout' , 'firsttheme'),
            'section' => 'firsttheme_footer_options' 

        ));

    }

    add_action('customize_register', 'firsttheme_customize_register');


    function firsttheme_validate_footer_layout($validity , $value){
        if(!preg_match('/^([1-9]|1[012])(,([1-9]|1[012]))*$/' , $value)){
            $validity->add('invalid_footer_layout' , esc_html__( 'Footer layout is invalid', 'firsttheme' ));
        }

        return $validity;
    }

    function firsttheme_sanitize_footer_bg( $input ){
        $valid = array('light' , 'dark');
        if(in_array($input , $valid , true)){
            return $input;
        }

        return 'dark';
    }

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