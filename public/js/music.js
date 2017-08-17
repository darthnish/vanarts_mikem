//  initialize soundcloud player
SC.initialize({
    client_id: 'MIwxvGw9tfQ06eTGxtwaDRMfaY2U0g7N'
});

$(document).ready(function() {

    //  start thumb animation in 1s after page loaded
    setTimeout(function () {
        animateThumbs();
    }, 1000);

    //  handle the click event on player control elements
    $('.music__control').click(function() {
        //  variables for widget, progress bar
        var $this = $(this);
        var widget = getWidgetElement($this);
        var progressBar = getProgressElement($this);
        var progressMax = progressBar.parent().width() - 10;

        //  check if widget is ready to play
        widget.bind(SC.Widget.Events.READY, function() {

            //  'play in progress' event
            widget.bind(SC.Widget.Events.PLAY_PROGRESS, function() {

                //  track duration getter
                widget.getDuration(function(duration) {
                    //  put track duration value in html element
                    $this.siblings('.music__time_2').text(formatTime(duration));

                    //  current position property getter
                    widget.getPosition(function(postion) {
                        //  put current position value in html element
                        $this.siblings('.music__time_1').text(formatTime(postion));

                        //  change the progress bar width
                        progressBar.width(postion / duration * progressMax);
                    });
                });
            });

            //  handle event 'player stop playing'
            widget.bind(SC.Widget.Events.FINISH, function() {
                //  ...toggle classes of current player
                $this.toggleClass('fa-play');
                $this.toggleClass('fa-pause');
            });
        });

        widget.toggle();

        if($this.hasClass('fa-play')) {
            //  make sure that all other players on the page don't have pause class and track info is not displaying for them
            $('.music__control').removeClass('fa-pause');
            $('.music__control').addClass('fa-play');
            $('.music__control').not($this).siblings('.music__time_1, .music__time_2').removeClass('show');

            $this.toggleClass('fa-play');
            $this.toggleClass('fa-pause');
            $this.siblings('.music__time_1, .music__time_2').toggleClass('show');
        } else {
            //  toggle class for current player and display its track info
            $this.toggleClass('fa-play');
            $this.toggleClass('fa-pause');
            $this.siblings('.music__time_1, .music__time_2').toggleClass('show');
        }
    });

    //  handle click event on progress bar (seeking)
    $('.music__progerss-bar-pseudo').click(function (event) {
        // create variable for seeking position, widget and progress bar
        var $this = $(this);
        var seekPosR = event.offsetX / $this.width();
        var widget = getWidgetElement($this);
        var progressBar = getProgressElement($this);
        var progressMax = progressBar.parent().width() - 10;

        widget.bind(SC.Widget.Events.READY, function () {
            //  track duration property getter
            widget.getDuration(function (duration) {
                //  skip track to the position
                widget.seekTo(seekPosR * duration);
                //  change the appearance of progress bar
                progressBar.width(seekPosR * progressMax);
            });
        });
    });

    //  handle click event on volume bar (sound level changing)
    $('.music__volume-pseudo').click(function (event) {
        // create variable for seeking volume level, widget and volume bar
        var $this = $(this);
        var widget = getWidgetElement($this);
        var seekVolR = event.offsetY / $this.height();
        var volumeBar = getVolumeElement($this);
        var volumeMax = volumeBar.parent().height();

        //  change height of volume bar
        volumeBar.height(seekVolR * volumeMax);

        widget.bind(SC.Widget.Events.READY, function () {
            //  set volume of the player to desirable level
            widget.setVolume(seekVolR * 100);
        });

    });
});

//  return current player dom-element
function getWidgetElement ($this) {
    return SC.Widget($this.parent().children().eq(2)[0])
}

//  return current progress bar dom-element
function getProgressElement ($this) {
    return $($this.parent().children().eq(3));
}

//  return current volume bar dom-element
function getVolumeElement ($this) {
    return $($this.parent().children().eq(5));
}

//  thumbs animation functions
function animateThumbs() {
    //  variables for elements
    var $thumbs = $('.music__block');
    var $btns = $('.music__btn');

    $thumbs.each(function (i) {
        //  for each thumb set delay after that it will be animated by adding css-class
        setTimeout(function () {
            $thumbs.eq(i).addClass('is-visible');
            $btns.eq(i).addClass('is-visible');
        }, 500 * (i + 1));
    })
}

//  time format function
function formatTime (time) {
    //  format time from milliseconds to 'minutes:seconds' format
    var minutes = Math.floor(time / 1000 / 60);
    var seconds = Math.floor((time / 1000 / 60 - minutes) * 60);
    var sep = (seconds < 10) ? ':0' : ':';

    return minutes + sep + seconds;
}