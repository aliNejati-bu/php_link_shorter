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
        <h1>پنل مدیریت</h1>
        <div class="btn-box">
            <a href="<?= route("createPost") ?>" class="btn btn-data" style="margin-top: 3rem;width: 100%;color: #2F96B4;">ایجاد پست وبلاگ جدید</a>
            <a href="<?= route("postList") ?>" class="btn btn-data" style="margin-top: 3rem;width: 100%;color: #2F96B4;">لیست پست ها</a>
        </div>
    </div>
</div>
<script src="/js/jquery-2.2.4.min.js"></script>
<?php require viewPath("components>toastsJs") ?>
</body>
</html>