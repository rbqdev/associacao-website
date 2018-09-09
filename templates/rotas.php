<?php // Template Name: Horários e Rotas
get_header(); ?>

	<div id="primary" class="content-area contact">
		<main id="main" class="site-main">

            <section class="page-default page-section">
                <div class="section-title-content">
                    <h2 class="page-title"><?php the_title(); ?></h2>
                </div>
 
                <div class="page-content page-card">
                    <p class="tagline-content">Clique no onibus para ver a rota.</p>
                    <div class="rotas-container flex flex-wrap">
                        <div class="rotas-content flex flex-wrap">
                            <ul class="rotas-tabs flex">
                                <li class="tab flex flex-center" data-id="1" data-tab-id="matutino">
                                    <strong>Matutino</strong>
                                </li>
                                <li class="tab flex flex-center" data-id="2" data-tab-id="vespertino">
                                    <strong>Vespertino</strong>
                                </li>
                                <li class="tab flex flex-center" data-id="3" data-tab-id="noturno">
                                    <strong>Noturno</strong>
                                </li>
                            </ul>
                            <div class="rotas-list">
                                <div class="rotas-list__matutino flex" data-tab-id="matutino">

                                </div>
                                <div class="rotas-list__vespertino flex" data-tab-id="vespertino">

                                </div>
                                <div class="rotas-list__noturno flex" data-tab-id="noturno">

                                </div>
                            </div>
                        </div>

                        <div class="loader">
                            <p>Buscando lista de onibus</p>
                            <span class="circle"></span>
                        </div>

                    </div>

                </div>
            </section>

		</main><!-- #main -->
    </div><!-- #primary -->

<?php
get_footer();