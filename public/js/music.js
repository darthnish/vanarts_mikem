SC.initialize({
    client_id: 'MIwxvGw9tfQ06eTGxtwaDRMfaY2U0g7N'
});

$(document).ready(function() {

    setTimeout(function () {
        animateThumbs();
    }, 1000);

    $('.music__control').click(function() {
        var $this = $(this);
        var widget = getWidgetElement($this);
        var progressBar = getProgressElement($this);
        var progressMax = progressBar.parent().width();


        widget.bind(SC.Widget.Events.READY, function() {
            widget.bind(SC.Widget.Events.PLAY_PROGRESS, function() {
                widget.getDuration(function(duration) {
                    widget.getPosition(function(postion) {
                        progressBar.width(postion / duration * progressMax);
                    });
                });
            });
        });

        widget.toggle();
        if($this.hasClass('fa-play')) {
            $('.music__control').removeClass('fa-pause');
            $('.music__control').addClass('fa-play');
            $this.toggleClass('fa-play');
            $this.toggleClass('fa-pause');
        } else {
            $this.toggleClass('fa-play');
            $this.toggleClass('fa-pause');
        }
    });
    
    $('.music__progerss-bar-pseudo').click(function (event) {
        var $this = $(this);
        var seekPosR = event.offsetX / $this.width();
        var widget = getWidgetElement($this);
        var progressBar = getProgressElement($this);
        var progressMax = progressBar.parent().width();

        widget.bind(SC.Widget.Events.READY, function () {
            widget.getDuration(function (duration) {
                widget.seekTo(seekPosR * duration);
                progressBar.width(seekPosR * progressMax);
            });
        });
    });

    $('.music__volume-pseudo').click(function (event) {
        var $this = $(this);
        var widget = getWidgetElement($this);
        var seekVolR = event.offsetY / $this.height();
        var volumeBar = getVolumeElement($this);
        var volumeMax = volumeBar.parent().height() - 10;

        volumeBar.height(seekVolR * volumeMax);
        widget.bind(SC.Widget.Events.READY, function () {
            widget.setVolume(seekVolR * 100);
        });

    });
});

function getWidgetElement ($this) {
    return SC.Widget($this.parent().children().eq(2)[0])
}

function getProgressElement ($this) {
    return $($this.parent().children().eq(3));
}

function getVolumeElement ($this) {
    return $($this.parent().children().eq(5));
}

function animateThumbs() {
    var $thumbs = $('.music__block');
    var $btns = $('.music__btn');

    $thumbs.each(function (i) {
        setTimeout(function () {
            $thumbs.eq(i).addClass('is-visible');
            $btns.eq(i).addClass('is-visible');
        }, 500 * (i + 1));
    })
}