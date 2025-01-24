<header class="main-header-area" "> 
        <!-- Main Header Area Start -->
        <div class="main-header header-sticky" style="background-color: #FFFFFF";>
            <div class="container custom-area">
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
                            <input type="text" placeholder="Search product...">
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