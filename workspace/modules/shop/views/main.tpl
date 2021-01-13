<!DOCTYPE html>
<html lang="en">
<head>
    <title>Modist - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="/workspace/modules/shop/resources/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="/workspace/modules/shop/resources/css/animate.css">

    <link rel="stylesheet" href="/workspace/modules/shop/resources/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/workspace/modules/shop/resources/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="/workspace/modules/shop/resources/css/magnific-popup.css">

    <link rel="stylesheet" href="/workspace/modules/shop/resources/css/aos.css">

    <link rel="stylesheet" href="/workspace/modules/shop/resources/css/ionicons.min.css">

    <link rel="stylesheet" href="/workspace/modules/shop/resources/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="/workspace/modules/shop/resources/css/jquery.timepicker.css">


    <link rel="stylesheet" href="/workspace/modules/shop/resources/css/flaticon.css">
    <link rel="stylesheet" href="/workspace/modules/shop/resources/css/icomoon.css">
    <link rel="stylesheet" href="/workspace/modules/shop/resources/css/style.css">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light ftco-navbar-light-2" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="/">Shop Name</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a href="/" class="nav-link">Главная</a></li>
                <li class="nav-item dropdown active">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Категории</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        {foreach $categories as $category}
                            <a class="dropdown-item" href="/shop/?category={$category.id}">{$category.name}</a>
                        {/foreach}
                    </div>
                </li>
                <li class="nav-item"><a href="/contacts" class="nav-link">Контакты</a></li>
                <li class="nav-item cta cta-colored">
                    <a href="/shop/cart/" class="nav-link">
                        <span class="icon-shopping_cart"></span> [<span id="products-in-cart">{$cartSize}</span>]
                    </a>
                </li>
                {if !workspace\modules\users\models\User::getCurrentUserName()}
                <li class="nav-item"><a href="/sign-in" class="nav-link">Вход</a></li>
                <li class="nav-item"><a href="/sign-up" class="nav-link">Регистрация</a></li>
                {else}

                <li class="nav-item"><a class="nav-link">{workspace\modules\users\models\User::getCurrentUserName()}</a></li>
                <li class="nav-item">
                    <a href="/logout" class="nav-link">Выход</a>
                </li>
                {/if}
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->

<div class="hero-wrap hero-bread" style="background-image: url('/resources/images/bg_6.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <h1 class="mb-0 bread">Collection</h1>
                <p class="breadcrumbs">{$smarty.capture.breadcrumbs}</p>
            </div>
        </div>
    </div>
</div>

{$content}

<section class="ftco-section-parallax">
    <div class="parallax-img d-flex align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center py-5">
                <div class="col-md-12 text-center heading-section ftco-animate">
                    <h1 class="big">Категории</h1>
                    <h2>Категории</h2>
                    <div class="row d-flex mt-5">
                        {foreach $categories as $category}
                            <div class="col-md-4">
                                <a href="/shop/?category={$category.id}">{$category.name}</a>
                            </div>

                        {/foreach}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<footer class="ftco-footer bg-light ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>
        </div>
    </div>
</footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

    <script src="/workspace/modules/shop/resources/js/jquery.min.js"></script>
    <script src="/workspace/modules/shop/resources/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="/workspace/modules/shop/resources/js/popper.min.js"></script>
    <script src="/workspace/modules/shop/resources/js/bootstrap.min.js"></script>
    <script src="/workspace/modules/shop/resources/js/jquery.easing.1.3.js"></script>
    <script src="/workspace/modules/shop/resources/js/jquery.waypoints.min.js"></script>
    <script src="/workspace/modules/shop/resources/js/jquery.stellar.min.js"></script>
    <script src="/workspace/modules/shop/resources/js/owl.carousel.min.js"></script>
    <script src="/workspace/modules/shop/resources/js/jquery.magnific-popup.min.js"></script>
    <script src="/workspace/modules/shop/resources/js/aos.js"></script>
    <script src="/workspace/modules/shop/resources/js/jquery.animateNumber.min.js"></script>
    <script src="/workspace/modules/shop/resources/js/bootstrap-datepicker.js"></script>
    <script src="/workspace/modules/shop/resources/js/scrollax.min.js"></script>
    <script src="/workspace/modules/shop/resources/js/main.js"></script>
    <script src="/workspace/modules/shop/resources/js/shop.js"></script>
</body>
</html>