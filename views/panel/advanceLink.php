<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/toastr.min.css">

    <title>ایجاد لینک با اسلاگ دلخواه</title>

</head>
<body>

<div class="container open" id="main-container">
    <form method="post">
        <div class="wrapper">
            <h1>ایجاد لینک با اسلاگ دلخواه</h1>
            <div class="input-group">
                <input placeholder="Http://example.com" type="text" name="link" class="text-input">
            </div>
            <div class="input-group">
                <input placeholder="اسلاگ" type="text" name="slug" class="text-input">
            </div>
            <div class="btn-box">
                <button class="btn btn-data" type="submit">ایجاد</button>
                <a href="<?= route("panel") ?>" class="btn btn-data">ایجاد لینک عادی</a>
            </div>
        </div>
    </form>
</div>

<script src="/js/jquery-2.2.4.min.js"></script>
<?php require viewPath("components>toastsJs") ?>

</body>
</html>