<?php 


    require_once get_template_directory() . '/lib/class-tgm-plugin-activation.php';

    add_action('tgmpa_register', 'firsttheme_register_required_plugins');

    function firsttheme_register_required_plugins(){
        $plugins = array(
            array(
                'name' => 'firsttheme metaboxes',
                'slug' => 'firsttheme-metaboxes',
                'source' => get_template_directory_uri() . '/lib/plugins/FirstTheme-metaboxes.zip',
                'required' => true,
                'version' => '1.0.0',
                'force_activation' => false,
                'force_desactivation' => false,

            )

        );

        $config = array(

        );

        tgmpa($plugins , $config);
    }



?>