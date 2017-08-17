<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="/admin/css/bootstrap.min.css">
    <script src="/admin/js/jquery-3.2.1.min.js"></script>
</head>
<body>
<div class="container" style="margin-top: 40px">
    <div class="row">
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
</div>
</body>
</html>