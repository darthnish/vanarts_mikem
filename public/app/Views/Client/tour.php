<main class="tour"><h1 class="tour__heading">Tour</h1>
    <div class="push-down-100vh-sm visible-sm"></div>
    <div class="push-down-30vh-md visible-md"></div>
    <div class="push-down-30vh-lg visible-lg"></div>
    <div class="flex-row">
        <div class="col-2 col-md-3 col-lg-2"></div>
        <div class="col-9 col-md-5 col-lg-7">
            <?foreach ($data as $event): ?>
            <div class="tour__event">
                <div class="tour__event__block col-lg-9">
                    <div class="col-lg-2"><p class="tour__date text__shade"><?=date_create($event['date'])->format('M d')?></p></div>
                    <div class="col-lg-4"><p class="tour__venue text__shade"><?=$event['venue']?></p></div>
                    <div class="col-lg-4"><p class="tour__city text__shade"><?=$event['city']?></p></div>
                </div>
                <div class="col-lg-2"><a href="#" class="btn btn-md btn-alt <?=$event['is_available'] ? '' : 'disabled'?>"><?=$event['is_available'] ? 'Tickets' : 'Sold out'?></a></div>
            </div>
            <?endforeach;?>
        </div>
    </div>
</main>