<!DOCTYPE html>

<html>
<head>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>
<body>
<div class="container" style="margin-top: 40px">
    <div class="col-md-3">
        <ul>
            <li><a href="/admin/products/">Продукты</a></li>
            <li><a href="/admin/brands/">Бренды</a></li>
            <li><a href="/admin/users/">Пользователи</a></li>
        </ul>
    </div>
    <div class="col-md-9">
        <?php include $_SERVER['DOCUMENT_ROOT'] . '/backend/views/' . $content_view; ?>
    </div>
</div>
</body>
</html>