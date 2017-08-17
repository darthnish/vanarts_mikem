$(function () {
    var $this = $(this);
    //  setup initial size of video box when page is loaded
    parallaxVideo(0, $this);
});

$(window).scroll(function () {
    var $this = $(this);
    var wScroll = $this.scrollTop();

    //  animate video boxes while scrolling
    parallaxVideo(wScroll, $this);
});

function parallaxVideo(wScroll, $this) {
    //  create variables for video boxes, their max height, adjustments for large screens and minimal height factor
    var blocks = $('.ytplayer');
    var blockMaxHeight = blocks.eq(0).height();
    var adj = ($(window).width() > 450) ? 0.5 : 0;
    var minFactor = ($(window).width() <= 450) ? 0.5 : 0.2;

    for (var i = 0; i < blocks.length; i++) {
        //  for each video element on the page

        //  calculate offset from the top
        var offset = blocks.eq(i).offset().top;
        //      central position where height will be maximum
        var centralPos = ($(window).height() - blockMaxHeight) / 2;
        //      scaling factor
        var factor = Math.max(1 - Math.abs((offset - wScroll - centralPos) / centralPos), 0);
        factor = Math.max(factor, minFactor);

        //  change opacity of element and its size
        $('.video__block').eq(i).css({
            'opacity': (factor + 0.5),
            'transform': 'scale(' + (factor + adj) + ')'
        })
    }
}