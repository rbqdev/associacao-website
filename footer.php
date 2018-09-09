	</div><!-- #content -->

	<footer id="colophon" class="site-footer page-section">

        <div class="section-wrapper">
            <div class="footer-divs flex flex-wrap">
                <div class="footer-div-single flex flex-column info-text">
                    <h3 class="title">Contato/Endereço</h3>
                    <p>
                        <strong>Endereço: </strong> <span>Pç Raimundo Pereira de Magalhães, Edifício Poções Center. 380, sala 08, Centro.
Poções</span>
                    </p>
                    <p>
                        <strong>Telefone: </strong> <a href="tel:7734314888">(77) 3431-4888</a>
                    </p>
                    <p>
                        <strong>Email: </strong> <a href="mailTo:contato@aeesp-pocoes.com.br">contato@aeesp-pocoes.com.br</a>
                    </p>
                    <p>
                        <strong>Horário de Atendimento: </strong> <span>Segunda a Sexta <br> Manha: das 8hrs às 12hrs. <br> Tarde: das 14hrs às 17hrs.</span>
                    </p>
                </div>
                <article class="footer-div-single flex flex-column menu-footer">
                    <h3 class="title">Informativo</h3>
                    <?php
                        wp_nav_menu( array(
                            'theme_location' => 'footer'
                        ));
                    ?>
                </article>
                <article class="footer-div-single flex flex-column recents-posts">
                    <h3 class="title">Ultimas Noticías</h3>
                    <ul>
                        <?php require('inc/recents-posts.php'); 
                            foreach( $recent_posts as $post ) { 
                        ?>
                        <li>
                            <a href="<?php echo $post['guid']; ?>">
                                <span class="date"><?php echo get_the_date( 'd/m/Y', $post['ID'] ); ?></span>
                                <?php echo $post['post_title']; ?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </article>
                <article class="footer-div-single flex flex-column facebook">
                    <h3 class="title">Siga-nos no facebook</h3>
                    <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Faeespocoes%2F&tabs&width=340&height=214&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=1737332066515978" width="340" height="214" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                </article>
            </div>

            <div class="site-info flex">
                <p>
                    Este site tem o objetivo de agregar as informações relacionadas à AEESP, promovendo uma melhor comunicação e transparência das informaçoes entre os associados e diretoria.
                </p>
                <p>
                    Associação de Estudantes do Ensino Superior de Poções - CNPJ: 03.660.035/0001-45
                </p>
                <p>
                    Desenvolvimento por: <a href="mailTo:rbqueiroz05@gmail.com">Robson Braga</a>
                </p>
            </div><!-- .site-info -->
        </div>
		
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<!-- Crisp -->
<script type="text/javascript">
    setTimeout(function() {
        jQuery(document).ready(function(){
            window.$crisp=[];window.CRISP_WEBSITE_ID="9f133e4e-b731-4191-afc9-12f95ed43a65";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();
        });
    }, 500);
</script>

</body>
</html>
