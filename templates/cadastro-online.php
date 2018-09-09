<?php /* Template Name: Cadastro Online */
get_header(); ?>

	<div id="primary" class="content-area cadastro-online-page">
		<main id="main" class="site-main">

			<section class="page-default page-section flex flex-column">
                <div class="section-title-content">
                    <h2 class="page-title"><?php the_title(); ?></h2>
                </div>
				<div class="page-content page-card contact-form">
                    <div id="cadastroForm-container" class="cadastroForm-container">
						<strong>Formulário de pré cadastro ou recadastramento.</strong>
						<p class="tagline-content">É necessário o comparecimento a sede da AEESP, portando o RG para confirmação dos dados fornecidos no formulário.</p>
                        <?php echo do_shortcode( '[ninja_form id=2]' ); ?>
                    </div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
