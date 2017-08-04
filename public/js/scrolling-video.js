$(function () {
    var $this = $(this);
    parallaxVideo(0, $this);
});

$(window).scroll(function () {
    var $this = $(this);
    var wScroll = $this.scrollTop();

    parallaxVideo(wScroll, $this);
});

function parallaxVideo(wScroll, $this) {
    var blocks = $('.ytplayer');
    var blockMaxHeight = blocks.eq(0).height();
    var adj = ($(window).width() > 450) ? 0.45 : 0;
    var minFactor = ($(window).width() <= 450) ? 0.5 : 0.2;

    for (var i = 0; i < blocks.length; i++) {
        var offset = blocks.eq(i).offset().top;
        var centralPos = ($(window).height() - blockMaxHeight) / 2;
        var factor = Math.max(1 - Math.abs((offset - wScroll - centralPos) / centralPos), 0);
        factor = Math.max(factor, minFactor);

        $('.video__block').eq(i).css({
            'opacity': (factor + 0.5),
            'transform': 'scale(' + (factor + adj) + ')'
        })
    }
}