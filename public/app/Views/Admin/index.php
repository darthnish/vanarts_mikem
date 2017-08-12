<section class="col-lg-10">
    <div class="jumbotron">
        <?if(empty($error)): ?>
            <h1>Hello admin!</h1>
            <p>This world is yours</p>
        <?else: ?>
            <p><?=$error?></p>
        <?endif;?>
    </div>
</section>
