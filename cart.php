<?php 
require 'connect.php';


// Start the session
session_start();
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


<!-- Mirrored from htmldemo.net/flosun/flosun/cart.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:26 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>CART</title>
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
    <script src="cart2.js"></script>
    <script>
         function handleClick() {
        input = document.getElementById('couponinput');
        promo = document.getElementById('promo');
        btn = document.getElementById('coupon');
        promo.innerHTML = input.value;
         }
    </script>
    <style>
        .cart-update-option .apply-coupon-wrapper div input {
    border: 1px solid #eceff8;
    font-size: 14px;
    padding: 12px 10px;
    outline: none;
    margin-right: 15px;
    width: 100%;
    -webkit-transition: 0.4s;
    -o-transition: 0.4s;
    transition: 0.4s;
    text-decoration: none;
}
         @media (max-width: 400px) { 
            .prodct-img{
                display: flex;
    justify-content: center;
    align-items: center;
            }
            .img-prodct{
                justify-content: center;
    align-items: center;
    width:60px;
    height: 50px;
    border-radius: 4px;
    

}
.img-prodct img{
    width: 100%;
    height : 100%;

}
td{
    padding : 0px;
}
.cart-table .table thead tr th {
    min-width: 100px;
}

        
        }
        <?php
// Sleep for 2 seconds
if (isset($_GET['check'])) {
 sleep(3);

// Redirect to another page
header("Location: checkout.php");   
}
 // Make sure to exit to prevent further script execution
?>
    </style>
      <script>
function triggerHover() {
  const button = document.getElementsByClassName('minicart-btn toolbar-btn')[0];
  const hoverEvent = new Event('mouseover');

  button.dispatchEvent(hoverEvent); // Programmatically trigger mouseover event
}
setInterval(triggerHover, 1); 
</script>


</head>

<body>

 

    <!-- Header Area Start Here -->
    <?php 
    require 'header.php'; 
    
    ?>
    
    <!-- Header Area End Here -->
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">Shopping Cart</h3>
                        <ul>
                            <li><a href="index">Home</a></li>
                            <li>Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper mt-no-text">
        <div class="container custom-area">
            <div class="row">
                <div class="col-lg-12 col-custom">
                    <!-- Cart Table Area -->
                    <div class="cart-table table-responsive">
                        <table class="table table-bordered" id="myTable">
                            <thead>
                                <tr>
                                    <th class="pro-thumbnail">Image</th>
                                    <th class="pro-title">Product</th>
                                    <th class="pro-price">Price</th>
                                    <th class="pro-quantity">Quantity</th>
                                    <th class="pro-subtotal">Total</th>
                                    <th class="pro-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php $total=0; $len = count($_SESSION['card']); 
                                    for ($i=0; $i <$len ; $i++) { 
                                            $sql = "select * from item where id=:id";
                                            $stmt =$pdo->prepare($sql);
                                            $stmt->execute(["id"=>$_SESSION['card'][$i]]);
                                            while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) {
                                         ?>

                                <tr>

                                    <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?php echo $row['src1']; ?>" alt="Product" /></a></td>
                                    <td class="pro-title"><a href="#"><?php echo $row['name']; ?></a></td>
                                    <td class="pro-price"><?php
                                        $sql = "select price from price group by valid_from having valid_from IN ( select max(valid_from) from price where product_id=:id);";
                                        $st =$pdo->prepare($sql);
                                        $st->execute(["id"=>$row['id']]);
                                    
		                                while ($ro =$st->fetch(pdo::FETCH_ASSOC)) { $price = $ro['price']; ?>
                                                        <span class="regular-price "><?php echo formatNumberWithSpaces($ro['price']); }?> DA</span><p style="display:inline;"></p></td>
                                    <td class="pro-quantity">
                                        <div class="quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" value="1" type="text" name="<?php echo $row['id']; ?>">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                                <div class="dec qtybutton"><i class="fa fa-minus"></i></div>
                                                <div class="inc qtybutton"><i class="fa fa-plus"></i></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="pro-subtotal"><p style="display:inline;"></p> DA</td>
                                    <td class="pro-remove"><a href="removefromcart?id=<?php echo $row['id']; ?>"><i class="lnr lnr-trash"></i></a></td>
                                </tr> <?php $total +=$price ;}}?>


                                <tr>
                                    <td style="border:none;"></td>
                                    <td style="border:none;"></td>
                                    <td style="border:none;"></td>
                                    <td style="border:none;"></td>
                                    <td class="pro-subtotal"><span><?php echo 'TOTAL = '.formatNumberWithSpaces($total); ?> </span></td> 
                                </tr>
                                
                                
                            </tbody>
                           
                               
                            
                        </table>
                    </div>
                    <!-- Cart Update Option -->
                    <div class="cart-update-option d-block d-md-flex justify-content-between" id="tools">
                        <div class="apply-coupon-wrapper">
                            <form action="addcoupon.php"  class=" d-block d-md-flex">
                                <input type="text" placeholder="Enter Your Coupon Code" name="code" required />
                                <button class="btn flosun-button primary-btn rounded-0 black-btn" id="coupon">Apply Coupon</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-5 ml-auto col-custom">
                    <!-- Cart Calculation Area -->
                    <div class="cart-calculator-wrapper">
                        <div class="cart-calculate-items">
                            <h3 id="tools">Cart Totals</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <tr>
                                        <td>Sub Total</td>
                                        <td><p></p></td>
                                    </tr>
                                    <tr>
                                        <td>Coupon</td>
                                        <?php if (isset($_SESSION['promo'])) { ?>
                                            <td>- <p id="promo" style="display:inline"><?php echo $_SESSION['promo']; ?> </p>%</td>
                                      <?php  } else{?>
                                        <td>- <p id="promo">0 %</p></td>
                                        <?php  } ?>
                                    </tr>
                                    <tr class="total">
                                        <td> <p></p> Total</td>
                                        <td class="total-amount"><p></p></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <a href="checkout" class="btn flosun-button primary-btn rounded-0 black-btn w-100">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
       
    <?php require 'footer.php'; ?>


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


