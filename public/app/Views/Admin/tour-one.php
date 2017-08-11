<section class="col-lg-10">
    <form class="form-horizontal" id="blog-article" name="article" method="post" action="/admin/tour/<?=$method?>" enctype="multipart/form-data">

        <div class="form-group">
            <label id="date" class="col-lg-2 control-label">Date</label>
            <div class="col-lg-4">
                <input class="form-control" type="date" id="date" name="date" value="<?=$data['date'] ?? ''?>" required>
            </div>
        </div>

        <div class="form-group">
            <label id="venue" class="col-lg-2 control-label">Venue</label>
            <div class="col-lg-4">
                <input class="form-control" type="text" id="venue" name="venue" value="<?=$data['venue'] ?? ''?>" required>
            </div>
        </div>

        <div class="form-group">
            <label id="city" class="col-lg-2 control-label">City</label>
            <div class="col-lg-4">
                <input class="form-control" type="text" id="city" name="city" value="<?=$data['city'] ?? ''?>" required>
            </div>
        </div>

        <div class="form-group">
            <label id="active" class="col-lg-2 control-label">Are tickets available?</label>
            <div class="col-lg-4">
                <div class="col-lg-2">
                    <input type="checkbox" name="is_available" value="1" <?=(isset($data['is_available']) && $data['is_available'] == 1) ? 'checked' : ''?> data-toggle="toggle" data-on="yes" data-off="no" data-size="small">
                </div>
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
