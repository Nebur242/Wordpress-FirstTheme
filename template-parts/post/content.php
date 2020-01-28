<article <?php post_class( 'mb-3 border-left pl-2 mt-3', post_id ) ?> >
    
    <h2 class='display-4'>
        <a href=" <?php the_permalink(); ?> " title='<?php the_title_attribute(); ?>'> <?php the_title() ?> </a>
    </h2>

    <div> <?php firsttheme_post_meta(); ?> </div>

    <div> 
        <?php the_excerpt(); ?> 
    </div>

    <?php firsttheme_readMore_link(); ?>
</article>