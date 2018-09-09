<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main blog">
            <section class="page-default page-section flex flex-column">
                <div class="section-title-content">
                    <h2 class="page-title">Blog</h2>
                </div>
                <div class="page-content flex flex-wrap">
                    <?php
                    if ( have_posts() ) :
                        while ( have_posts() ) : the_post();
                        $id_post = get_the_ID();
                        $url_image = get_the_post_thumbnail_url($id_post,'thumbnail');
                        $link_post = get_the_permalink($id_post);
                        ?>
                            <article class="post post-single post-card flex">
                                <?php if($url_image): ?>
                                    <a class="post-card-image-link" href="<?php echo $link_post; ?>">
                                        <figure class="post-card-image" <?php if($url_image != ''){ ?> style="background-image: url('<?php echo $url_image; ?>');" <?php } ?>></figure>
                                    </a>
                                <?php endif; ?>
                                <div class="post-card-content">
                                    <span class="date"><?php echo get_the_date( 'd/m/Y', $id_post ); ?></span>
                                    <a class="post-card-content-link" href="<?php echo $link_post; ?>">
                                        <header class="post-card-header">
                                            <!-- <span class="post-card-tags">angular</span> -->
                                            <h3 class="post-card-title"><?php the_title(); ?></h3>
                                        </header>
                                        <div class="post-card-excerpt">
                                            <p><?php echo get_excerpt(200); ?></p>
                                        </div>
                                    </a>
                                    <footer class="post-card-meta">
                                        <a class="post-card-read-more" href="<?php echo $link_post; ?>">Continue lendo</a>
                                    </footer>
                                </div>
                            </article>

                        <?php
                        endwhile;
                    else :
                        //
                    endif;
                    ?>
                </div>
            </section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
