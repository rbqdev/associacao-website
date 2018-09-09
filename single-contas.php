<?php get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main page-single">

            <section class="page-default page-section flex flex-column">
                <div class="section-title-content">
                    <h2 class="page-title">Contas: <?php the_title(); ?></h2>
                    <span class="page-meta">Publicado: <?php echo get_the_date( 'd/m/Y', $post->ID ); ?></span>
                </div>
                <div class="page-content page-card">
                <?php
                    if ( have_posts() ):
                        while ( have_posts() ): the_post();
                            the_content();
                        endwhile;
                    endif;
                ?>
                </div>
            </section>

        </main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();