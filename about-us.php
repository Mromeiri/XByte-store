<?php 
require 'connect.php';


// Start the session
session_start();
if (!isset($_SESSION['card'])) {
         $_SESSION['card']=[];
 }
//  $userIP = $_SERVER['REMOTE_ADDR'];
//  echo "Your IP address is: " . $userIP;

// if (isset($_SESSION['card'])) {
//     print_r($_SESSION['card']);
// }
?>
<?php
function formatNumberWithSpaces($number) {
    $number = (string) $number;
    $length = strlen($number);

    if ($length <= 3) {
        return $number; // No need to format if the number has 3 digits or less
    }

    $formatted = '';
    $groupSize = 3;
    $remainingDigits = $length % $groupSize;
    $formatted .= substr($number, 0, $remainingDigits);

    while ($remainingDigits < $length) {
        if (!empty($formatted)) {
            $formatted .= ' '; // Add a space separator after each group of three digits
        }
        $formatted .= substr($number, $remainingDigits, $groupSize);
        $remainingDigits += $groupSize;
    }

    return $formatted;
}

?>
<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/flosun/flosun/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:27 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>About Us</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/xbyte-website-favicon-color.png">

    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="assets/css/vendor/font.awesome.min.css">
    <!-- Linear Icons CSS -->
    <link rel="stylesheet" href="assets/css/vendor/linearicons.min.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <!-- Jquery ui CSS -->
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <!-- Nice Select CSS -->
    <link rel="stylesheet" href="assets/css/plugins/nice-select.min.css">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>

    <?php require 'header.php'; ?>
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">About Us</h3>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>About Us</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- About Area Start Here -->
    <div class="about-area mt-no-text">
        <div class="container custom-area">
            <div class="row mb-30 align-items-center">
                <div class="col-md-6 col-custom">
                    <div class="collection-content">
                        <div class="section-title text-left">
                            <span class="section-title-1">XByte</span>
                            <h3 class="section-title-3 pb-0">High-Quality</h3>
                        </div>
                        <div class="desc-content">
                            <p>Discover top-quality tech at Xbyte. Curated from renowned brands, our collection offers cutting-edge products that guarantee excellence and reliability. Elevate your tech journey with us today.</p>
                        </div>
                        <a href="shop.html" class="btn flosun-button secondary-btn rounded-0">Shop Collection</a>
                    </div>
                </div>
                <div class="col-md-6 col-custom">
                    <!--Single Banner Area Start-->
                    <div class="single-banner hover-style">
                        <div class="banner-img">
                            <a href="#">
                                <img src="assets/images/about/2.jpg" alt="About Image">
                                <div class="overlay-1"></div>
                            </a>
                        </div>
                    </div>
                    <!--Single Banner Area End-->
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-md-6 col-custom order-2 order-md-1">
                    <!--Single Banner Area Start-->
                    <div class="single-banner hover-style">
                        <div class="banner-img">
                            <a href="#">
                                <img src="assets/images/about/2.jpg" alt="About Image">
                                <div class="overlay-1"></div>
                            </a>
                        </div>
                    </div>
                    <!--Single Banner Area End-->
                </div>
                <div class="col-md-6 col-custom order-1 order-md-2">
                    <div class="collection-content">
                        <div class="section-title text-left">
                            <span class="section-title-1">XByte</span>
                            <h3 class="section-title-3 pb-0">Best Pricing</h3>
                        </div>
                        <div class="desc-content">
                            <p>At Xbyte, find unbeatable prices for top-quality tech. Our curated collection offers the best deals in the market. Shop with us and save on your tech needs.</p>
                        </div>
                        <a href="shop.html" class="btn flosun-button secondary-btn rounded-0">Shop Collection</a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- Team Member Area Start Here -->
    <div class="team-member-wrapper mt-text-3">
        <div class="container custom-area">
            <div class="row">
                <div class="col-lg-12 col-custom">
                    <div class="section-title text-center">
                        <span class="section-title-1">XByte</span>
                        <h2 class="section-title-2">Our Team</h2>
                    </div>
                </div>
            </div>
            <div class="row ht-team-member-style-two pt-40">
                <div class="col-lg-4 col-md-4 col-custom">
                    <div class="grid-item">
                        <div class="ht-team-member">
                            <div class="team-image">
                                <img class="img-fluid" src="assets/images/team/2.jpg" alt="">
                                <div class="social-networks">
                                    <div class="inner">
                                        <a href="https://www.instagram.com/abdou_omeiri_/"><i class="fa fa-instagram"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-info text-center">
                                <h5 class="name">OMEIRI ABDELLAH </h5>
                                <div class="position">FOUNDER AND MANAGER</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team Member Area End Here -->
    <!-- Brand Logo Area Start Here -->
    <div class="brand-logo-area gray-bg pt-no-text pb-no-text mt-text-5">
        <div class="container custom-area">
            <div class="row">
                <div class="col-12 col-custom">
                    <div class="brand-logo-carousel swiper-container intro11-carousel-wrap arrow-style-3">
                        <div class="swiper-wrapper">
                            <div class="single-brand swiper-slide" >
                                <a href="#">
                                    <img src="assets/images/brand/1.png" alt="Brand Logo">
                                </a>
                            </div>
                            <div class="single-brand swiper-slide" style="height: 120px;padding-left: 45px;">
                                <a href="#">
                                    <img src="assets/images/brand/2.png" alt="Brand Logo" style="height: 100px;">
                                </a>
                            </div>
                            <div class="single-brand swiper-slide">
                                <a href="#">
                                    <img src="assets/images/brand/3.png" alt="Brand Logo">
                                </a>
                            </div>
                            <div class="single-brand swiper-slide">
                                <a href="#">
                                    <img src="assets/images/brand/4.png" alt="Brand Logo">
                                </a>
                            </div>
                            <div class="single-brand swiper-slide" style="height: 120px;padding-left: 45px;">
                                <a href="#">
                                    <img src="assets/images/brand/5.png" alt="Brand Logo" style="height: 100px;">
                                </a>
                            </div>
                        </div>
                        <!-- Slider Navigation -->
                        <div class="home1-slider-prev swiper-button-prev main-slider-nav"><i class="lnr lnr-arrow-left"></i></div>
                        <div class="home1-slider-next swiper-button-next main-slider-nav"><i class="lnr lnr-arrow-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Brand Logo Area End Here -->
    <?php require 'footer.php'; ?>

    <!-- Scroll to Top Start -->
    <a class="scroll-to-top" href="#">
        <i class="lnr lnr-arrow-up"></i>
    </a>
    <!-- Scroll to Top End -->

    <!-- JS
============================================ -->

    <!-- jQuery JS -->
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <!-- jQuery Migrate JS -->
    <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <!-- Modernizer JS -->
    <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="assets/js/vendor/bootstrap.bundle.min.js"></script>

    <!-- Swiper Slider JS -->
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <!-- nice select JS -->
    <script src="assets/js/plugins/nice-select.min.js"></script>
    <!-- Ajaxchimpt js -->
    <script src="assets/js/plugins/jquery.ajaxchimp.min.js"></script>
    <!-- Jquery Ui js -->
    <script src="assets/js/plugins/jquery-ui.min.js"></script>
    <!-- Jquery Countdown js -->
    <script src="assets/js/plugins/jquery.countdown.min.js"></script>
    <!-- jquery magnific popup js -->
    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>

    <!-- Main JS -->
    <script src="assets/js/main.js"></script>


</body>


<!-- Mirrored from htmldemo.net/flosun/flosun/about-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:31 GMT -->
</html>