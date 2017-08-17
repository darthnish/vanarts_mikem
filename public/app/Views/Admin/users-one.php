<section class="col-lg-10">
    <form class="form-horizontal" id="blog-article" name="article" method="post" action="/admin/users/<?=$method?>" enctype="multipart/form-data">

<!--        new password input field-->
        <div class="form-group">
            <label for="password" class="col-lg-2 control-label">New password</label>
            <div class="col-lg-4">
                <input class="form-control" type="password" id="password" name="password" required>
            </div>
        </div>

<!--        repeat password input field-->
        <div class="form-group">
            <label for="rPassword" class="col-lg-2 control-label">Repeat password</label>
            <div class="col-lg-4">
                <input class="form-control" type="password" id="rPassword" name="rPassword" required>
            </div>
        </div>

<!--        save and cancel buttons-->
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
