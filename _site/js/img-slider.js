/*
 * IMAGE SLIDER
 * */

var imgs = document.getElementsByClassName('gallery__slider__img');
var caption = document.getElementsByClassName('gallery__caption')[0];
var index = 0;

// set up initial opacity for the images
resetStyles();

// set up initial active thumb
showActiveImage(index);

function imgSlider(inc) {
    // handle event when control arrows are clicked
    // find out the index of the image
    if (inc === 1) {
        if (index === imgs.length - 1) {
            index = 0;
        } else {
            index++;
        }
    } else if (inc === -1) {
        if (index === 0) {
            index = imgs.length - 1;
        } else {
            index--;
        }
    }

    resetStyles();
    showActiveImage(index);

}


// HELPERS

function resetStyles() {
    // change opacity for all images to 0 and change style of thumbs
    for (var i = 0; i < imgs.length; i++) {
        imgs[i].style.opacity = 0;
    }
}

function showActiveImage(index) {
    // change opacity for active image to 1 and change style of thumbs
    imgs[index].style.opacity = 1;
    caption.innerText = imgs[index].alt;
}
