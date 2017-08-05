<section class="row">
    <form method="post" action="/admin/auth/login" class="form-horizontal">
        <div class="form-group">
            <label id="login" class="col-lg-5 control-label">Enter your login:</label>
            <div class="col-lg-3">
                <input class="form-control"  type="text" name="username" id="login">
            </div>
        </div>
        <div class="form-group">
            <label id="password" class="col-lg-5 control-label">Enter your password:</label>
            <div class="col-lg-3">
                <input class="form-control"  type="password" name="password" id="password">
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-offset-5 col-lg-2">
                <input class="form-control btn btn-info" type="submit" value="Login">
            </div>
        </div>
    </form>
    <? if(isset($authError) && !empty($authError)) :?>
        <div class="col-lg-offset-5 alert alert-danger col-lg-3">
            <?= $authError; ?>
        </div>
    <? endif; ?>
</section>