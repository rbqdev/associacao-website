(function($) {

    $(document).ready(function() {

        $('#page').removeClass('loading');

        // Menu Mobile
        menuMobile('.site-header');

    });

    // Functions
    // ---------------------------------------------
    function menuMobile(container) {

        $('.main-navigation .menu-item-has-children').prepend('<div class="arrow"><span>></span></div>');

        $('.toggle-menu-mobile, .main-navigation-overlay').click(function(e) {
            e.preventDefault();
            $('body').toggleClass('menu-open');
        });

        setTimeout(function() {
            $('.main-navigation .menu-item .arrow').click(function() {
                $(this).toggleClass('active');
                $(this).siblings('.sub-menu').slideToggle('fast');
            });
        }, 1000);

        $('input[type=file]').change(function() {
            var id = $(this).attr("id");
            var newimage = new FileReader();
            newimage.onload = function(e) {
                $('.uploadpreview.' + id).css('background-image', 'url(' + e.target.result + ')');
            }
            newimage.readAsDataURL(this.files[0]);
        });
    }

})(jQuery);