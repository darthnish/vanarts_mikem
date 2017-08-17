<!DOCTYPE html>
<html lang="en">
<head><title><?=$pageInfo['title'] ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="with=device--width, initial-scale=1">
    <meta name="description" content="This is a student exercise website for the Vancouver Institute of Media Arts">

<!--    favicon-->
    <link rel="shortcut icon" type="image/ico" href="/favicon.ico">

<!--    stylesheet and fonts-->
    <link rel="stylesheet" href="css/main.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,300,400,500,700" rel="stylesheet">

<!--    jQuery and font awesome-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://use.fontawesome.com/4567abeb9b.js"></script>
</head>
<body>
<!--    logo-->
    <div class="logo is-visible">
        <div class="logo__container"><img src="img/logo.svg"></div>
    </div>

<!--    sidebar-->
    <nav class="sidebar flex-column is-visible">
        <div class="sidebar__mobile-control visible-sm"></div>

<!--        navigation links-->
        <ul class="navbar">
            <?foreach ($menu as $item):?>
                <li class="navbar__item"><a href="<?=$item?>" class="navbar__link <?=$navActive[$item] ?? ''?>"><?=strtoupper($item)?></a></li>
            <?endforeach;?>
        </ul>

<!--        social media-->
        <div class="social-media">
            <div class="flex-row">
                <a href="https://www.facebook.com/" target="_blank" class="fa fa-facebook fa-lg"></a>
                <a href="https://www.instagram.com/" target="_blank" class="fa fa-instagram fa-lg"></a>
            </div>
            <div class="flex-row">
                <a href="https://www.youtube.com/" target="_blank" class="fa fa-youtube-play fa-lg"></a>
                <a href="https://www.spotify.com/" target="_blank" class="fa fa-spotify fa-lg"></a>
            </div>
            <div class="flex-row">
                <a href="https://www.soundcloud.com/" target="_blank" class="fa fa-soundcloud fa-lg"></a>
                <a href="https://www.apple.com/ca/music/" target="_blank" class="fa fa-music fa-lg"></a>
            </div>
        </div>
    </nav>

    <?=$pageContent ?>

<!--js-scripts-->
    <script src="/js/navbar-mobile.js"></script>
    <?foreach ($pageInfo['script'] as $script): ?>
        <script src="<?=$script?>"></script>
    <?endforeach;?>
</body>
</html>
