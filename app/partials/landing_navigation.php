<header class="ec-header">
    <!--Ec Header Top Start -->
    <div class="header-top">
        <div class="container">
            <div class="row align-items-center">
                <!-- Header Top social Start -->
                <div class="col text-left header-top-left d-none d-lg-block">
                    <div class="header-top-social">
                        <span class="social-text text-upper">Follow us on:</span>
                        <ul class="mb-0">
                            <li class="list-inline-item">
                                <a class="hdr-facebook" href="#"><i class="ecicon eci-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a class="hdr-twitter" href="#"><i class="ecicon eci-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a class="hdr-instagram" href="#"><i class="ecicon eci-instagram"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a class="hdr-linkedin" href="#"><i class="ecicon eci-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Header Top social End -->
                <!-- Header Top Message Start -->
                <div class="col text-center header-top-center">
                    <div class="header-top-message text-upper">
                        <span>Free Shipping</span>This Week Order Over - $75
                    </div>
                </div>
                <!-- Header Top Message End -->
                <!-- Header Top Language Currency -->
                <div class="col header-top-right d-none d-lg-block">
                    <div class="header-top-lan-curr d-flex justify-content-end">
                        <!-- Currency Start -->
                        <div class="header-top-curr dropdown">
                            <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">
                                Default Currency
                                <i class="ecicon eci-caret-down" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li class="active">
                                    <a class="dropdown-item" href="">Kes</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Currency End -->
                        <!-- Language Start -->
                        <div class="header-top-lan dropdown">
                            <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">
                                Language
                                <i class="ecicon eci-caret-down" aria-hidden="true"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li class="active">
                                    <a class="dropdown-item" href="">English</a>
                                </li>
                            </ul>
                        </div>
                        <!-- Language End -->
                    </div>
                </div>
                <!-- Header Top Language Currency -->
                <!-- Header Top responsive Action -->
                <div class="col d-lg-none">
                    <div class="ec-header-bottons">
                        <!-- Header User Start -->
                        <?php
                        if ((strlen($_SESSION['user_id']) != 0)) { ?>
                            <div class="ec-header-user dropdown">
                                <button class="dropdown-toggle" data-bs-toggle="dropdown">
                                    <img src="../public/landing_assets/images/icons/user.svg" class="svg_img header_svg" alt="" />
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-item" href="register">Register</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="login">Login</a>
                                    </li>
                                </ul>
                            </div>
                        <?php } else { ?>
                            <div class="ec-header-user dropdown">
                                <button class="dropdown-toggle" data-bs-toggle="dropdown">
                                    <img src="../public/landing_assets/images/icons/user.svg" class="svg_img header_svg" alt="" />
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-item" href="register">Orders</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="logout">Logout</a>
                                    </li>
                                </ul>
                            </div>
                        <?php } ?>
                        <!-- Header User End -->
                        <!-- Header Cart Start -->
                        <a href="wishlist" class="ec-header-btn ec-header-wishlist">
                            <div class="header-icon">
                                <img src="../public/landing_assets/images/icons/wishlist.svg" class="svg_img header_svg" alt="" />
                            </div>
                            <span class="ec-header-count">4</span>
                        </a>
                        <!-- Header Cart End -->
                        <!-- Header Cart Start -->
                        <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                            <div class="header-icon">
                                <img src="../public/landing_assets/images/icons/cart.svg" class="svg_img header_svg" alt="" />
                            </div>
                            <span class="ec-header-count cart-count-lable">3</span>
                        </a>
                        <!-- Header Cart End -->
                        <!-- Header menu Start -->
                        <a href="#ec-mobile-menu" class="ec-header-btn ec-side-toggle d-lg-none">
                            <img src="../public/landing_assets/images/icons/menu.svg" class="svg_img header_svg" alt="icon" />
                        </a>
                        <!-- Header menu End -->
                    </div>
                </div>
                <!-- Header Top responsive Action -->
            </div>
        </div>
    </div>
    <!-- Ec Header Top  End -->
    <!-- Ec Header Bottom  Start -->
    <div class="ec-header-bottom d-none d-lg-block">
        <div class="container position-relative">
            <div class="row">
                <div class="ec-flex">
                    <!-- Ec Header Logo Start -->
                    <div class="align-self-center">
                        <div class="header-logo">
                            <a href="../"><img src="../public/landing_assets/images/logo/logo.png" alt="Site Logo" /><img class="dark-logo" src="assets/images/logo/dark-logo.png" alt="Site Logo" style="display: none" /></a>
                        </div>
                    </div>
                    <!-- Ec Header Logo End -->

                    <!-- Ec Header Search Start -->
                    <div class="align-self-center">
                        <div class="header-search">
                            <form class="ec-btn-group-form" action="#">
                                <input class="form-control ec-search-bar" placeholder="Search products..." type="text" />
                                <button class="submit" type="submit">
                                    <img src="../public/landing_assets/images/icons/search.svg" class="svg_img header_svg" alt="" />
                                </button>
                            </form>
                        </div>
                    </div>
                    <!-- Ec Header Search End -->

                    <!-- Ec Header Button Start -->
                    <div class="align-self-center">
                        <div class="ec-header-bottons">
                            <!-- Header User Start -->
                            <?php
                            if ((strlen($_SESSION['user_id']) != 0)) { ?>
                                <div class="ec-header-user dropdown">
                                    <button class="dropdown-toggle" data-bs-toggle="dropdown">
                                        <img src="../public/landing_assets/images/icons/user.svg" class="svg_img header_svg" alt="" />
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a class="dropdown-item" href="register">Register</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="login">Login</a>
                                        </li>
                                    </ul>
                                </div>
                            <?php } else { ?>
                                <div class="ec-header-user dropdown">
                                    <button class="dropdown-toggle" data-bs-toggle="dropdown">
                                        <img src="../public/landing_assets/images/icons/user.svg" class="svg_img header_svg" alt="" />
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a class="dropdown-item" href="register">Orders</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="logout">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                            <!-- Header User End -->
                            <!-- Header wishlist Start -->
                            <a href="wishlist" class="ec-header-btn ec-header-wishlist">
                                <div class="header-icon">
                                    <img src="../public/landing_assets/images/icons/wishlist.svg" class="svg_img header_svg" alt="" />
                                </div>
                                <span class="ec-header-count">4</span>
                            </a>
                            <!-- Header wishlist End -->
                            <!-- Header Cart Start -->
                            <a href="#ec-side-cart" class="ec-header-btn ec-side-toggle">
                                <div class="header-icon">
                                    <img src="../public/landing_assets/images/icons/cart.svg" class="svg_img header_svg" alt="" />
                                </div>
                                <span class="ec-header-count cart-count-lable">3</span>
                            </a>
                            <!-- Header Cart End -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec Header Button End -->
    <!-- Header responsive Bottom  Start -->
    <div class="ec-header-bottom d-lg-none">
        <div class="container position-relative">
            <div class="row">
                <!-- Ec Header Logo Start -->
                <div class="col">
                    <div class="header-logo">
                        <a href="../"><img src="../public/landing_assets/images/logo/logo.png" alt="Site Logo" /><img class="dark-logo" src="assets/images/logo/dark-logo.png" alt="Site Logo" style="display: none" /></a>
                    </div>
                </div>
                <!-- Ec Header Logo End -->
                <!-- Ec Header Search Start -->
                <div class="col">
                    <div class="header-search">
                        <form class="ec-btn-group-form" action="#">
                            <input class="form-control ec-search-bar" placeholder="Search products..." type="text" />
                            <button class="submit" type="submit">
                                <img src="../public/landing_assets/images/icons/search.svg" class="svg_img header_svg" alt="icon" />
                            </button>
                        </form>
                    </div>
                </div>
                <!-- Ec Header Search End -->
            </div>
        </div>
    </div>
    <!-- Header responsive Bottom  End -->
    <!-- EC Main Menu Start -->
    <div id="ec-main-menu-desk" class="d-none d-lg-block sticky-nav">
        <div class="container position-relative">
            <div class="row">
                <div class="col-md-12 align-self-center">
                    <div class="ec-main-menu">
                        <ul>
                            <li><a href="../">Home</a></li>
                            <li class="dropdown">
                                <a href="javascript:void(0)">Shop By Categories</a>
                                <ul class="sub-menu">
                                    <li><a href="shop_by_categories?category=">Category Name</a></li>
                                </ul>
                            </li>
                            <li><a href="landing_products">Products</a></li>
                            <li><a href="landing_artists">Artists</a></li>
                            <li><a href="landing_shops">Shops</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec Main Menu End -->
    <!-- ekka Mobile Menu Start -->
    <div id="ec-mobile-menu" class="ec-side-cart ec-mobile-menu">
        <div class="ec-menu-title">
            <span class="menu_title">My Menu</span>
            <button class="ec-close">×</button>
        </div>
        <div class="ec-menu-inner">
            <div class="ec-menu-content">
                <ul>
                    <li><a href="../">Home</a></li>
                    <li>
                        <a href="javascript:void(0)">Shop By Categories</a>
                        <ul class="sub-menu">
                            <li>
                                <a href="shop_by_categories?category=">Category Name</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="landing_products">Products</a></li>
                    <li><a href="landing_artists">Artists</a></li>
                    <li><a href="landing_shops">Shops</a></li>
                </ul>
            </div>
            <div class="header-res-lan-curr">
                <div class="header-top-lan-curr">
                    <!-- Language Start -->
                    <div class="header-top-lan dropdown">
                        <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">
                            Language
                            <i class="ecicon eci-caret-down" aria-hidden="true"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li class="active">
                                <a class="dropdown-item" href="">English</a>
                            </li>
                        </ul>
                    </div>
                    <!-- Language End -->
                    <!-- Currency Start -->
                    <div class="header-top-curr dropdown">
                        <button class="dropdown-toggle text-upper" data-bs-toggle="dropdown">
                            Default Currency
                            <i class="ecicon eci-caret-down" aria-hidden="true"></i>
                        </button>
                        <ul class="dropdown-menu">
                            <li class="active">
                                <a class="dropdown-item" href="">Kes </a>
                            </li>
                        </ul>
                    </div>
                    <!-- Currency End -->
                </div>
                <!-- Social Start -->
                <div class="header-res-social">
                    <div class="header-top-social">
                        <ul class="mb-0">
                            <li class="list-inline-item">
                                <a class="hdr-facebook" href="#"><i class="ecicon eci-facebook"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a class="hdr-twitter" href="#"><i class="ecicon eci-twitter"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a class="hdr-instagram" href="#"><i class="ecicon eci-instagram"></i></a>
                            </li>
                            <li class="list-inline-item">
                                <a class="hdr-linkedin" href="#"><i class="ecicon eci-linkedin"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Social End -->
            </div>
        </div>
    </div>
    <!-- ekka mobile Menu End -->
</header>