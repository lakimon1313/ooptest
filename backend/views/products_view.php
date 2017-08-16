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
                <button><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button>
                <button><span class="glyphicon glyphicon-remove-circle" aria-hidden="true"></span></button>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>