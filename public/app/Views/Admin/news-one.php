<section class="col-lg-10">
    <form class="form-horizontal" id="blog-article" name="article" method="post" action="/admin/news/<?=$method?>" enctype="multipart/form-data">

        <div class="form-group">
            <label id="date" class="col-lg-2 control-label">Date</label>
            <div class="col-lg-4">
                <input class="form-control" type="date" id="date" name="date" value="<?=$data['date'] ?? ''?>" required>
            </div>
        </div>

        <div class="form-group">
            <label id="content" class="col-lg-2 control-label">Content</label>
            <div class="col-lg-8">
                <textarea class="form-control" name="body" id="content" rows="15"><?=$data['body'] ?? ''?></textarea>

            </div>
        </div>

        <div class="form-group">
            <label id="footer" class="col-lg-2 control-label">Tags</label>
            <div class="col-lg-8">
                <input class="form-control" type="text" id="footer" name="footer" value="<?=$data['footer'] ?? ''?>" required>
            </div>
        </div>

        <div class="form-group">
            <label for="select-image" class="col-lg-2 control-label">Image</label>
            <div class="col-lg-8">
                <select class="form-control" id="select-image" name="image_id" required>
                    <option value="" disabled selected>select the image</option>
                    <?foreach ($param['images'] as $image): ?>
                    <option value="<?=$image['id']?>" <?= (isset($data['image_id']) && $data['image_id'] == $image['id'] ? 'selected' : '')?>><?=$image['path']?></option>
                    <?endforeach;?>
                </select>
                <img class="img-rounded news-one__image" src="/img/uploads/<?=$data['path'] ?? 'default.jpg'?>" alt="">
            </div>
        </div>



        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-2">
                <button class="form-control btn btn-success" type="submit" name="button" value="save">Save</button>
            </div>
            <div class="col-lg-2">
                <button class="form-control btn btn-default" type="submit" name="button" value="cancel">Cancel</button>
            </div>
        </div>

    </form><br>
</section>
