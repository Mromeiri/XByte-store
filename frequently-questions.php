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

<!doctype html lang="ar" dir="rtl">
<html class="no-js" lang="en">


<head>
<link rel="shortcut icon" type="image/x-icon" href="assets/images/logo/xbyte-website-favicon-color.png">

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>FAQ</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
        .card-header.card_accor button.btn-link {
            
  border: 1px solid #012030;
  width: 100%;
  text-align: left;
  font-size: 16px;
  font-weight: 500;
  color: #ffffff;
  padding-left: 20px;
}
.accordion_area .card-header {
  background: #012030;
}
.card-header.card_accor button.btn-link.collapsed {
  background: #f8f8f8;
  border: 1px solid #012030;
  
  
}
.card.card_dipult .card-body p {
    font-size: 14px;

}
    </style>

</head>

<body>

 

    <?php require 'header.php'; ?>
    <div class="breadcrumbs-area position-relative">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center">
                    <div class="breadcrumb-content position-relative section-content">
                        <h3 class="title-3">FAQ</h3>
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li>Faq</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End Here -->
    <!--faq area start-->
    <div class="faq-area">
        <!-- Faq Content Start  -->
        <div class="faq_content_area mt-text-6">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="faq_content_wrapper">
                            <h4>Below are frequently asked questions, you may find the answer for yourself</h4>
                            <p>Welcome to our FAQ page! We have simple answers to common questions about our products and services. If you need assistance, this page is a helpful resource. Feel free to explore the frequently asked questions. For any other inquiries, our friendly customer support team is here to help. Enjoy browsing!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Faq Content End -->
        <!--Accordion area-->
        <div class="accordion_area">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div id="accordion" class="card__accordion">
                            <div class="card card_dipult">
                                <div class="card-header card_accor" id="headingOne">
                                    <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne"> ؟ XByte ما هو <i class="fa fa-plus"></i><i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>  هو متجر إلكتروني رائد يختص في بيع ملحقات الحواسب الشخصية عالية الجودة، بما في ذلك الشاشات، وملحقات الكمبيوتر، والمكونات، وأجهزة الكمبيوتر المخصصة للألعاب. نقدم مجموعة واسعة من المنتجات المتطورة التي تأتي من العلامات التجارية والمصنعين المعروفين لتلبية احتياجاتك التقنية</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card card_dipult">
                                <div class="card-header card_accor" id="headingTwo" id="why">
                                    <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    <p style="display:inline">  لشراء منتجات التقنية؟<p style="display:inline"> XByte </p>لماذا أختار

                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                    <div class="card-body">
                                    <p style="display:inline"> نفخر بتقديم أفضل جودة لمنتجاتنا لعملائنا. يضمن فريقنا المخصص أن كل منتج على رفوفنا مختار بعناية لمستواه العالي وموثوقيته. يمكنك الاعتماد علينا لتقديم المنتجات عالية الجودة وجعل رحلتك التقنية سلسة وممتعة.<p style="display:inline"> XByte </p>في
                                    </div>
                                </div>
                            </div>
                            <div class="card card_dipult">
                                <div class="card-header card_accor" id="headingThree">
                                    <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                     هل تقدمون مجموعة متنوعة من أجهزة الكمبيوتر المخصصة للألعاب؟

                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                    <div class="card-body">
                                    <p style="display:inline">    على مجموعة مذهلة من أجهزة الكمبيوتر المخصصة للألعاب عالية الأداء لتعزيز تجربتك في الألعاب. من المعالجات القوية إلى بطاقات الرسومات المتطورة، لدينا الحاسوب المناسب تمامًا لتفضيلات اللعب الخاصة بك.<p style="display:inline"> XByte </p> بالتأكيد! يحتوي
                                    </div>
                                </div>
                            </div>
                            <div class="card card_dipult">
                                <div class="card-header card_accor" id="headingfour">
                                    <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseeight" aria-expanded="false" aria-controls="collapseeight">
                                  ؟ XByte هل تكون الأسعار تنافسية في 
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div id="collapseeight" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
                                    <div class="card-body">
                                    <p style="display:inline">     نؤمن بتقديم أفضل قيمة مقابل أموالك. تكون أسعارنا تنافسية، ونقدم عروضًا وخصومات جذابة لجعل مشترياتك التقنية أكثر ميسرة.<p style="display:inline"> XByte </p>نعم، في 
                                    </div>
                                </div>
                            </div>
                            <div class="card card_dipult">
                                <div class="card-header card_accor" id="headingfive">
                                    <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapseseven" aria-expanded="false" aria-controls="collapseseven">
                                    ؟ XByte كيف يمكنني إجراء طلب في                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div id="collapseseven" class="collapse" aria-labelledby="headingfive" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>إجراء طلب بسيط! ما عليك سوى تصفح موقعنا، واختيار المنتجات المطلوبة، وإضافتها إلى سلة المشتريات. بعد ذلك، قم بالانتقال إلى عملية الدفع واتباع التعليمات لإكمال طلبك</p>
                                    </div>
                                </div>
                            </div>
                            <div class="card card_dipult">
                                <div class="card-header card_accor" id="headingsix">
                                    <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                                    ما هي طرق الدفع المقبولة؟
                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div id="collapsefour" class="collapse" aria-labelledby="headingsix" data-parent="#accordion">
                                    <div class="card-body">
                                    <p style="display:inline">      ندعم طريقة الدفع "يد بيد" فقط. يمكنك دفع قيمة الطلب عند استلامه في مكان التوصيل. نحرص على توفير أسهل وأكثر طرق الدفع لتلبية احتياجات عملائنا بشكل مريح.<p style="display:inline"> XByte </p> في
                                    </div>
                                </div>
                            </div>
                            <div class="card card_dipult">
                                <div class="card-header card_accor" id="headingseven">
                                    <button class="btn btn-link collapsed" data-bs-toggle="collapse" data-bs-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                                     هل تقدمون الشحن على مستوى الوطن؟

                                        <i class="fa fa-plus"></i>
                                        <i class="fa fa-minus"></i>
                                    </button>
                                </div>
                                <div id="collapsefive" class="collapse" aria-labelledby="headingseven" data-parent="#accordion">
                                    <div class="card-body">
                                        <p>نعم، نحن نقدم الشحن على مستوى الوطن، مما يضمن توصيل طلباتك إلى باب منزلك بغض النظر عن مكان اقامتك</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Accordion area end-->
    </div>
    <!--faq area End-->
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


<!-- Mirrored from htmldemo.net/flosun/flosun/frequently-questions.html by HTTrack Website Copier/3.x [XR&CO'2014], Sun, 04 Dec 2022 05:03:27 GMT -->
</html>