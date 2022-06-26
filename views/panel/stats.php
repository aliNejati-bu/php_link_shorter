<!doctype html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/toastr.min.css">
    <title>نمایش تحلیل های لینک</title>
</head>
<body>
<div class="container open container--link" id="link-container">
    <div class="wrapper">
        <h1>نمایش تحلیل های لینک</h1>
        <img src="https://chart.googleapis.com/chart?chs=400x400&cht=qr&chl=<?= $url . "/" . $slug ?>&choe=UTF-8"
             class="qr-code" alt="">
        <div class="link-box">
            <span class="link-text">
                <a href="<?= $url . "/" . $slug ?>"><?= $url . "/" . $slug ?></a>
            </span>
            <button class="btn btn-copy">کپی لینک</button>
        </div>
        <div class="btn-box stats">
            <span>
                کلیک در 24 ساعت گذشته :
                <?= $daily ?>
            </span>
            <span>
                کلیک کلی :
                <?= $all ?>
            </span>
        </div>
    </div>
</div>

<script src="/js/jquery-2.2.4.min.js"></script>
<?php require viewPath("components>toastsJs") ?>

</body>
</html>