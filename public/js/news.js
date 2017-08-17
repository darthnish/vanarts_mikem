$(document).ready(function() {
    //  animate news thumbs with 0.5s delay
    setTimeout(function () {
        animateThumbs();
    }, 500);
});

function animateThumbs() {
    var $thumbs = $('.news__block');

    $thumbs.each(function (i) {
        //  toggle the class 'is-visible' for each thumb element
        setTimeout(function () {
            $thumbs.eq(i).addClass('is-visible');
        }, 500 * (i + 1));
    })
}
