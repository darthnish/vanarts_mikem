<section class="col-lg-10">
    <form class="form-horizontal" id="blog-article" name="article" method="post" action="/admin/images/<?=$method?>" enctype="multipart/form-data">
<!--        input for choosing image-->
        <div class="form-group">
            <label class="col-lg-2 control-label">Image file</label>
            <div class="col-lg-4">
                <input type="file" class="article_img_upload" name="file">
            </div>
        </div>

<!--        save and cancel buttons-->
        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-2">
                <button class="form-control btn btn-primary" type="submit" name="button" value="save">Upload</button>
            </div>
            <div class="col-lg-2">
                <button class="form-control btn btn-default" type="submit" name="button" value="cancel">Cancel</button>
            </div>
        </div>
    </form><br>
</section>
