<article <?php post_class( 'page mb-3  mt-3') ?> >

    <header class="page__header">
        <h1 class="page__title">
            <?php the_title(); ?>
        </h1>
    </header>

    <div class="page__content">
        <?php the_content(); ?>
    </div>

</article>