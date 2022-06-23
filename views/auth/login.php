<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/toastr.min.css">

    <title>ورود</title>

</head>
<body>

<div class="container open" id="main-container">
    <form method="post">
        <div class="wrapper">
            <h1>ورود</h1>
            <div class="input-group rtl">
                <input placeholder="ایمیل" type="email" name="email" class="text-input">
            </div>
            <div class="input-group rtl">
                <input placeholder="رمز عبور" type="password" name="password" class="text-input">
            </div>
            <div class="btn-box">
                <button class="btn btn-data" type="submit">ورود</button>
                <a href="<?= route("signUp") ?>" class="btn btn-data">ورود</a>
            </div>
        </div>
    </form>
</div>

<script src="js/jquery-2.2.4.min.js"></script>
<?php require viewPath("components>toastsJs") ?>

</body>
</html>