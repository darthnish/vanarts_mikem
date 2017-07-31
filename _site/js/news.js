$(document).ready(function() {
    setTimeout(function () {
        animateThumbs();
    }, 500);
});

function animateThumbs() {
    var $thumbs = $('.news__block');

    $thumbs.each(function (i) {
        setTimeout(function () {
            $thumbs.eq(i).addClass('is-visible');
        }, 500 * (i + 1));
    })
}
