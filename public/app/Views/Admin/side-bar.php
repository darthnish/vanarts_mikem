<aside class="col-lg-2">
    <div class="list-group">
        <a href="/admin/tour/index" class="list-group-item">Tour</a>
        <a href="/admin/news/index" class="list-group-item">News</a>

        <?if (isset($msg) && !empty($msg)): ?>
            <div class="alert alert-info article_msg"><?=$msg?></div>
        <?endif;?>
    </div>
</aside>
