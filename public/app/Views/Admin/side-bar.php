<aside class="col-lg-2">
    <div class="list-group">
        <a href="/admin/tour/index" class="list-group-item <?= $menuActive['tour'] ?? ''?>">Tour</a>
        <a href="/admin/news/index" class="list-group-item <?= $menuActive['news'] ?? ''?>">News</a>
        <a href="/admin/images/index" class="list-group-item <?= $menuActive['images'] ?? ''?>">Images</a>
    </div>
    <br><br>
    <?if (isset($msg) && !empty($msg)): ?>
        <div class="alert alert-info article_msg"><?=$msg?></div>
    <?endif;?>
    <?if (isset($errors) && !empty($errors)): ?>
        <?foreach ($errors as $error): ?>
            <div class="alert alert-danger article_msg"><?=$error?></div>
        <?endforeach;?>
    <?endif;?>
</aside>