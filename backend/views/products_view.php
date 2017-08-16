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