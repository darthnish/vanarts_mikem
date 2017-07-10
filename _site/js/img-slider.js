/*
* IMAGE SLIDER
* */

var imgs = document.getElementsByClassName('img-slider__img');
var index = 0;

// set up initial opacity for the images
for (var i = 1; i < imgs.length; i++) {
    imgs[i].style.opacity = 0;
}

function imgSlider(inc) {

    // find out the index of the image
    if (inc = 1) {
        if (index === imgs.length - 1) {
            index = 0;
        } else {
            index++;
        }
    } else if (inc = -1) {
        if (index === 0) {
            index = imgs.length - 1;
        } else {
            index--;
        }
    }

    // change opacity for all images to 0
    for (var i = 0; i < imgs.length; i++) {
        imgs[i].style.opacity = 0;
    }

    // change opacity for active image to 1
    imgs[index].style.opacity = 1;
}
