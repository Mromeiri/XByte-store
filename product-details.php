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


?><!doctype html>
<html class="no-js" lang="en">


<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Product Details</title>
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
    <script async defer crossorigin="anonymous" 
        src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v12.0" 
        nonce="oTJTkx9S"></script>
        <style>
            .flosun-button.button-icon.dark-btn {
  background: #012030;
  color: #ffffff;
  border-radius: 0%;
}
.flosun-button.secondary-btn.secondary-border {
    border: 2px solid #012030;
    color: #012030;
}
.single-product-main-area .nav-tabs .nav-item .nav-link.active {
    background-color: #45C4B0;
    border-color: #45C4B0;
}
.single-product-main-area .nav-tabs .nav-item .nav-link {
    color: #ffffff;
    background-color: #012030;
    
    border-color: #012030;
}
.single-product-main-area .nav-tabs .nav-item .nav-link:hover {
  background-color: #45C4B0;
  border-color: #45C4B0;
}

.single-product-main-area .nav-tabs .nav-item .nav-link.active {
  background-color: #45C4B0;
  border-color: #45C4B0;
}
a:hover {
  color: #45C4B0;
}
        </style>

</head>

<body>
<?php 
    require 'header.php'; 
    
    
 
    $sql = "select * from item where id=:id";
    $stmt =$pdo->prepare($sql);
    $stmt->execute(["id"=>$_GET['id']]);
    
    while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
    $_SESSION['productdetail']=$row['id'];   ?>
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Product Details</h3>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Product Details</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Single Product Main Area Start -->
    <div class="single-product-main-area">
        <div class="container container-default custom-area">
            <div class="row">
                <div class="col-lg-5 offset-lg-0 col-md-8 offset-md-2 col-custom">
                    <div class="product-details-img">
                        <div class="single-product-img swiper-container gallery-top popup-gallery">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <a class="w-100" href="<?php echo $row['src1']; ?>">
                                        <img class="w-100" src="<?php echo $row['src1']; ?>" alt="Product">
                                    </a>
                                </div>
                                <div class="swiper-slide">
                                    <a class="w-100" href="<?php echo $row['src2']; ?>">
                                        <img class="w-100" src="<?php echo $row['src2']; ?>" alt="Product">
                                    </a>
                                </div>
                                <?php if ($row['src3']) {?>
                                  <div class="swiper-slide">
                                    <a class="w-100" href="<?php echo $row['src3'] ?>">
                                        <img class="w-100" src="<?php echo $row['src3'] ?>" alt="Product">
                                    </a>
                                </div>
                                <?php } if ($row['src4']) {?>
                                <div class="swiper-slide">
                                    <a class="w-100" href="<?php echo $row['src4'] ?>">
                                        <img class="w-100" src="<?php echo $row['src4'] ?>" alt="Product">
                                    </a>
                                </div>  
                               <?php } ?>
                                
                            </div>
                        </div>
                        <div class="single-product-thumb swiper-container gallery-thumbs">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="<?php echo $row['src1']; ?>" alt="Product">
                                </div>
                                <div class="swiper-slide">
                                    <img src="<?php echo $row['src2']; ?>" alt="Product">
                                </div>
                                <?php if ($row['src3']) {?>
                                <div class="swiper-slide">
                                    <img src="<?php echo $row['src3'] ?>" alt="Product">
                                </div>
                                <?php } if ($row['src4']) {?>
                                <div class="swiper-slide">
                                    <img src="<?php echo $row['src4'] ?>" alt="Product">
                                </div>
                                <?php } ?>
                            </div>
                            <!-- Add Arrows -->
                            <div class="swiper-button-next swiper-button-white"><i class="lnr lnr-arrow-right"></i></div>
                            <div class="swiper-button-prev swiper-button-white"><i class="lnr lnr-arrow-left"></i></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-custom">
                    <div class="product-summery position-relative">
                        <div class="product-head mb-3">
                            <h2 class="product-title"><?php echo $row['name']; ?></h2>
                        </div>
                        <div class="price-box mb-2">
                        <?php
                                        $sql = "select price from price group by valid_from having valid_from IN ( select max(valid_from) from price where product_id=:id);";
                                        $st =$pdo->prepare($sql);
                                        $st->execute(["id"=>$row['id']]);
                                    
		                                while ($ro =$st->fetch(pdo::FETCH_ASSOC)) { ?>
                                            <span class="regular-price "><?php echo formatNumberWithSpaces($ro['price']) ?> DA</span>
                                            <?php } ?>
                        </div>
                        <div class="product-rating">
                                        <?php $y=$row['ratting']; for ($i=1; $i < 6; $i++) { 
                                                if ($i<=$y) { ?>
                                                    <i class="fa fa-star"></i>
                                              <?php  }else{ ?>
                                              <i class="fa fa-star-o"></i>
                                           <?php }} ?>
                                        </div>
                        <div class="sku mb-3">
                            <span>ref: <?php echo $row['id']; ?></span>
                        </div>
                        <h3 class="product-title">Specs :</h2>
                        <?php

// Split the string into an array based on comma
$items = explode(',', $row['Specs']);

// Create <li> elements for each item
$listItems = '';
foreach ($items as $item) {
    $listItems .= '<li>' . $item . '</li>';
}
?>

<!-- Output the list of items as an unordered list (UL) -->
<ul style="list-style: circle;margin-left:15px;margin-bottom:15px">
    <?php echo $listItems; ?>
</ul></div>

                        <div class="quantity-with_btn mb-5">
                            <div class="add-to_cart">
                                <a class="btn product-cart button-icon flosun-button dark-btn" href="addtocart?w=1&id=<?php echo $row['id']; ?>&current_url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">Add to cart</a>
                                <a class="btn flosun-button secondary-btn secondary-border rounded-0" href="wishlist.html">Add to wishlist</a>
                            </div>
                        </div>
                        <div class="social-share mb-4">
                            <span>Share :</span>
                          
                            <a href=""><i class="fa fa-facebook-square facebook-color"></i></a>
                            <a href="#"><i class="fa fa-twitter-square twitter-color"></i></a>
                            <a href="#"><i class="fa fa-linkedin-square linkedin-color"></i></a>
                            <a href="#"><i class="fa fa-pinterest-square pinterest-color"></i></a>
                        </div>
                        <div class="payment">
                            <a href="addtocart?id=<?php echo $row['id']; ?>"><img class="border" src="assets/images/payment/payment-icon.png" alt="Payment"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-no-text">
                <div class="col-lg-12 col-custom">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active text-uppercase" id="home-tab" data-bs-toggle="tab" href="#connect-1" role="tab" aria-selected="true">Description</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" id="profile-tab" data-bs-toggle="tab" href="#connect-2" role="tab" aria-selected="false">Reviews</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-uppercase" id="contact-tab" data-bs-toggle="tab" href="#connect-3" role="tab" aria-selected="false">Shipping Policy</a>
                        </li>
                    </ul>
                    <div class="tab-content mb-text" id="myTabContent">
                        <div class="tab-pane fade show active" id="connect-1" role="tabpanel" aria-labelledby="home-tab">
                            <div class="desc-content">
                                <p class="mb-3"><?php echo $row['description']; ?></p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="connect-2" role="tabpanel" aria-labelledby="profile-tab">
                            <!-- Start Single Content -->
                            <div class="product_tab_content  border p-3">
                                <div class="rating_wrap">
                                    <h3 class="rating-title-1 font-weight-bold mb-2">Add a review </h5>
                                    <p class="mb-2">Your email address will not be published. Required fields are marked *</p>
                                </div>
                                <!-- End RAting Area -->
                                <div class="comments-area comments-reply-area">
                                    <div class="row">
                                        <div class="col-lg-12 col-custom">
                                            <form action="addreview" class="comment-form-area" method="POST">
                                                <div class="row comment-input">
                                                    <div class="col-md-6 col-custom comment-form-author mb-3">
                                                        <label>Name <span class="required">*</span></label>
                                                        <input type="text" required="required" name="name" required>
                                                    </div>
                                                    <div class="col-md-6 col-custom comment-form-emai mb-3">
                                                        <label>Email <span class="required">*</span></label>
                                                        <input type="email" required="required" name="email" required>
                                                    </div>
                                                </div>
                                                <div class="comment-form-comment mb-3">
                                                    <label>Comment</label>
                                                    <textarea class="comment-notes" required="required" name="comment"></textarea>
                                                </div>
                                                <div class="comment-form-submit">
                                                    <button class="btn flosun-button secondary-btn rounded-0">Submit</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Single Content -->
                        </div>
                        <div class="tab-pane fade" id="connect-3" role="tabpanel" aria-labelledby="contact-tab">
                            <div class="shipping-policy">
                                <h4 class="title-3 mb-4">Shipping policy</h4>
                                <p class="desc-content mb-2">We offer standard shipping for all orders. Shipping charges will be displayed at checkout before you complete your purchase. Most orders are processed in the same day, and delivery times may vary. Once your order is shipped, you will receive a tracking number to track your package. We currently only offer shipping within [Algeria]. For any questions, please contact our customer support. Thank you for choosing us for your shopping needs!</p>
                                <h4 class="title-3 mb-4" style="direction: rtl;">سياسة الشحن</h4>
                                <p class="desc-content mb-2" style="direction: rtl;font-size:16px">نقدم خدمة الشحن القياسية لجميع الطلبات. ستتم عرض تكاليف الشحن عند الدفع قبل إتمام عملية الشراء. يتم معالجة معظم الطلبات في نفس اليوم ، وقد تختلف أوقات التوصيل. بمجرد شحن طلبك، ستتلقى رقم تتبع يمكنك استخدامه لتتبع الحالة الحالية لطردك. حالياً نقدم خدمة الشحن داخل [الجزائر]. إذا كان لديك أي استفسارات، يُرجى التواصل مع فريق دعم العملاء. نشكركم على اختيارنا لتلبية احتياجاتكم التسوقية!.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
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
                                            <h4 class="title-2"> <a href="product-details.html"><?php echo $row['name'] ?></a></h4>
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
                                            <span class="old-price"><del>90 000 DA</del></span>
                                        </div>
                                        <a href="addtocart?id=<?php echo $row['id']; ?>&current_url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" class="btn product-cart">Add to Cart</a>
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
                                                <a class="btn product-cart button-icon flosun-button dark-btn" href="addtocart?id=<?php echo $row['id']; ?>&current_url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">Add to cart</a>
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


<!-- Mirrored from htmldemo.net/flosun/flosun/product-details.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:25 GMT -->
</html>