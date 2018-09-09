<?php /* Template Name: Faq */
get_header(); ?>

	<div id="primary" class="content-area contact">
		<main id="main" class="site-main">

			<section class="page-default page-section">

                <div class="section-title-content">
                    <h2 class="page-title"><?php the_title(); ?></h2>
                    <p class="section-description">Veja quais são as dúvidas mais frequentes pelos associados</p>
                </div>

				<div class="page-content page-card">
                    <div class="faq-container flex flex-wrap">
                        <?php $loop = new WP_Query( array( 'post_type' => 'faq', 'posts_per_page' => -1) );                  
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>
                            <div class="faq-single">
                                <h3 class="question"><?php the_title(); ?></h3>
                                <span class="arrow">
                                        <?php echo file_get_contents( URL_TEMPLATE . '/assets/img/arrow-up.svg'); ?>
                                </span>
                                <div class="answer" style="display:none;"><?php the_content(); ?></div>
                            </div>
                        <?php endwhile; ?>
                    </div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();