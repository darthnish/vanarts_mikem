$(window).scroll(function () {
    var $this = $(this);
    var wScroll = $this.scrollTop();

    parallaxNavbar(wScroll, $this);
    parallaxSectionHeader(wScroll, $this);

});

function parallaxNavbar (wScroll, $this) {
    if (wScroll > $this.height() * 0.65) {
        $('.logo').addClass('is-visible');
        setTimeout(function () {
            $('.sidebar').addClass('is-visible');
        }, 500);
    }
}


function parallaxSectionHeader (wScroll, $this) {
    var headers = ['home__tour', 'home__release', 'home__video'];

    for (var i = 0; i < headers.length; i++) {
        var offset = $('.' + headers[i]).offset().top;
        var opacity = Math.min((offset - wScroll - $this.height() / 4) / (- $this.height() / 4), 1);

        $('.' + headers[i] + '__heading, .' + headers[i] + ' .flex-row').css({
            'opacity': opacity
        });
    }
}

