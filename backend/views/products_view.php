<?php
/**
 * @var $data
 */
?>
<table class="table table-bordered table-responsive">
    <thead>
    <tr>
        <th>id</th>
        <th>Имя</th>
        <th>Бренд</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($data as $item) { ?>
        <tr>
            <td><?= $item['id'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['brand'] ?></td>
            <td>
                <a href="/admin/products/update/?id=<?= $item['id'] ?>" class="btn btn-primary" data-toggle="tooltip" title="Редактировать"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
                <a href="/admin/products/delete/?id=<?= $item['id'] ?>" class="btn btn-primary" data-toggle="tooltip" title="Удалить"><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>