<?php
/**
 * @var $data
 */
?>

<form action="" method="post">
    <div class="form-group">
        <label for="name">Имя</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $data['name'] ?>">
    </div>

    <div class="form-group">
        <label for="brand">Бренд</label>
        <select name="brand" id="brand" class="form-control">
            <?php foreach ($data['brands'] as $brand) { ?>
                <option value="<?= $brand['id'] ?>" <?= ($brand['id'] == $data['brand_id']) ? 'selected' : ''; ?>><?= $brand['name'] ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <input name="submit" type="submit" class="btn btn-success" value="Обновить">
    </div>
</form>