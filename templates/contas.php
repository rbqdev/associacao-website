<?php // Template Name: Prestação Contas
get_header(); ?>

	<div id="primary" class="content-area contact">
		<main id="main" class="site-main">

            <section class="page-default page-section">
                <div class="section-title-content">
                    <h2 class="page-title"><?php the_title(); ?></h2>
                    <p class="section-description">Veja a prestação de contas da AEESP de acordo os meses</p>
                </div>

                <div class="page-content page-card">
                    <p>Clique para ver as contas do mês referente.</p>
                    <div class="contas-container flex flex-wrap">
                        <ul>
                        <?php $loop = new WP_Query( array( 'post_type' => 'contas', 'posts_per_page' => -1) );
                            while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                <li class="conta-single"><a href="<?php the_permalink(); ?>"><h4 class="conta-single_mes"><?php the_title(); ?></h4></a></li>
                        <?php endwhile; ?>
                        </ul>
                    </div>
                </div>
            </section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();