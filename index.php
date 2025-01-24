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
$_GET['login']=urlencode($_SERVER['REQUEST_URI']);
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


<head>
<link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/xbyte-website-favicon-color.png">
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>XByte</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/xbyte-website-favicon-color.png">

    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/vendor/font.awesome.min.css">
    <link rel="stylesheet" href="assets/css/vendor/linearicons.min.css">
    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="assets/css/plugins/animate.min.css">
    <link rel="stylesheet" href="assets/css/plugins/jquery-ui.min.css">
    <link rel="stylesheet" href="assets/css/plugins/nice-select.min.css">
  
    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css">

    
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        .intro11-slider-wrap .swiper-pagination-bullet.swiper-pagination-bullet-active {
  background: #DAFDBA;
  border-color: #DAFDBA;
}

.intro11-slider-wrap .swiper-pagination-bullet:hover {
  background: #DAFDBA;
  border-color: #DAFDBA;
}
    </style>

</head>
<body>
    

    <header class="main-header-area">
         <div class="main-header header-transparent header-sticky"> 
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-xl-2 col-md-6 col-6 col-custom">
                        <div class="header-logo d-flex align-items-center">
                            <a href="index">
                                <img class="img-full" src="assets/images/logo/xbyte-high-resolution-logo-color-on-transparent-background.png" alt="Header Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 d-none d-lg-flex justify-content-center col-custom">
                        <nav class="main-nav d-none d-lg-flex">
                            <ul class="nav">
                                <li>
                                    <a class="active" href="index">
                                        <span class="menu-text"> Home</span>
                                    </a>
                                </li>
                                
                                <li>
                                    <a href="shop">
                                        <span class="menu-text">Shop</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <div class="mega-menu dropdown-hover">
                                        <div class="menu-colum">
                                            <ul>
                                                <li><span class="mega-menu-text">DeskTops</span></li>
                                                <li><a href="shop_2?search=cpu">CPUs</a></li>
                                                <li><a href="shop_2?search=gpu">GPUs</a></li>
                                                <li><a href="shop_2?search=ssd">SSD</a></li>
                                                <li><a href="shop_2?search=ram">RAM</a></li>
                                                <li><a href="shop_2?search=board">MOTHER BOARDs</a></li>
                                                <li><a href="shop_2?search=monitor">MONITORs</a></li>

                                            </ul>
                                        </div>
                                        <div class="menu-colum">
                                            <ul>
                                                <li><span class="mega-menu-text">Laptops</span></li>
                                                <li><a href="shop_2?search=hp">HP</a></li>
                                                <li><a href="shop_2?search=lenovo">Lenovo</a></li>
                                                <li><a href="shop_2?search=asus">ASUS</a></li>
                                                <li><a href="shop_2?search=acer">ACER</a></li>
                                                <li><a href="shop_2?search=msi">MSI</a></li>
                                                <li><a href="shop_2?search=dell">DELL</a></li>
                                            </ul>
                                        </div>
                                        <div class="menu-colum">
                                            <ul>
                                                <li><span class="mega-menu-text">accessories</span></li>
                                                <li><a href="shop_2?search=mouse">MOUSE</a></li>
                                                <li><a href="shop_2?search=keyboard">KEYBOARD</a></li>
                                                <li><a href="shop_2?search=headset">HEADSET</a></li>
                                                <li><a href="shop_2?search=controller">CONTROLLER</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="menu-text"> Pages</span>
                                        <i class="fa fa-angle-down"></i>
                                    </a>
                                    <ul class="dropdown-submenu dropdown-hover">
                                        <li><a href="contact-us">Contact</a></li>
                                        <li><a href="my-account">My Account</a></li>
                                        <li><a href="frequently-questions">FAQ</a></li>
                                        <li><a href="login">Login</a></li>
                                        <li><a href="register">Register</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="about-us">
                                        <span class="menu-text"> About Us</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="contact-us">
                                        <span class="menu-text">Contact Us</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-lg-2 col-md-6 col-6 col-custom">
                        <div class="header-right-area main-nav">
                            <ul class="nav">
                            <!-- <li class="user-wrap">
                                <?php if (isset($_SESSION['mywebsiteanduwontknow'])) {}?>
                                    <a href="sign/deconect.php"><i class="fa fa-user"></i> </a>
                                </li> -->
                                

                                <?php require 'minicart.php'; ?>
                                <li class="sidemenu-wrap">
                                    <a href="#"><i class="fa fa-search"></i> </a>
                                    <ul class="dropdown-sidemenu dropdown-hover-2 dropdown-search">
                                        <li>
                                            <form action="shop_2">
                                                <input name="search" id="search" placeholder="Search" type="text">
                                                <button type="submit"><i class="fa fa-search"></i></button>
                                            </form>
                                        </li>
                                    </ul>
                                </li>
                                <li class="account-menu-wrap d-none d-lg-flex">
                                    <a href="#" class="off-canvas-menu-btn">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </li>
                                <li class="mobile-menu-btn d-lg-none">
                                    <a class="off-canvas-btn" href="#">
                                        <i class="fa fa-bars"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
             </div> 
        </div>
        <aside class="off-canvas-wrapper" id="mobileMenu">
            <div class="off-canvas-overlay"></div>
            <div class="off-canvas-inner-content">
                <div class="btn-close-off-canvas">
                    <i class="fa fa-times"></i>
                </div>
                <div class="off-canvas-inner">
                    <div class="search-box-offcanvas">
                        <form action="shop_2">
                            <input type="text" placeholder="Search product..." name="search">
                            <button class="search-btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="mobile-navigation">
                        <nav>
                            <ul class="mobile-menu">
                                <li class="menu-item-has-children"><a href="index">Home</a>
                                </li>
                                <li class="menu-item-has-children"><a href="#">Shop</a>
                                    <ul class="megamenu dropdown">
                                        <li class="mega-title has-children"><a href="#">DeskTops</a>
                                            <ul class="dropdown">
                                                <li><a href="shop_2?search=cpu">CPUs</a></li>
                                                <li><a href="shop_2?search=gpu">GPUs</a></li>
                                                <li><a href="shop_2?search=ssd">SSD</a></li>
                                                <li><a href="shop_2?search=ram">RAM</a></li>
                                                <li><a href="shop_2?search=board">MOTHER BOARDs</a></li>
                                                <li><a href="shop_2?search=monitor">MONITORs</a></li>
                                            </ul>
                                        </li>
                                        <li class="mega-title has-children"><a href="#">Laptops</a>
                                            <ul class="dropdown">
                                            <li><a href="shop_2?search=hp">HP</a></li>
                                                <li><a href="shop_2?search=lenovo">Lenovo</a></li>
                                                <li><a href="shop_2?search=asus">ASUS</a></li>
                                                <li><a href="shop_2?search=acer">ACER</a></li>
                                                <li><a href="shop_2?search=msi">MSI</a></li>
                                                <li><a href="shop_2?search=dell">DELL</a></li>
                                            </ul>
                                        </li>
                                        <li class="mega-title has-children"><a href="#">accessories</a>
                                            <ul class="dropdown">
                                            <li><a href="shop_2?search=mouse">MOUSE</a></li>
                                                <li><a href="shop_2?search=keyboard">KEYBOARD</a></li>
                                                <li><a href="shop_2?search=headset">HEADSET</a></li>
                                                <li><a href="shop_2?search=controller">CONTROLLER</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children "><a href="#">Pages</a>
                                    <ul class="dropdown">
                                        <li><a href="frequently-questions">FAQ</a></li>
                                        <li><a href="my-account">My Account</a></li>
                                        <li><a href="login">Login</a></li>
                                        <li><a href="register">Register</a></li>
                                    </ul>
                                </li>
                                <li><a href="about-us">About Us</a></li>
                                <li><a href="contact-us">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="offcanvas-widget-area">
                        <div class="switcher">
                            <div class="language">
                                <span class="switcher-title">Language: </span>
                                <div class="switcher-menu">
                                    <ul>
                                        <li><a href="#">English</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="currency">
                                <span class="switcher-title">Currency: </span>
                                <div class="switcher-menu">
                                    <ul>
                                        <li><a href="">DZA</a>
                                            <ul class="switcher-dropdown">
                                                <li><a href=""> DA</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="top-info-wrap text-left text-black">
                            <ul class="address-info">
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <a href="">0657 27 19 42</a>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <a href="">omeiri.abdellah@gmail.com</a>
                                </li>
                                <li>
                                    <a class="instagram-color-bg" title="instagram" href="https://www.instagram.com/xbyte.store/"><i class="fa fa-instagram"></i>Xbyte.store</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </aside>
        <aside class="off-canvas-menu-wrapper" id="sideMenu">
            <div class="off-canvas-overlay"></div>
            <div class="off-canvas-inner-content">
                <div class="off-canvas-inner">
                    <div class="btn-close-off-canvas">
                        <i class="fa fa-times"></i>
                    </div>
                    <div class="offcanvas-widget-area">
                        <ul class="menu-top-menu">
                            <li><a href="about-us">About Us</a></li>
                        </ul>
                        <p class="desc-content">Experience Tech Confidence: Explore Xbyte's Trusted Collection of High-Quality Products.</p>
                        <div class="switcher">
                            <div class="language">
                                <span class="switcher-title">Language: </span>
                                <div class="switcher-menu">
                                    <ul>
                                        <li>English
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="currency">
                                <span class="switcher-title">Currency: </span>
                                <div class="switcher-menu">
                                    <ul>
                                        <li>DZA</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="top-info-wrap text-left text-black">
                            <ul class="address-info">
                                <li>
                                    <i class="fa fa-phone"></i>
                                    <a href="">0657 27 19 42</a>
                                </li>
                                <li>
                                    <i class="fa fa-envelope"></i>
                                    <a href="">omeiri.abdellah@gmail.com</a>
                                </li>
                                <li>
                                    <a class="instagram-color-bg" title="instagram" href="https://www.instagram.com/xbyte.store/"><i class="fa fa-instagram"></i>Xbyte.store</a>

                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- offcanvas widget area end -->
                </div>
            </div>
        </aside>
        <!-- off-canvas menu end -->
    </header>
    <!-- Header Area End Here -->
    <!-- Slider/Intro Section Start -->
    <div class="intro11-slider-wrap section">
        <div class="intro11-slider swiper-container">
            <div class="swiper-wrapper">
                <div class="intro11-section swiper-slide slide-1 slide-bg-1 bg-position">
                    <!-- Intro Content Start -->
                    <div class="intro11-content text-left">
                        <h2 class="title">Bytes of Brilliance</h2>
                        <p class="desc-content">Your Tech Shopping Destination: Unmatched Variety, Unbeatable Deals </p>
                        <a href="shop" class="btn flosun-button secondary-btn theme-color  rounded-0">Shop Now</a>
                    </div>
                    <!-- Intro Content End -->
                </div>
                <div class="intro11-section swiper-slide slide-2 slide-bg-1 bg-position">
                    <!-- Intro Content Start -->
                    <div class="intro11-content text-left">
                        <h3 class="title-slider black-slider-title text-uppercase">Collection</h3>
                        <h2 class="title" style="font-size: 40px;line-height: 40px;">Bytes of Brilliance</h2>
                        <p class="desc-content">Level Up Your Gaming: Unmatched Computer Collection for the Best Experience </p>
                        <a href="shop" class="btn flosun-button secondary-btn rounded-0">Shop Now</a>
                    </div>
                    <!-- Intro Content End -->
                </div>
            </div>
            <!-- Slider Navigation -->
            <div class="home1-slider-prev swiper-button-prev main-slider-nav"><i class="lnr lnr-arrow-left"></i></div>
            <div class="home1-slider-next swiper-button-next main-slider-nav"><i class="lnr lnr-arrow-right"></i></div>
            <!-- Slider pagination -->
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <!-- Slider/Intro Section End -->
    <!--Categories Area Start-->
    <div class="categories-area pt-40">
        <div class="col-12 col-custom">
            <div class="section-title text-center mb-30">
                <span class="section-title-1">Xbyte</span>
                <h3 class="section-title-3">Our Product</h3>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="cat-1 col-md-4 col-sm-12 col-custom">
                    <div class="categories-img mb-30">
                        <a href="shop_2?search=monitor"><img src="assets/images/category/2.webp" alt=""></a>
                        <div class="categories-content">
                            <h3>Monitors</h3>
                            <?php
                    $stmt = $pdo ->query("SELECT count(*) FROM item where category='monitor' ;");
		            while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) { ?>
                                    <h4><?php echo $row['count(*)']; ?> ITEMS</h4>
                    <?php } ?>
                        </div>
                    </div>
                </div>
                <div class="cat-2 col-md-8 col-sm-12 col-custom">
                    <div class="row">
                        <div class="cat-3 col-md-7 col-custom">
                            <div class="categories-img mb-30">
                                <a href="shop_2?search=accessory"><img src="assets/images/category/1.webp " alt=""></a>
                                <div class="categories-content">
                                    <h3>computer accessory</h3>
                                    <?php
                    $stmt = $pdo ->query("SELECT count(*) FROM item where category='accessory' ;");
		            while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) { ?>
                                    <h4><?php echo $row['count(*)']; ?> ITEMS</h4>
                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="cat-4 col-md-5 col-custom">
                            <div class="categories-img mb-30">
                                <a href="shop_2?search=pc"><img src="assets/images/category/2.jpg" alt=""></a>
                                <div class="categories-content">
                                    <h3>Laptop</h3>
                                    <?php
                    $stmt = $pdo ->query("SELECT count(*) FROM item where category='pc' ;");
		            while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) { ?>
                                    <h4><?php echo $row['count(*)']; ?> ITEMS</h4>
                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="cat-5 col-md-4 col-custom">
                            <div class="categories-img mb-30">
                                <a href="shop_2?search=desktop"><img src="assets/images/category/4.webp" alt=""></a>
                                <div class="categories-content">
                                    <h3>Pc Built </h3>
                                    <?php
                    $stmt = $pdo ->query("SELECT count(*) FROM item where category='desktop' ;");
		            while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) { ?>
                                    <h4><?php echo $row['count(*)']; ?> ITEMS</h4>
                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="cat-6 col-md-8 col-custom">
                            <div class="categories-img mb-30">
                                <a href="shop_2?search=composant"><img src="assets/images/category/1.avif" alt=""></a>
                                <div class="categories-content">
                                    <h3>composant pc</h3>
                                    <?php
                    $stmt = $pdo ->query("SELECT count(*) FROM item where category='composant' ;");
		            while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) { ?>
                                    <h4><?php echo $row['count(*)']; ?> ITEMS</h4>
                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Categories Area End-->
    <!--Product Area Start-->
    <div class="product-area mt-text-2">
        <div class="container custom-area-2 overflow-hidden">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12 col-custom">
                    <div class="section-title text-center mb-30">
                        <span class="section-title-1">Xbyte</span>
                        <h3 class="section-title-3">Special Offers</h3>
                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row product-row">
                <div class="col-12 col-custom">
                    <div class="product-slider swiper-container anime-element-multi">
                        <div class="swiper-wrapper">
                        <?php
                    $stmt = $pdo ->query("SELECT * FROM item limit 4 ;");
		            while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) { ?>
                            <div class="single-item swiper-slide">
                                <!--Single Product Start-->
                                <div class="single-product position-relative mb-30">
                                    <div class="product-image" style="height: 218px;">
                                        <a class="d-block" href="product-details?id=<?php echo $row['id']; ?>">
                                            <img src="<?php echo $row['src1'] ?>" alt="" class="product-image-1" style="height:100%;width:100%">
                                            <img src="<?php echo $row['src2'] ?>" alt="" class="product-image-2 position-absolute" style="height:100%;width:100%">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="product-details?id=<?php echo $row['id']; ?>"><?php echo $row['name'] ?></a></h4>
                                        </div>
                                        <div class="product-rating">
                                        <?php $y=$row['ratting']; for ($i=1; $i < 6; $i++) { 
                                                if ($i<=$y) { ?>
                                                    <i class="fa fa-star"></i>
                                              <?php  }else{ ?>
                                              <i class="fa fa-star-o"></i>
                                           <?php }} ?>
                                        </div>
                                        <div class="price-box">
                                        <?php
                                        $sql = "select price from price group by valid_from having valid_from IN ( select max(valid_from) from price where product_id=:id);";
                                        $st =$pdo->prepare($sql);
                                        $st->execute(["id"=>$row['id']]);
                                    
		                                while ($ro =$st->fetch(pdo::FETCH_ASSOC)) { ?>
                                            <span class="regular-price "><?php echo formatNumberWithSpaces($ro['price']) ?> DA</span>
                                            <?php } ?>
                                            
                                        </div>
                                        <a href="addtocart?w=1&id=<?php echo $row['id']; ?>&current_url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" class="btn product-cart">Add to Cart</a>
                                    </div>
                                </div>
                                <!--Single Product End-->
                                <!--Single Product End-->
                            </div>
                            <?php } ?>
                           
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!--Product Area End-->
    <!-- Product Countdown Area Start Here -->
    <div class="product-countdown-area mt-text-3">
        <div class="container custom-area">
            <div class="row">
                <!--Section Title Start-->
                <div class="col-12 col-custom">
                    <div class="section-title text-center mb-30">
                        <h3 class="section-title-3">Deal of The Day</h3>
                    </div>
                </div>
                <!--Section Title End-->
            </div>
            <div class="row">
                <!--Countdown Start-->
                <div class="col-12 col-custom">
                    <div class="countdown-area">
                        <div class="countdown-wrapper d-flex justify-content-center" data-countdown="2022/12/24"></div>
                    </div>
                </div>
                <!--Countdown End-->
            </div>
            <div class="row product-row">
                <div class="col-12 col-custom">
                    <div class="item-carousel-2 swiper-container anime-element-multi product-area">
                        <div class="swiper-wrapper">
                            
                            
                            
                            <div class="single-item swiper-slide">
                                <!--Single Product Start-->
                                <div class="single-product position-relative mb-30">
                                    <div class="product-image">
                                        <a class="d-block" href="product-details.html">
                                            <img src="assets/images/product/3.jpg" alt="" class="product-image-1 w-100">
                                            <img src="assets/images/product/4.jpg" alt="" class="product-image-2 position-absolute w-100">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="product-details.html"></a></h4>
                                        </div>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">$80.00</span>
                                            <span class="old-price"><del>$90.00</del></span>
                                        </div>
                                        <a href="cart.php" class="btn product-cart">Add to Cart</a>
                                    </div>
                                </div>
                                <!--Single Product End-->
                            </div>
                            <div class="single-item swiper-slide">
                                <!--Single Product Start-->
                                <div class="single-product position-relative mb-30">
                                    <div class="product-image">
                                        <a class="d-block" href="product-details.html">
                                            <img src="assets/images/product/.jpg" alt="" class="product-image-1 w-100">
                                            <img src="assets/images/product/.jpg" alt="" class="product-image-2 position-absolute w-100">
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title-2"> <a href="product-details.html">Rose bouquet white</a></h4>
                                        </div>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">$80.00</span>
                                            <span class="old-price"><del>$90.00</del></span>
                                        </div>
                                        <a href="cart.php" class="btn product-cart">Add to Cart</a>
                                    </div>
                                </div>
                                <!--Single Product End-->
                            </div>
                        </div>
                        <!-- Slider pagination -->
                        <div class="swiper-pagination default-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="banner-area mt-text-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="section-title text-center mb-30">
                        <span class="section-title-1" id="ourservice">XByte</span>
                        <h2 class="section-title-large" >Our Services</h2>
                    </div>
                </div>
                <div class="col-md-4 col-custom">
                    <!--Single Banner Area Start-->
                    <div class="single-banner hover-style mb-30">
                        <div class="banner-img">
                            <a href="#">
                                <img src="assets/images/banner/1.avif" alt="">
                                <div class="overlay-1"></div>
                            </a>
                        </div>
                    </div>
                    <!--Single Banner Area End-->
                </div>
                <div class="col-md-4 col-custom">
                    <!--Single Banner Area Start-->
                    <div class="single-banner hover-style mb-30">
                        <div class="banner-img">
                            <a href="#">
                                <img src="assets/images/banner/1.png" alt="">
                                <div class="overlay-1"></div>
                            </a>
                        </div>
                    </div>
                    <!--Single Banner Area End-->
                </div>
                <div class="col-md-4 col-custom">
                    <!--Single Banner Area Start-->
                    <div class="single-banner hover-style mb-30">
                        <div class="banner-img">
                            <a href="#">
                                <img src="assets/images/banner/1-3.jpg" alt="">
                                <div class="overlay-1"></div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

    <!-- Modal -->
    <div class="modal flosun-modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close close-button" data-bs-dismiss="modal" aria-label="Close">
                    <span class="close-icon" aria-hidden="true">x</span>
                </button>
                <div class="modal-body">
                    <div class="container-fluid custom-area">
                        <div class="row">
                            <div class="col-md-6 col-custom">
                                <div class="modal-product-img">
                                    <a class="w-100" href="#">
                                        <img class="w-100" src="assets/images/product/large-size/1.jpg" alt="Product">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-custom">
                                <div class="modal-product">
                                    <div class="product-content">
                                        <div class="product-title">
                                            <h4 class="title">Product dummy name</h4>
                                        </div>
                                        <div class="price-box">
                                            <span class="regular-price ">$80.00</span>
                                            <span class="old-price"><del>$90.00</del></span>
                                        </div>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                            <i class="fa fa-star-o"></i>
                                            <span>1 Review</span>
                                        </div>
                                        <p class="desc-content">we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee the pain and trouble that are bound to ensue; and equal blame bel...</p>
                                        <form class="d-flex flex-column w-100" action="#">
                                            <div class="form-group">
                                                <select class="form-control nice-select w-100">
                                                    <option>S</option>
                                                    <option>M</option>
                                                    <option>L</option>
                                                    <option>XL</option>
                                                    <option>XXL</option>
                                                </select>
                                            </div>
                                        </form>
                                        <div class="quantity-with-btn">
                                            <div class="quantity">
                                                <div class="cart-plus-minus">
                                                    <input class="cart-plus-minus-box" value="0" type="text">
                                                    <div class="dec qtybutton">-</div>
                                                    <div class="inc qtybutton">+</div>
                                                    <div class="dec qtybutton"><i class="fa fa-minus"></i></div>
                                                    <div class="inc qtybutton"><i class="fa fa-plus"></i></div>
                                                </div>
                                            </div>
                                            <div class="add-to_btn">
                                                <a class="btn product-cart button-icon flosun-button dark-btn" href="cart">Add to cart</a>
                                                <a class="btn flosun-button secondary-btn rounded-0" href="wishlist.html">Add to wishlist</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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


</html>