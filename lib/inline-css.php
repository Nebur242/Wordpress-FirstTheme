<?php 


    $inline_styles_selectors = array(
        'a' => array(
            'color' => 'firsttheme_accent_color',
        ),
        'h1' => array(
            'color' => 'firsttheme_accent_color',
        )
        );

        $inline_styles = "";

        foreach ($inline_styles_selectors as $selector => $props) {
           $inline_styles .= $selector ." { ";
                foreach ($props as $prop => $value) {
                    $inline_styles .= $prop ." : " .sanitize_hex_color(get_theme_mod( $value , "#FF0" )) . ";";
                }
            $inline_styles .= " } ";

        }

   /*  $accent_color = sanitize_hex_color( get_theme_mod( 'firsttheme_accent_color', "#F00" ) );

    $inline_styles = "
    
        a{
            color : ". $accent_color .";
        }

        h1{
            color : ". $accent_color .";
        }


    "; */


?>