<?php
include 'lib/session.php';
session::init();
include_once("lib/database.php");
include_once("helpers/format.php");
Spl_autoload_register(function ($className) {
    include_once("classes/" . $className . ".php");
});
$db = new database();
$fm = new format();
$ct = new cart();
$cat = new category();
$brand = new brand();
$pro = new product();
$city = new city();
$user = new user();
$bill = new bill();
?>
<?php
$buyer = Session::get('customer_user');
?>
<?php

if (isset($_GET['customer_user'])) {
    $destroyCart = $ct->Del_cart_by_Session();
    Session::destroy();
}

?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Saigon Sneaker Store - Authentic - Sneaker</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <!--    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet"> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v10.0&appId=308345363849282&autoLogAppEvents=1" nonce="q26UvTLo"></script>
    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <!-- Start WOWSlider.com HEAD section -->
    <!-- add to the <head> of your page -->
    <link rel="stylesheet" type="text/css" href="engine1/style.css" />
    <script type="text/javascript" src="engine1/jquery.js"></script>
    <!-- End WOWSlider.com HEAD section -->
</head>
<body>
    <header class="header mb-5">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 col-md-8">
                        <div class="header__top__left">
                            <ul>
                                <!-- <li><i class="fa fa-envelope"></i> shop@123.com</li> -->
                                <li>
                                    <img src="data1/images/logo-3475-removebg-preview.png" style="max-width: 50%;"></img>
                                </li>
                                <li class="active"><a class="text-dark" href="./index.php">Trang chủ</a></li>
                                <li><a class="text-dark" href="./product.php">Sản phẩm</a></li>
                                <li><a class="text-dark" href="./contact.php">Liên hệ</a></li>
                                <?php
                                $login = Session::get('customer_login');
                                if ($login == false) {
                                    echo '';
                                } else {
                                    echo  '<li><a class="text-dark" href="./bill.php">Đơn hàng</a></li>';
                                }
                                ?>
                                </nav>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="cart.php"><i class="fa fa-shopping-cart"></i> Cart
                                    <span>
                                        <?php
                                        $qtt = '0';
                                        $qtt = Session::get("qtt");
                                        if ($qtt)
                                            echo "(" . $qtt . ")";
                                        else echo "(0)";
                                        ?>
                                    </span>
                                </a>
                            </div>
                            <?php
                            $check = Session::get('customer_login');
                            if ($check == false) {
                            ?>
                                <div class="header__top__right__social">
                                    <a href="register.php"><i></i> Đăng ký</a>
                                </div><?php
                                    }
                                        ?>
                            <div class="header__top__right__auth">
                                <?php
                                $check = Session::get('customer_login');
                                if ($check == false) {
                                    echo '<a href="login.php"><i class="fa fa-user"></i> Đăng nhập</a>';
                                } else {
                                    echo '<ul class="list-inline">';
                                    echo '<li><a href="profile.php"><i class="fa fa-user"></i>Profile</a></li>';
                                    echo '<li><a href="?customer_user=' . Session::get('customer_user') . '"><i class="fa fa-sign-out"></i>Logout</a></li>';
                                    echo '</ul></div>';
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>