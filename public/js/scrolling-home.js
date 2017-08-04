$(document).ready(function () {
    $('.sidebar').removeClass('is-visible');
    $('.logo').removeClass('is-visible');
    $('.logo').addClass('logo__home');
});

$(window).scroll(function () {
    var $this = $(this);
    var wScroll = $this.scrollTop();

    parallaxNavbar(wScroll, $this);
    parallaxSectionHeader(wScroll, $this);

});

function parallaxNavbar (wScroll, $this) {
    if (wScroll > $this.height() * 0.5) {
        $('.logo').addClass('is-visible');
        setTimeout(function () {
            $('.sidebar').addClass('is-visible');
        }, 200);
    }
}


function parallaxSectionHeader (wScroll, $this) {
    var headers = ['home__tour', 'home__release', 'home__video'];

    for (var i = 0; i < headers.length; i++) {
        var offset = $('.' + headers[i]).offset().top;
        var opacity = Math.min((offset - wScroll - $this.height() / 2) / (- $this.height() / 2), 1);

        $('.' + headers[i] + '__heading, .' + headers[i] + ' .flex-row').css({
            'opacity': opacity
        });
    }
}

