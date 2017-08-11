<section class="col-lg-10 image__row">
    <?foreach ($list as $image): ?>
    <div class="col-lg-2 image__thumb">
        <div>
            <img class="img-rounded" src="/img/uploads/<?=$image['path']?>" alt="">
        </div>
        <div>
            <a class="btn btn-xs btn-danger" href="/admin/images/delete/<?=$image['id']?>" onclick="return confirmDelete();"><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Delete image"></span></a>
        </div>
    </div>
    <?endforeach;?>
    <br>
    <div class="col-lg-2 image__add">
        <a class="btn btn-sm btn-info" href="/admin/images/create" data-toggle="tooltip" data-placement="top" title="Add new image">+add</a><br>
    </div >
</section>
