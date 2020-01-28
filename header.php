<!DOCTYPE html>
<html <?php language_attributes(); ?> >
<head>
    <meta charset=" <?php bloginfo(); ?> ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<header role="banner" class='bg-dark'>

    <div class="container">
        <div class="row d-flex justify-content-between py-4">
            <div class="c-header__logo">
                <a href="<?php echo home_url('/'); ?>" class="h2 text-white"> <?php bloginfo('name') ?> </a>
            </div>

            <?php get_search_form( true ) ?>
        </div>
    </div>

</header>



<div class="container">