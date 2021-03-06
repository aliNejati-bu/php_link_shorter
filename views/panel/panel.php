<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/toastr.min.css">
    <title>کوتاه کننده لینک</title>
</head>
<body>
<div class="container open" id="main-container">
    <div class="wrapper">
        <h1>لوگوی ما</h1>
        <form method="post" action="<?= route("createSimpleLink") ?>">
            <div class="input-group">

                <input name="link" placeholder="http://exmple.com" type="text" class="text-input">
                <button type="submit" class="btn btn-orange" id="btn">ایجاد لینک</button>
            </div>
        </form>
        <div class="btn-box">
            <a href="<?= route("upgrade") ?>" class="btn btn-data">پرداخت و ارتقا به حساب کاربری (10000 تومان)</a>
            <a href="<?= route("createAdvanceLink") ?>" class="btn btn-data">ایجاد با slug دلخواه</a>
        </div>
        <div class="btn-box" style="margin-top: 1rem">
            <a href="<?= route("blog") ?>" class="btn btn-data">وبلاگ</a>
            <a href="/panel/admin" class="btn btn-data">مدیریت</a>
        </div>
    </div>
</div>
<script src="/js/jquery-2.2.4.min.js"></script>
<?php require viewPath("components>toastsJs") ?>
</body>
</html>