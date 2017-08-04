<?php
//settings for the site pages: title, additional css styles (besides main.css) and additional js-scripts (besides main.js and jQuery CDN)
return [
    'home' => [
        'title' => 'Home | DJ MikeM',
        'script' => [
            "/js/scrolling-home.js",
            "/js/yt-video.js",
        ],
    ],

    'bio' => [
        'title' => 'Bio | DJ MikeM',
        'script' => [],
    ],

    'contact' => [
        'title' => 'Contact | DJ MikeM',
        'script' => [],
    ],

    'gallery' => [
        'title' => 'Gallery | DJ MikeM',
        'script' => [
            "/js/img-slider.js",
        ]
    ],

    'music' => [
        'title' => 'Music | DJ MikeM',
        'script' => [
            "https://connect.soundcloud.com/sdk/sdk-3.1.2.js",
            "https://w.soundcloud.com/player/api.js",
            "/js/music.js",
        ]
    ],

    'news' => [
        'title' => 'News | DJ MikeM',
        'script' => [
            "/js/news.js",
        ]
    ],

    'tour' => [
        'title' => 'Tour | DJ MikeM',
        'script' => [],

    ],

    'video' => [
        'title' => 'Video | DJ MikeM',
        'script' => [
            "/js/scrolling-video.js",
        ]
    ],

    'error' => [
        'title' => 'Oops | DJ MikeM',
        'script' => [
            "/js/scrolling-video.js",
        ]
    ],
];