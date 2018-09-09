(function($) {

    // Atributos da pagina
    const rotas_container = $('.rotas-container');
    const rotas_tabs = rotas_container.find('.rotas-tabs');
    const rotas_list = rotas_container.find('.rotas-list');
    const rotas_list__matutino = rotas_list.find('.rotas-list__matutino');
    const rotas_list__vespertino = rotas_list.find('.rotas-list__vespertino');
    const rotas_list__noturno = rotas_list.find('.rotas-list__noturno');

    $(document).ready(function() {

        rotas_container.addClass('transitioning');

        // Horarios e Rotas
        setTimeout(function() {
            getApiRotas('https://api.aeesp-pocoes.com.br/api/v1/onibus',
                function(sucesso) {
                    setRotasList(sucesso);
                    rotas_container.removeClass('transitioning');
                },
                function(error) {
                    console.log('error', error);
                    rotas_container.removeClass('transitioning');
                }
            );
        }, 200);

    });

    // Functions
    // ---------------------------------------------

    // Get dados da API
    function getApiRotas(url, sucesso, erro) {
        $.ajax({
            url: url,
            method: 'GET',
            success: function(data) {
                sucesso(data);
            },
            error: function(data) {
                erro(data);
            }
        });
    }

    function setRotasList(rotas) {

        let rotaHtml = '';

        rotas.map(function(rota) {

            console.log(rota);

            rotaHtml = `
                <div data-id="${rota.id}" class="rota-single flex flex-center ${rota.turno}">
                    <i class="icon icon-bus"></i>
                    <span class="rota-single_title">${rota.title}</span>
                </div>
            `;

            switch (rota.turno) {
                case 'matutino':
                    rotas_list__matutino.append(rotaHtml);
                    break;
                case 'vespertino':
                    rotas_list__vespertino.append(rotaHtml);
                    break;
                case 'noturno':
                    rotas_list__noturno.append(rotaHtml);
                    break;
            }
        });

    }

})(jQuery);