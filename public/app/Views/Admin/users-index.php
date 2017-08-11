<section class="col-lg-10">
    <?foreach ($list as $user): ?>
        <div class="col-lg-3 user__profile">
            <img class="img-thumbnail" src="https://www.fillmurray.com/200/300" alt="user profile picture">
            <h4><?=$user['username']?></h4>
            <a class="btn btn-xs btn-primary" href="/admin/users/edit/<?=$user['id']?>">Change Password</a>
        </div>
    <?endforeach;?>
</section>
