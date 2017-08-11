<section class="col-lg-10">
    <table class="table table-striped ">
        <tr>
            <th>Date</th>
            <th>Venue</th>
            <th>City</th>
            <th>Tickets available</th>
            <th colspan="2">Actions</th>
        </tr>
        <?foreach ($list as $tour): ?>
        <tr>
            <td><?=$tour['date']?></td>
            <td><?=$tour['venue']?></td>
            <td><?=$tour['city']?></td>
            <td><?=$tour['is_available'] ? 'yes' : 'no'?></td>

            <td class="t-col-sm"><a class="btn btn-xs btn-warning" href="/admin/tour/edit/<?=$tour['id']?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"  data-toggle="tooltip" data-placement="top" title="Edit date"></span></a></td>
            <td class="t-col-sm"><a class="btn btn-xs btn-danger" href="/admin/tour/delete/<?=$tour['id']?>" onclick="return confirmDelete();"><span class="glyphicon glyphicon-trash" aria-hidden="true" data-toggle="tooltip" data-placement="top" title="Delete date"></span></a></td>
        </tr>
        <?endforeach;?>
    </table>
    <br>
    <a class="btn btn-sm btn-info" href="/admin/tour/create" data-toggle="tooltip" data-placement="top" title="Add new date">+add</a><br>
</section>
