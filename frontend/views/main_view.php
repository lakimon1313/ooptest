<?php
/**
 * @var $data
 */
?>
<div>
    <a href="/admin/" class="btn btn-primary">Админ панель</a>
</div>
<table class="table table-bordered table-responsive">
    <thead>
        <tr>
            <th>id</th>
            <th>Имя</th>
            <th>Бренд</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $item) { ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['brand'] ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>