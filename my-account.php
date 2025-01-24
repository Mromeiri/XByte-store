<?php 
require 'connect.php';


// Start the session
session_start();
if (!isset($_SESSION['card'])) {
         $_SESSION['card']=[];
 }
 if (!isset($_SESSION['mywebsiteanduwontknow'])) {
    header("Location: login");
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
function numberToWord($number) {
    $words = array(
        0 => 'zero', 1 => 'one', 2 => 'two', 3 => 'three', 4 => 'four',
        5 => 'five', 6 => 'six', 7 => 'seven', 8 => 'eight', 9 => 'nine',
        10 => 'ten', 11 => 'eleven', 12 => 'twelve', 13 => 'thirteen',
        14 => 'fourteen', 15 => 'fifteen', 16 => 'sixteen', 17 => 'seventeen',
        18 => 'eighteen', 19 => 'nineteen', 20 => 'twenty', 30 => 'thirty',
        40 => 'forty', 50 => 'fifty', 60 => 'sixty', 70 => 'seventy',
        80 => 'eighty', 90 => 'ninety'
    );

    if ($number <= 20) {
        return $words[$number];
    }

    if ($number < 100) {
        $tens = floor($number / 10) * 10;
        $units = $number % 10;
        return $words[$tens] . '-' . $words[$units];
    }

    if ($number < 1000) {
        $hundreds = floor($number / 100);
        $remaining = $number % 100;

        $result = $words[$hundreds] . ' hundred';

        if ($remaining > 0) {
            $result .= ' and ' . numberToWord($remaining);
        }

        return $result;
    }

    if ($number <= 9999) {
        $thousands = floor($number / 1000);
        $remaining = $number % 1000;

        $result = $words[$thousands] . ' thousand';

        if ($remaining > 0) {
            $result .= ' ' . numberToWord($remaining);
        }

        return $result;
    }

    return $number; // For numbers greater than 9999, return as is
}

$number = 112;
$word = numberToWord($number);

 // Output: "42: forty-two"
 

?>
<!doctype html>
<html class="no-js" lang="en">


<!-- Mirrored from htmldemo.net/flosun/flosun/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:27 GMT -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>My account</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/xbyte-website-favicon-color.png">

    <!-- CSS
	============================================ -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
        .myaccount-content .welcome strong {
  font-weight: 600;
  color: #45C4B0;
}
.myaccount-content form .single-input-item input:focus {
  border: 1px solid #45C4B0;
}

    </style>
    
        <script>
        function checkPasswordMatch() {
            var password1 = document.getElementById("new-pwd").value;
            var password2 = document.getElementById("confirm-pwd").value;
            var submitButton = document.getElementById("submit");

            if (password1 === password2) {
                submitButton.disabled = false;
            } else {
                submitButton.disabled = true;
            }
        }
    </script>
    

</head>

<body>

    <?php require 'header.php' ?>
    <!-- Breadcrumb Area Start Here -->
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">My Account</h3>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>My Account</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!-- my account wrapper start -->
    <div class="my-account-wrapper mt-no-text">
        <div class="container container-default-2 custom-area">
            <div class="row">
                <div class="col-lg-12 col-custom">
                    <!-- My Account Page Start -->
                    <div class="myaccount-page-wrapper">
                        <!-- My Account Tab Menu Start -->
                        <div class="row">
                            <div class="col-lg-3 col-md-4 col-custom">
                                <div class="myaccount-tab-menu nav" role="tablist">
                                    <a href="#dashboad" class="active" data-bs-toggle="tab"><i class="fa fa-dashboard"></i>
                                        Dashboard</a>
                                    <a href="#orders" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Orders</a>
                                    <a href="#payment-method" data-bs-toggle="tab"><i class="fa fa-credit-card"></i> Payment Method</a>
                                    <a href="#address-edit" data-bs-toggle="tab"><i class="fa fa-map-marker"></i> address</a>
                                    <a href="#account-info" data-bs-toggle="tab"><i class="fa fa-user"></i> Account Details</a>
                                    <a href="sign/deconect"><i class="fa fa-sign-out"></i> Logout</a>
                                </div>
                            </div>
                            <!-- My Account Tab Menu End -->

                            <!-- My Account Tab Content Start -->
                            <div class="col-lg-9 col-md-8 col-custom">
                                <div class="tab-content" id="myaccountContent">
                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Dashboard</h3>
                                            <div class="welcome">
                                                <p>Hello, <strong><?php echo $_SESSION['lastname'].' '. $_SESSION['firstname']; ?></strong> </p>
                                            </div>
                                            <p class="mb-0">From your account dashboard. you can easily check & view your recent orders, manage your shipping and billing addresses and edit your password and account details.</p>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="orders" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Orders</h3>
                                            <div class="myaccount-table table-responsive text-center">
                                                <table class="table table-bordered">
                                                    <thead class="thead-light">
                                                        <tr>
                                                            <th>Order</th>
                                                            <th>Date</th>
                                                            <th>Status</th>
                                                            <th>Total</th>
                                                            <th>Action</th>
                                                            <th>Download</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php $sql = "select * from orders where customer_id=:id order by order_date";
                                                                $stmt =$pdo->prepare($sql);
                                                                $stmt->execute(["id"=>$_SESSION['username']]); 
                                                                $i =0;
                                                                while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) { $i+=1;?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $row['order_date']; ?></td>
                                                            <?php if ($row['status']=='progress') { ?>
                                                                <td style="color:#FF0060"><?php echo $row['status']; ?></td>
                                                          <?php  }else if ($row['status']=='done') { ?>
                                                                <td style="color:#03C04A"><?php echo $row['status']; ?></td>
                                                          <?php  }else if ($row['status']=='canceled') { ?>
                                                                <td style="color:red;font-weight:700"><?php echo $row['status']; ?></td>
                                                       <?php  } ?>
                                                          
                                                            <td><?php echo formatNumberWithSpaces($row['total']-$row['promo']); ?> DA</td>
                                                            <td><a href="#<?php echo str_replace(' ', '', numberToWord($row['order_id'])); ?>" title="Quick View" data-bs-toggle="modal" data-bs-target="#<?php echo str_replace(' ', '', numberToWord($row['order_id'])); ?>">
                                                            <i class="fa fa-eye icons">
                                            </a></td>
                                                    <td><a href="pdf/chat?id=<?php echo $row['order_id']; ?>" class="btn flosun-button secondary-btn theme-color  rounded-0"><i class="fa fa-cloud-download mr-2"></i>Download File</a></td>

                                                        </tr>
                                                     <?php }  ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="payment-method" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Payment Method</h3>
                                            <p class="saved-message">You Can't Saved Your Payment Method yet.</p>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="address-edit" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Billing Address</h3>
                                            <address>
                                                <?php echo $_SESSION['adress'] ?>
                                            </address>
                                            <a href="#" class="btn flosun-button secondary-btn theme-color  rounded-0"><i class="fa fa-edit mr-2"></i>Edit Address</a>
                                        </div>
                                    </div>
                                    <!-- Single Tab Content End -->

                                    <!-- Single Tab Content Start -->
                                    <div class="tab-pane fade" id="account-info" role="tabpanel">
                                        <div class="myaccount-content">
                                            <h3>Account Details</h3>
                                            <div class="account-details-form">
                                                <form action="account.php" method="POST">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-custom">
                                                            <div class="single-input-item mb-3">
                                                                <label for="first-name" class="required mb-1">First Name</label>
                                                                <input type="text" id="first-name" placeholder="<?php echo $_SESSION['firstname'] ?>" name="firstname" />
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-custom">
                                                            <div class="single-input-item mb-3">
                                                                <label for="last-name" class="required mb-1">Last Name</label>
                                                                <input type="text" id="last-name" placeholder="<?php echo $_SESSION['lastname'] ?>" name="lastname" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="single-input-item mb-3">
                                                        <label for="display-name" class="required mb-1">User Name</label>
                                                        <input type="text" id="display-name" placeholder="<?php echo $_SESSION['username'] ?>" name="username" />
                                                    </div>
                                                    <div class="single-input-item mb-3">
                                                        <label for="email" class="required mb-1">Email Addres</label>
                                                        <input type="email" id="email" placeholder="<?php echo $_SESSION['email'] ?>" name="email"/>
                                                    </div>
                                                    <button class="btn flosun-button secondary-btn theme-color  rounded-0" type="submit" name="info">Save Changes</button>
                                                </form>
                                                <form action="account.php" method="POST">
                                                    <fieldset>
                                                        <legend>Password change</legend>
                                                        <div class="single-input-item mb-3">
                                                            <label for="current-pwd" class="required mb-1">Current Password</label>
                                                            <input type="password" id="current-pwd" placeholder="Current Password" name="currentpass" />
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 col-custom">
                                                                <div class="single-input-item mb-3">
                                                                    <label for="new-pwd" class="required mb-1">New Password</label>
                                                                    <input type="password" id="new-pwd" placeholder="New Password" name="newpass" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-custom">
                                                                <div class="single-input-item mb-3">
                                                                    <label for="confirm-pwd" class="required mb-1">Confirm Password</label>
                                                                    <input type="password" id="confirm-pwd" placeholder="Confirm Password" name="newpass"required onkeyup="checkPasswordMatch()" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </fieldset>
                                                    <div class="single-input-item single-item-button">
                                                        <button class="btn flosun-button secondary-btn theme-color  rounded-0" name="changepass" id="submit" disabled>Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div> <!-- Single Tab Content End -->
                                </div>
                            </div> <!-- My Account Tab Content End -->
                        </div>
                    </div> <!-- My Account Page End -->
                </div>
            </div>
        </div>
    </div>
    <?php
                    $stmt = $pdo ->query("SELECT * FROM orders ;");
		            while ($row =$stmt->fetch(pdo::FETCH_ASSOC)) { ?>
    <div class="modal flosun-modal fade" id="<?php echo str_replace(' ', '', numberToWord($row['order_id'])); ?>" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button type="button" class="close close-button" data-bs-dismiss="modal" aria-label="Close">
                        <span class="close-icon" aria-hidden="true">x</span>
                </button>
                <div class="modal-body">
                    <div class="container-fluid custom-area">
                        <div class="row">
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
                                    <?php 
                                             
                                              
                                                    $sql = "select * from item,order_items where order_id=:id and item.id=order_items.product_id;";
                                                    $st =$pdo->prepare($sql);
                                                    $st->execute(["id"=>$row['order_id']]);
                                                    while ($ro =$st->fetch(pdo::FETCH_ASSOC)) {
                                                
                                                ?>

                                            <tr class="cart_item">
                                                <td class="cart-product-name"><?php echo $ro['name'] ?><strong class="product-quantity">× <?php echo $ro['qty'] ; ?></strong></td>

                                                <?php
                                                $sql = "select price FROM price where product_id =:id and  valid_from <=:date ORDER BY valid_from DESC LIMIT 1;";
                                                    $stm =$pdo->prepare($sql);
                                                    $stm->execute(["id"=>$ro['product_id'],"date"=>$row['order_date']]);
                                                    while ($roo =$stm->fetch(pdo::FETCH_ASSOC)) {
                                                
                                                ?>
                                                <td class="cart-product-total text-center"><span class="amount"><?php echo formatNumberWithSpaces($roo['price']*$ro['qty'])?> DA</span></td>
                                                <?php } ?>
                                            </tr>

                                            <?php } ?>
                                    
                                    </tbody>
                                    <tfoot>
                                    <tr class="order-total">
                                        <th>Reduction</th>
                                        <td class="text-center"><strong><span class="amount"><?php echo formatNumberWithSpaces($row['promo']) ?> DA</span></strong></td>
                                    </tr>
                                    <tr class="order-total">
                                        <th>Order Total</th>
                                        <td class="text-center"><strong><span class="amount"><?php echo formatNumberWithSpaces($row['total']-$row['promo']) ?> DA</span></strong></td>
                                    </tr>
                                </tfoot>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
                   
<?php } ?>
    <!-- my account wrapper end -->
    <?php require'footer.php' ?>

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


<!-- Mirrored from htmldemo.net/flosun/flosun/my-account.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:27 GMT -->
</html>