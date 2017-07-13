$(window).scroll(function () {
    var $this = $(this);
    var wScroll = $this.scrollTop();

    parallaxNavbar(wScroll, $this);
    parallaxTour(wScroll, $this);

});

function parallaxNavbar (wScroll, $this) {
    if (wScroll > $this.height() * 0.65) {
        $('.logo').addClass('is-visible');
        setTimeout(function () {
            $('.sidebar').addClass('is-visible');
        }, 500);
    }
}


function parallaxTour (wScroll, $this) {
    var offset = $('.home__tour').offset().top;
    var opacity = Math.min((offset - wScroll - $this.height() / 4) / (- $this.height() / 4), 1);

    $('.home__tour__heading').css({
        'opacity': opacity
    });
}

