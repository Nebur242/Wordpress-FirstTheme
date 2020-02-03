<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset=" <?php bloginfo(); ?> ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<header role="banner" class='bg-dark mb-3'>

    <div class="container mb-3">
        <div class="row d-flex justify-content-between align-items-center py-4">
            <div class="c-header__logo">
                <?php if(has_custom_logo()){
                    the_custom_logo();
                } else{ ?>
                    <a href="<?php echo home_url('/'); ?>" class="h2 header__blogname"> <?php bloginfo('name') ?> </a>
                <?php } ?>
            </div>

            <?php get_search_form( true ) ?>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <nav class="header-nav" role='navigation' aria-label="<?php esc_html_e( 'Main Navigation', 'firsttheme' ); ?>">
            
                <?php wp_nav_menu( array('theme_location' => 'main-menu') ); ?>
            
            </nav>
        </div>
    </div>

</header>

<div class="container mb-4" id='content'>