<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/toastr.min.css">
    <title>پنل مدیریت</title>
</head>
<body class="admin-body">
<div class="container open" id="main-container">
    <div class="wrapper">
        <h1>لیست پست ها</h1>
        <div class="btn-box">
            <table border="1px" style="width: 100%">
                <tr>
                    <th width="10%">عنوان</th>
                    <th width="50%">بدنه</th>
                    <th width="30%">تصویر</th>
                    <th width="1%">عملیات</th>
                </tr>
                <?php foreach ($posts as $post): ?>
                    <tr>
                        <td><?= $post->title ?></td>
                        <td><?= $post->content ?></td>
                        <td><img src="/<?= $post->image ?>" alt="" width="100%"></td>
                        <td><a style="color: red" href="#">حذف</a></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</div>
<script src="/js/jquery-2.2.4.min.js"></script>
<?php require viewPath("components>toastsJs") ?>
</body>
</html>