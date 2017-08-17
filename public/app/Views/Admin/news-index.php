<section class="col-lg-10">
<!--    table with news items-->
    <table class="table table-striped ">
        <tr>
            <th>Date</th>
            <th>Image</th>
            <th>Content</th>
            <th>Footer</th>
            <th colspan="2">Actions</th>
        </tr>
        <?foreach ($list as $news): ?>
        <tr>
            <td class="news-list__date"><?=$news['date']?></td>
            <td><img class="news-list__image img-rounded" src="/img/uploads/<?=$news['path']?>" alt=""></td>
            <td><?=$news['body']?></td>
            <td><?=$news['footer']?></td>

<!--            action buttons-->
            <td class="t-col-sm"><a class="btn btn-xs btn-warning" href="/admin/news/edit/<?=$news['id']?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"  data-toggle="tooltip" data-placement="top" title="Edit news"></span></a></td>
            <td class="t-col-sm"><a class="btn btn-xs btn-danger" href="/admin/news/delete/<?=$news['id']?>" onclick="return confirmDelete();"><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Delete news"></span></a></td>
        </tr>
        <?endforeach;?>
    </table>
    <br>
<!--    add button-->
    <a class="btn btn-sm btn-info" href="/admin/news/create" data-toggle="tooltip" data-placement="top" title="Add new news">+add</a><br>
</section>
