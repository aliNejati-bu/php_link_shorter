<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, maximum-scale=1">
    <title><?= $post->title ?></title>
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href='https://cdn.fontcdn.ir/Font/Persian/Vazir/Vazir.css' rel='stylesheet' type='text/css'>
    <link href="/css/style.css" rel="stylesheet" type="text/css">
    <!--[if IE]>
    <style type="text/css">.pie {
        behavior: url(PIE.htc);
    }</style>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="/js/respond-1.1.0.min.js"></script>
    <script src="/js/html5shiv.js"></script>
    <script src="/js/html5element.js"></script>
    <![endif]-->
</head>
<body>
<div class="main-menu">
    <div class="container">
        <ul>
            <li><a href="<?= route("panel") ?>">صفحه اصلی</a></li>
            <li><a href="<?= route("blog") ?>">مقالات</a></li>
            <li><a href="#">تماس با ما</a></li>
            <li><a href="<?= route("about") ?>">درباره</a></li>
        </ul>
    </div>
</div>
<div class="top-section">
    <div class="container">
        <div class="row">

            <div class="col-md-12" style="text-align: center">
                <div class="index-h1">
                    <h1>بهترین و متفاوت ترین مقالات آموزشی</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<center>
    <p style="font-size: 16px;color: #444;">آخرین مطالب وبلاگ</p>
</center>
<hr>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="sidebar">
                <div class="sidebar-text">
                    <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است.
                        چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی
                        مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه
                        درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری
                        را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد. </p>
                </div>
            </div>
        </div>
        <div class="col-md-9">
            <div class="col-md-12">
                <div class="single-content">
                    <div class="single-img">
                        <img src="/<?= $post->image ?>">
                    </div>
                    <div class="single-title">
                        <h1><?= $post->title ?></h1>
                    </div>
                    <p><?= $post->content ?></p>
                    <hr>
                </div>
            </div>
        </div>

    </div>
</div>
<br><br>
<div class="footer">
    <div class="container">
        <br><br><br>
        <center>
            <p>حقوق انتشار برای وب سایت محفوظ است - سایت کوتاه کننده لینک ما</p>
        </center>
    </div>
</div>
<script type="text/javascript" src="/js/jquery.1.8.3.min.js"></script>
<script type="text/javascript" src="/js/bootstrap.js"></script>
<script type="text/javascript" src="/js/wow.js"></script>
<script type="text/javascript" src="/js/jquery.particleground.js"></script>
<script>
    jQuery("[data-toggle='tooltip']").tooltip();
    jQuery('.footer').particleground({
        dotColor: '#515151',
        lineColor: '#515151'
    });
</script>
</body>
</html>