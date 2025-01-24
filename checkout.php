<?php 
session_start();
if (isset($_COOKIE['myCookie'])) {
    $jsonQte = $_COOKIE['myCookie'];
    $qteArray = json_decode($jsonQte, true);
}
if (isset($_COOKIE['to'])) {
    $jsonQte = $_COOKIE['to'];
    $total = json_decode($jsonQte, true);
    if ($total==0 && !isset($_SESSION['promo'])) {
        header('location:shop');
    }
}
if (isset($_COOKIE['promo'])) {
    $jsonQte = $_COOKIE['myCookie'];
    $promo = json_decode($jsonQte, true);
}
$itemArray = $_SESSION['card'];
?>
<?php 
require 'connect.php';


// Start the session
if (!isset($_SESSION['card'])) {
    $_SESSION['card']=[];
}


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


<!-- Mirrored from htmldemo.net/flosun/flosun/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:26 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Check Out</title>
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
   
  <style>
    .checkbox-form .checkout-form-list input[type="text"]:focus,
.checkbox-form .checkout-form-list input[type="password"]:focus,
.checkbox-form .checkout-form-list input[type="email"]:focus {
  border: 1px solid #012030;
}
  </style>
<script src="cart.js"></script>
</head>

<body>

    
    <?php require 'header.php'; ?>
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Checkout</h3>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- Checkout Area Start Here -->
    <div class="checkout-area mt-no-text">
        <div class="container custom-container">
           
            <div class="row">
                <div class="col-lg-6 col-12 col-custom">
                    <form action="SOS" method="POST">
                        <div class="checkbox-form">
                            <h3>Billing Details</h3>
                            <div class="row">
                                <div class="col-md-12 col-custom">
                                    <div class="country-select clearfix">
                                        <label>State (الولاية)<span class="required">*</span></label>
                                        <select class="myniceselect nice-select wide rounded-0" name="state">
                                            <option value="Alger" data-display="Alger">Alger</option>
                                            <option value="Adrar">Blida</option>
                                            <option value="Chlef">Boumerdas</option>
                                            <option value="Laghouat">Oran</option>
                                            <option value="Oum El Bouaghi">Anaba</option>
                                            <option value="Batna">Other</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Last Name (اللقب) <span class="required">*</span></label>
                                        <input placeholder="Last Name" type="text" name="lastname" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label>First Name (الاسم)<span class="required">*</span></label>
                                        <input placeholder="First Name" type="text" name="firstname" required>
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Company Name (optional) (اختياري اسم الشركة)</label>
                                        <input placeholder="Company Name" name="company" type="text" >
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Address (العنوان)<span class="required">*</span></label>
                                        <input placeholder="Address" type="text" name="adress" required>
                                    </div>
                                </div>
                                <div class="col-md-12 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Commune (البلدية)<span class="required" required>*</span></label>
                                        <input placeholder="Commune" type="text" name="commune" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Email Address (البريد الالكتؤوني)<span class="required">*</span></label>
                                        <input placeholder="Email Address" type="email" name="email" required>
                                    </div>
                                </div>
                                <div class="col-md-6 col-custom">
                                    <div class="checkout-form-list">
                                        <label>Phone (رقم الهاتف)<span class="required" required>*</span></label>
                                        <input placeholder="Phone" type="text" name="phone" required pattern="0[1-9][0-9]{8}">
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    
                </div>
                <div class="col-lg-6 col-12 col-custom">
                    <div class="your-order">
                        <h3>Your order</h3>
                        <div class="your-order-table table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="cart-product-name">Product</th>
                                        <th class="cart-product-total">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for ($i=0; $i < count($qteArray); $i++) { 
                                        $sql = "select * from item where id=:id";
                                            $stmt =$pdo->prepare($sql);
                                            $stmt->execute(["id"=>$itemArray[$i]]);
                                            while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {?>
                                      <tr class="cart_item">
                                        <td class="cart-product-name"> <?php echo $row['name'] ?><strong class="product-quantity">
                            × <?php echo $qteArray[$i] ; ?></strong></td>
                                        <td class="cart-product-total text-center"><?php
                                        $sql = "select price from price group by valid_from having valid_from IN ( select max(valid_from) from price where product_id=:id);";
                                        $st =$pdo->prepare($sql);
                                        $st->execute(["id"=>$row['id']]);
                                    
		                                while ($ro =$st->fetch(pdo::FETCH_ASSOC)) { $price = $ro['price']; ?>
                                                        <span class="regular-price "><?php echo formatNumberWithSpaces($ro['price']); }?> DA</span> </td>
                                    </tr> 
                                  <?php  }} ?>
                                </tbody>
                                <tfoot>
                                <tr class="order-total">
                                        <th style="font-weight:500">Reduction</th>
                                        <td class="text-center"style="font-weight:500"><strong><span class="amount"><?php echo formatNumberWithSpaces($_COOKIE['promo']) ?> DA</span></strong></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <td class="text-center"><strong><span class="amount"><?php echo formatNumberWithSpaces($_COOKIE['to']-$_COOKIE['promo']) ?> DA</span></strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="payment-method">
                            <div class="payment-accordion">
                                <div id="accordion">
                                    <div class="card">
                                        <div class="card-header" id="#payment-1">
                                            <h5 class="panel-title mb-3">
                                                <a href="" class="" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                    Hand To Hand Payment
                                                </a>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="order-button-payment">
                                    <button class="btn flosun-button secondary-btn black-color rounded-0 w-100" type="submit">Place Order</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Checkout Area End Here -->
    <?php require 'footer.php'; ?>

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


<!-- Mirrored from htmldemo.net/flosun/flosun/checkout.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:27 GMT -->
</html>