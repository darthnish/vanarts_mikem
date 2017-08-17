// Load the IFrame Player API code asynchronously.
var tag = document.createElement('script');
tag.src = "https://www.youtube.com/player_api";
var firstScriptTag = document.getElementsByTagName('script')[0];
firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

// Replace the 'ytplayer' element with an <iframe> and
// YouTube player after the API code downloads.
var player;
function onYouTubePlayerAPIReady() {
    player = new YT.Player('ytplayer', {
        playerVars: {
            'autoplay': 0,
            'start': 120,
            'frameborder': 0,
            'controls': 0,
            'modestbranding': 1,
            'showinfo': 0,
            'rel': 0,
            'disablekb': 1,
            'iv_load_policy': 3
        },
        height: '100%',
        videoId: 'tg00YEETFzg',
        events: {
            'onReady': onPlayerReady,
            'onStateChange': onPlayerStateChange
        }
    });
}

function onPlayerReady(event) {
    event.target.playVideo();

    $(function() {

        //  variables for screen ratio and maximum dimension size
        var ratio = $(window).height()/$(window).width();
        var m = Math.max($(window).height(), $(window).width());

        //  adjust video size to the size of the screen
        $('.video__wrapper').css({
            'padding-bottom': (ratio * 100 * 1.3) + '%',
            'width': ($(window).height() / ($(window).width() / 16 * 9) * $(window).width() * 1.3) + 'px'
        });

        $(window).scroll(function () {
            var wScroll = $(this).scrollTop();

            //  stop video when user scrolls more than 80% of height of the first section
            if (wScroll > $(this).height() * 0.8) {
                stopVideo();
            }
        });
    });
}

// 5. The API calls this function when the player's state changes.
//    The function indicates that when playing a video (state=1),
var done = false;
function onPlayerStateChange(event) {
    if (event.data == YT.PlayerState.PLAYING && !done) {
        done = true;
    }
}
function stopVideo() {
    player.stopVideo();
}