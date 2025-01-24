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


<!-- Mirrored from htmldemo.net/flosun/flosun/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:17 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>SHOP</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/xbyte-website-favicon-color.png">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

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
    <style>
        input[type="checkbox"]:checked + label:before {
  border: 1px solid #45C4B0;
}
    </style>
<script>
    // Wait for the document to be ready
    $(document).ready(function() {
        // Listen for the change event on the select element
        $('#mySelect').on('change', function() {
            // Submit the form when an option is selected
            $('#myForm').submit();
        });
    });
</script>
</head>

<body>

 

    <?php require 'header.php'; ?>
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Shop Sidebar</h3>
                        <ul>
                            <li><a href="index">Home</a></li>
                            <li>Shop</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Shop Main Area Start Here -->
    <div class="shop-main-area">
        <div class="container container-default custom-area">
            <div class="row flex-row-reverse">
                <div class="col-lg-9 col-12 col-custom widget-mt">
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper mb-30">
                        <div class="shop_toolbar_btn">
                            <button data-role="grid_3" type="button" class="active btn-grid-3" title="Grid"><i class="fa fa-th"></i></button>
                            <button data-role="grid_list" type="button" class="btn-list" title="List"><i class="fa fa-th-list"></i></button>
                        </div>
                        <div class="shop-select">
                            <form class="d-flex flex-column w-100" action="shop_2" id="myForm">
                                <div class="form-group">
                                <select class="form-control nice-select w-100" id="mySelect" name="mySelect">
                                        <?php
                                        $a = '';
                                        $b = '';
                                        $c = '';
                                        $d = '';
                                        if (isset($_GET['mySelect'])) {
                                            switch ($_GET['mySelect']) {
                                                case 1:
                                                    $a = 'selected';
                                                    break;
                                                case 2:
                                                    $b = 'selected';
                                                    break;
                                                case 4:
                                                    $c = 'selected';
                                                    break; 
                                                case 5:
                                                    $d = 'selected';
                                                    break;    
                                                // Add more cases as needed
                                                default:
                                                    // Code to execute when no cases match
                                            }
                                            
                                        }
                                         ?>
                                        <option <?php echo $a ?> value="1">Alphabetically, A-Z</option>
                                        <option <?php echo $b ?> value="2">Sort by popularity</option>
                                        <option <?php echo $c ?> value="4">Sort by price: low to high</option>
                                        <option <?php echo $d ?> value="5">Sort by price: high to low</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!-- Shop Wrapper Start -->
                    <div class="row shop_wrapper grid_3">
                        <?php
                    $stmt = $pdo ->query("SELECT * FROM item ;");
		            while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) { ?>
                        <div class="col-md-6 col-sm-6 col-lg-4 col-custom product-area">
                            <div class="product-item">
                                <div class="single-product position-relative mr-0 ml-0">
                                    <div class="product-image">
                                        <a class="d-block" href="product-details?id=<?php echo $row['id']; ?>">
                                            <img src="<?php echo $row['src1'] ?>" alt="" class="product-image-1 w-100">
                                            <img src="<?php echo $row['src2'] ?>" alt="" class="product-image-2 position-absolute w-100">
                                        </a>
                                        <!-- <span class="onsale">Sale!</span> -->
                                        <div class="add-action d-flex flex-column position-absolute">
                                            <a href="compare.html" title="Compare">
                                                <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="left" title="Compare"></i>
                                            </a>
                                            <a href="wishlist.html" title="Add To Wishlist">
                                                <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="left" title="Wishlist"></i>
                                            </a>
                                            <a href="#<?php echo str_replace(' ', '', $row['name']);  ?>" title="Quick View" data-bs-toggle="modal" data-bs-target="#<?php echo str_replace(' ', '', $row['name']); ?>">
                                                <i class="lnr lnr-eye" data-toggle="tooltip" data-placement="left" title="Quick View"></i>
                                            </a>
                                        </div>
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
                                        <a href="addtocart?&id=<?php echo $row['id']; ?>&current_url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" class="btn product-cart">Add to Cart</a>
                                    </div>
                                    <div class="product-content-listview">
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
                                        <p class="desc-content"><?php echo $row['description'] ?></p>
                                        <div class="button-listview">
                                            <a href="addtocart?&id=<?php echo $row['id']; ?>&current_url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" class="btn product-cart button-icon flosun-button dark-btn" data-toggle="tooltip" data-placement="top" title="Add to Cart"> <span>Add to Cart</span> </a>
                                            <a class="list-icon" href="compare.html" title="Compare">
                                                <i class="lnr lnr-sync" data-toggle="tooltip" data-placement="top" title="Compare"></i>
                                            </a>
                                            <a class="list-icon" href="wishlist.html" title="Add To Wishlist">
                                                <i class="lnr lnr-heart" data-toggle="tooltip" data-placement="top" title="Wishlist"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                    <!-- Shop Wrapper End -->
                    <!-- Bottom Toolbar Start -->
                    <div class="row">
                        <div class="col-sm-12 col-custom">
                            <div class="toolbar-bottom">
                                <div class="pagination">
                                    <ul>
                                        <li class="current">1</li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li class="next"><a href="#">next</a></li>
                                        <li><a href="#">&gt;&gt;</a></li>
                                    </ul>
                                </div>
                                <p class="desc-content text-center text-sm-right mb-0">Showing 1 - 12 of 34 result</p>
                            </div>
                        </div>
                    </div>
                    <!-- Bottom Toolbar End -->
                </div>
                <div class="col-lg-3 col-12 col-custom">
                    <!-- Sidebar Widget Start -->
                    <aside class="sidebar_widget widget-mt">
                        <div class="widget_inner">
                            <div class="widget-list widget-mb-1">
                                <h3 class="widget-title">Search</h3>
                                <div class="search-box">
                                    <form action="shop_2">
                                        <div class="input-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search Our Store" style="text-align: start;">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit">
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                            
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="widget-list widget-mb-1">
                                <h3 class="widget-title">Menu Categories</h3>
                                <!-- Widget Menu Start -->
                                <nav>
                                    <ul class="mobile-menu p-0 m-0">
                                        <li class="menu-item-has-children"><a href="#">Desktop</a>
                                            <ul class="dropdown">
                                                <li><a href="shop_2?search=cpu">CPUs</a></li>
                                                <li><a href="shop_2?search=gpu">GPUs</a></li>
                                                <li><a href="shop_2?search=ssd">SSD</a></li>
                                                <li><a href="shop_2?search=ram">RAM</a></li>
                                                <li><a href="shop_2?search=board">MOTHER BOARDs</a></li>
                                                <li><a href="shop_2?search=monitor">MONITORs</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">Laptops</a>
                                            <ul class="dropdown">
                                                <li><a href="shop_2?search=hp">HP</a></li>
                                                <li><a href="shop_2?search=lenovo">Lenovo</a></li>
                                                <li><a href="shop_2?search=asus">ASUS</a></li>
                                                <li><a href="shop_2?search=acer">ACER</a></li>
                                                <li><a href="shop_2?search=msi">MSI</a></li>
                                                <li><a href="shop_2?search=dell">DELL</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">accessories</a>
                                            <ul class="dropdown">
                                                <li><a href="shop_2?search=mouse">MOUSE</a></li>
                                                <li><a href="shop_2?search=keyboard">KEYBOARD</a></li>
                                                <li><a href="shop_2?search=headset">HEADSET</a></li>
                                                <li><a href="shop_2?search=controller">CONTROLLER</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item-has-children"><a href="#">MONITORs</a>
                                            <ul class="dropdown">
                                                <li><a href="product-details.html">SAMSQUNG</a></li>
                                                <li><a href="shop_2?search=hp">HP</a></li>
                                                <li><a href="shop_2?search=lenovo">Lenovo</a></li>
                                                <li><a href="shop_2?search=asus">ASUS</a></li>
                                                <li><a href="shop_2?search=acer">ACER</a></li>
                                                <li><a href="shop_2?search=msi">MSI</a></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                                <!-- Widget Menu End -->
                            </div>
                            <div class="widget-list widget-mb-1">
                                <h3 class="widget-title">Price Filter</h3>
                                <!-- Widget Menu Start -->
                                <form action="shop_2">
                                    <div id="slider-range"></div>
                                    <button type="submit">Filter</button>
                                    <input type="text" name="text" id="amount" />
                                </form>
                                <!-- Widget Menu End -->
                            </div>
                            <div class="widget-list widget-mb-1">
                                <h3 class="widget-title">Categories</h3>
                                <div class="sidebar-body">
                                    <ul class="sidebar-list">
                                        <li><a href="#">All Product</a></li>
                                        <li><a href="#">Best Seller (5)</a></li>
                                        <li><a href="#">Featured (4)</a></li>
                                        <li><a href="#">New Products (6)</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="widget-list widget-mb-2">
                                <h3 class="widget-title">Color</h3>
                                <div class="sidebar-body">
                                    <form action="shop_2">
                                    <ul class="checkbox-container categories-list">
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck12" name='black'>
                                                <?php $stmt = $pdo ->query("SELECT count(*) FROM item where color='black' ;");
		                                        while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) { ?>
                                                <label class="custom-control-label" for="customCheck12">Black(<?php echo $row['count(*)']; ?>)</label>
                                                <?php }?>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck13" name="red">
                                                <?php $stmt = $pdo ->query("SELECT count(*) FROM item where color='red' ;");
		                                        while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) { ?>
                                                <label class="custom-control-label" for="customCheck13">Red(<?php echo $row['count(*)']; ?>)</label>
                                                <?php }?>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck14" name='blue'>
                                                <?php $stmt = $pdo ->query("SELECT count(*) FROM item where color='blue' ;");
		                                        while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) { ?>
                                                <label class="custom-control-label" for="customCheck14">Blue(<?php echo $row['count(*)']; ?>)</label>
                                                <?php }?>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck11" name='gray'>
                                                <?php $stmt = $pdo ->query("SELECT count(*) FROM item where color='gray' ;");
		                                        while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) { ?>
                                                <label class="custom-control-label" for="customCheck11">Gray(<?php echo $row['count(*)']; ?>)</label>
                                                <?php }?>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck15" name='white'>
                                                <?php $stmt = $pdo ->query("SELECT count(*) FROM item where color='white' ;");
		                                        while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) { ?>
                                                <label class="custom-control-label" for="customCheck15">White(<?php echo $row['count(*)']; ?>)</label>
                                                <?php }?>
                                            </div>
                                        </li>
                                    </ul>
                                    <button type="submit">Filter</button>
                                    </form>
                                </div>
                            </div>
                            <div class="widget-list widget-mb-3">
                                <h3 class="widget-title">Tags</h3>
                                <div class="sidebar-body">
                                    <ul class="tags">
                                        <li><a href="shop_2?search=asus">ASUS</a></li>
                                        <li><a href="shop_2?search=amd">AMD</a></li>
                                        <li><a href="shop_2?search=intel">INTEL</a></li>
                                        <li><a href="shop_2?search=nvidia">NVIDIA</a></li>
                                        <li><a href="shop_2?search=kingspec">KING SPEC</a></li>
                                        <li><a href="shop_2?search=pc">PC</a></li>
                                        <li><a href="shop_2?search=cpu">CPU</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </aside>
                    <!-- Sidebar Widget End -->
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Main Area End Here -->
    <?php require 'footer.php'; ?>

    <!-- Modal --><?php
                    $stmt = $pdo ->query("SELECT * FROM item ;");
		            while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) { ?>
    <div class="modal flosun-modal fade" id="<?php echo str_replace(' ', '', $row['name']); ?>" tabindex="-1" role="dialog" aria-hidden="true">
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
                                    <img class="w-100" src="<?php echo $row['src1']; ?>" alt="Product">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-custom">
                                <div class="modal-product">
                                    <div class="product-content">
                                        <div class="product-title">
                                        <h4 class="title"><?php echo $row['name']; ?></h4>
                                        </div>
                                        <div class="product-rating">
                                            <?php $y=$row['ratting']; for ($i=1; $i < 6; $i++) { 
                                                if ($i<=$y) { ?>
                                                    <i class="fa fa-star"></i>
                                              <?php  }else{ ?>
                                              <i class="fa fa-star-o"></i>
                                           <?php }} ?>
                                            
                                        </div>
                                        <?php

// Split the string into an array based on comma
$items = explode(',', $row['Specs']);

// Create <li> elements for each item
$listItems = '';
foreach ($items as $item) {
    $listItems .= '<li>' . $item . '</li>';
}
?>
<ul style="list-style: circle;margin-left:15px;margin-bottom:15px">
    <?php echo $listItems; ?>
</ul>
                                        <div class="price-box">
                                        <?php
                                        $sql = "select price from price group by valid_from having valid_from IN ( select max(valid_from) from price where product_id=:id);";
                                        $st =$pdo->prepare($sql);
                                        $st->execute(["id"=>$row['id']]);
                                    
		                                while ($ro =$st->fetch(pdo::FETCH_ASSOC)) { ?>
                                            <h4 class="regular-price "><?php echo formatNumberWithSpaces($ro['price']) ?> DA</h4>
                                            <?php } ?>
                                         </div>
                                        <div class="quantity-with-btn">
                                            <div class="add-to_btn">
                                                <a class="btn product-cart button-icon flosun-button dark-btn" href="addtocart?&id=<?php echo $row['id']; ?>&current_url=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">Add to cart</a>
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
<?php } ?>
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
    <script src="assets/js/main3.js"></script>


</body>


<!-- Mirrored from htmldemo.net/flosun/flosun/shop.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:17 GMT -->
</html>