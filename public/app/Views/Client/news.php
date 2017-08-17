<main class="news">
    <h1 class="news__heading">News</h1>
    <!--    placeholders-->
    <div class="push-down-100vh-sm visible-sm"></div>
    <div class="push-down-20vh-md visible-md"></div>
    <div class="push-down-15vh-lg visible-lg"></div>
    <div class="flex-row">
        <div class="col-2 col-md-3 col-lg-2"></div>
<!--        main container-->
        <div class="col-9 col-md-5 col-lg-7 news__feed">
            <?foreach($data as $news): ?>
            <div class="news__block col-lg-4"><img src="/img/uploads/<?=$news['path']?>"/>
                <p class="news__date"><?=date_create($news['date'])->format('M jS, Y')?></p>
                <p class="news__text"><?=$news['body']?></p>
                <p class="news__tags"><?=$news['footer']?></p>
            </div>
            <?endforeach;?>
        </div>
    </div>
</main>