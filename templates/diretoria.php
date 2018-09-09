<?php /* Template Name: Diretoria */
get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main">

			<section class="page-default page-section flex flex-column">
                <div class="section-title-content">
                    <h2 class="page-title"><?php the_title(); ?></h2>
                </div>
				<div class="page-content page-card">
                    <?php ?> <!-- Loop de Diretores -->
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
