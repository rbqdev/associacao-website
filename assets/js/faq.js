(function($) {

    $(document).ready(function() {

        // FAQs
        faqs('.faq-container');

    });

    // Functions
    // ---------------------------------------------

    function faqs(container) {

        $(container + ' .faq-single').click(function(e) {
            e.preventDefault();

            $(container + ' .faq-single').not(this).removeClass('visible');
            $(container + ' .faq-single .answer').not(this).slideUp();

            if (!$(this).hasClass('visible')) {
                $(this).addClass('visible');
                $(this).find('.answer').slideToggle('fast');
            } else {
                $(this).removeClass('visible');
            }

        });
    }

})(jQuery);