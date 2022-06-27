<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/toastr.min.css">
    <title>ایجاد پست</title>
</head>
<body class="admin-body">
<div class="container open" id="main-container">
    <div class="wrapper">
        <h1>ایجاد پست</h1>
        <form method="post" enctype="multipart/form-data">
            <div class="input-group">
                <input placeholder="عنوان پست" type="text" name="title" required class="text-input">
            </div>
            <div class="input-group">
                <input placeholder="اسلاگ" type="text" name="slug" required class="text-input">
            </div>
            <div class="input-group">
                <label for="">فایل تصویر</label>
                <input placeholder="فایل تصویر" type="file" name="image" required class="text-input">
            </div>
            <div class="input-group">
            <textarea cols="50" rows="30" placeholder="بدنه پست" name="content" class="text-input">

            </textarea>
            </div>
            <div class="btn-box">
                <button class="btn btn-data" type="submit" style="margin-top: 3rem;width: 100%;color: #2F96B4;">ایجاد
                    پست وبلاگ جدید
                </button>
            </div>
        </form>
    </div>
</div>
<script src="/js/jquery-2.2.4.min.js"></script>
<?php require viewPath("components>toastsJs") ?>
</body>
</html>