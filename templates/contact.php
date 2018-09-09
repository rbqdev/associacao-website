<?php /* Template Name: Contact */
get_header(); ?>

	<div id="primary" class="content-area contact-page">
		<main id="main" class="site-main">

			<section class="page-default page-section">
                <div class="section-title-content">
                    <h2 class="page-title"><?php the_title(); ?></h2>
                    <p class="section-description">Entre em contato com a associação, pelo chat ou envie-nos uma mensagem. Responderemos em breve.</p>
                </div>
				<div class="page-content page-card flex flex-wrap">
                    <div class="section-half left-side contact-info">
                        <div class="contato">
                            <strong>Contato:</strong>
                            <p><a href="tel:7734314888">(77) 3431-4888</a></p>
                            <p><a href="mailTo:contato@aeesp-pocoes.com.br">contato@aeesp-pocoes.com.br</a></p>
                        </div>
                        <div class="endereco">
                            <strong>Endereço:</strong>
                            <p>Pç Raimundo Pereira de Magalhães, Edifício Poções Center. 380, sala 08, Centro. Poções</p>
                        </div>
                        <div class="horario">
                            <strong>Horário de Atendimento:</strong>
                            <p>Segunda à Sexta</p>
                            <p>Manha: das 8hrs às 12hrs</p>
                            <p>Tarde: das 14hrs às 17hrs</p>
                        </div>
                    </div>
                    <div class="section-half right-side contact-form">
                        <div id="contactForm-container" class="contactForm-container">
                            <?php echo do_shortcode( '[ninja_form id=1]' ); ?>
                        </div>
                    </div>
				</div>
			</section>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();