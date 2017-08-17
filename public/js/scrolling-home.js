$(document).ready(function () {
    //  remove classes with jquery (needed to be done only on home page)
    $('.sidebar').removeClass('is-visible');
    $('.logo').removeClass('is-visible');
    $('.logo').addClass('logo__home');
});

$(window).scroll(function () {
    //  scrolling function
    var $this = $(this);
    var wScroll = $this.scrollTop();

    parallaxNavbar(wScroll, $this);
    parallaxSectionHeader(wScroll, $this);

});

function parallaxNavbar (wScroll, $this) {
    //  show navbar after user scrolls more than a half of the first section in the page
    if (wScroll > $this.height() * 0.5) {
        $('.logo').addClass('is-visible');
        setTimeout(function () {
            $('.sidebar').addClass('is-visible');
        }, 200);
    }
}


function parallaxSectionHeader (wScroll, $this) {
    //  change the opacity of sections headlines according to how much user scrolls down
    var headers = ['home__tour', 'home__release', 'home__video'];

    for (var i = 0; i < headers.length; i++) {
        //  calculate offset from the top of the page for each section
        var offset = $('.' + headers[i]).offset().top;

        //  calculate the opacity value
        var opacity = Math.min((offset - wScroll - $this.height() / 2) / (- $this.height() / 2), 1);

        //  change the opacity value
        $('.' + headers[i] + '__heading, .' + headers[i] + ' .flex-row').css({
            'opacity': opacity
        });
    }
}

