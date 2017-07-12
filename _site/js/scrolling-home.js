$(window).scroll(function () {
    var $this = $(this);
    var wScroll = $this.scrollTop();

    parallaxNavbar(wScroll, $this);

});

function parallaxNavbar (wScroll, $this) {
    if (wScroll > $this.height() * 0.8) {
        $('.sidebar').addClass('is-visible');
    }
}