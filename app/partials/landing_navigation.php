<?php
/*
 *   Crafted On Sat Aug 20 2022
 *
 * 
 *   https://bit.ly/MartMbithi
 *   martdevelopers254@gmail.com
 *
 *
 *   The MartDevelopers End User License Agreement
 *   Copyright (c) 2022 MartDevelopers
 *
 *
 *   1. GRANT OF LICENSE 
 *   MartDevelopers hereby grants to you (an individual) the revocable, personal, non-exclusive, and nontransferable right to
 *   install and activate this system on two separated computers solely for your personal and non-commercial use,
 *   unless you have purchased a commercial license from MartDevelopers. Sharing this Software with other individuals, 
 *   or allowing other individuals to view the contents of this Software, is in violation of this license.
 *   You may not make the Software available on a network, or in any way provide the Software to multiple users
 *   unless you have first purchased at least a multi-user license from MartDevelopers.
 *
 *   2. COPYRIGHT 
 *   The Software is owned by MartDevelopers and protected by copyright law and international copyright treaties. 
 *   You may not remove or conceal any proprietary notices, labels or marks from the Software.
 *
 *
 *   3. RESTRICTIONS ON USE
 *   You may not, and you may not permit others to
 *   (a) reverse engineer, decompile, decode, decrypt, disassemble, or in any way derive source code from, the Software;
 *   (b) modify, distribute, or create derivative works of the Software;
 *   (c) copy (other than one back-up copy), distribute, publicly display, transmit, sell, rent, lease or 
 *   otherwise exploit the Software. 
 *
 *
 *   4. TERM
 *   This License is effective until terminated. 
 *   You may terminate it at any time by destroying the Software, together with all copies thereof.
 *   This License will also terminate if you fail to comply with any term or condition of this Agreement.
 *   Upon such termination, you agree to destroy the Software, together with all copies thereof.
 *
 *
 *   5. NO OTHER WARRANTIES. 
 *   MARTDEVELOPERS  DOES NOT WARRANT THAT THE SOFTWARE IS ERROR FREE. 
 *   MARTDEVELOPERS SOFTWARE DISCLAIMS ALL OTHER WARRANTIES WITH RESPECT TO THE SOFTWARE, 
 *   EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY, 
 *   FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT OF THIRD PARTY RIGHTS. 
 *   SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF IMPLIED WARRANTIES OR LIMITATIONS
 *   ON HOW LONG AN IMPLIED WARRANTY MAY LAST, OR THE EXCLUSION OR LIMITATION OF 
 *   INCIDENTAL OR CONSEQUENTIAL DAMAGES,
 *   SO THE ABOVE LIMITATIONS OR EXCLUSIONS MAY NOT APPLY TO YOU. 
 *   THIS WARRANTY GIVES YOU SPECIFIC LEGAL RIGHTS AND YOU MAY ALSO 
 *   HAVE OTHER RIGHTS WHICH VARY FROM JURISDICTION TO JURISDICTION.
 *
 *
 *   6. SEVERABILITY
 *   In the event of invalidity of any provision of this license, the parties agree that such invalidity shall not
 *   affect the validity of the remaining portions of this license.
 *
 *
 *   7. NO LIABILITY FOR CONSEQUENTIAL DAMAGES IN NO EVENT SHALL MARTDEVELOPERS OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY
 *   CONSEQUENTIAL, SPECIAL, INCIDENTAL OR INDIRECT DAMAGES OF ANY KIND ARISING OUT OF THE DELIVERY, PERFORMANCE OR 
 *   USE OF THE SOFTWARE, EVEN IF MARTDEVELOPERS HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES
 *   IN NO EVENT WILL MARTDEVELOPERS  LIABILITY FOR ANY CLAIM, WHETHER IN CONTRACT 
 *   TORT OR ANY OTHER THEORY OF LIABILITY, EXCEED THE LICENSE FEE PAID BY YOU, IF ANY.
 *
 */
if ($_SESSION['user_access_level'] == 'Customer') {
    /* Get Logged In User Items Count In Wishlist */
    $user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
    $query = "SELECT COUNT(*)  FROM wishlists WHERE wishlist_user_id = '{$user_id}'";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($items_in_my_wishlist);
    $stmt->fetch();
    $stmt->close();


?>
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
                                    <a class="hdr-facebook" href="https://<?php echo $fb; ?>" target="_blank"><i class="ecicon eci-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="hdr-twitter" href="https://<?php echo $twitter; ?>" target="_blank"><i class="ecicon eci-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="hdr-instagram" href="https://<?php echo $instagram; ?>" target="_blank"><i class="ecicon eci-instagram"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="hdr-linkedin" href="https://<?php echo $linkedin; ?>" target="_blank"><i class="ecicon eci-linkedin"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- Header Top social End -->
                    <!-- Header Top Message Start -->
                    <div class="col text-center header-top-center">
                        <div class="header-top-message text-upper">
                            <span>Free Shipping</span>This Week Order Over - Ksh 7,500
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
                            <div class="ec-header-user dropdown">
                                <button class="dropdown-toggle" data-bs-toggle="dropdown">
                                    <img src="../public/landing_assets/images/icons/user.svg" class="svg_img header_svg" alt="" />
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a class="dropdown-item" href="landing_profile">My Profile</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="landing_purchase_history">Recent Orders</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="landing_track_order">Track Orders</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="logout">Logout</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Header User End -->
                            <!-- Header Cart Start -->
                            <a href="landing_wishlist" class="ec-header-btn ec-header-wishlist">
                                <div class="header-icon">
                                    <img src="../public/landing_assets/images/icons/wishlist.svg" class="svg_img header_svg" alt="" />
                                </div>
                                <span class="ec-header-count"><?php echo $items_in_my_wishlist; ?></span>
                            </a>
                            <!-- Header Cart End -->
                            <!-- Header Cart Start -->
                            <a href="landing_cart" class="ec-header-btn">
                                <div class="header-icon">
                                    <img src="../public/landing_assets/images/icons/cart.svg" class="svg_img header_svg" alt="" />
                                </div>
                            </a>
                            <!-- Header Cart End -->
                            <!-- Header menu Start -->
                            <a href="#ec-mobile-menu" class="ec-header-btn ec-side-toggle d-lg-none">
                                <img src="../public/landing_assets/images/icons/menu.svg" class="svg_img header_svg" alt="icon" />
                                <span class="ec-header-count">
                                    <?php
                                    /* Count Number Of Items In My Cart */
                                    if (isset($_SESSION['cart_item'])) {
                                        echo sizeof($_SESSION["cart_item"]);
                                    } else {
                                        echo "0";
                                    } ?>
                                </span>
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
                                <a href="../">
                                    <h2>
                                        eArtworks
                                    </h2>
                                </a>
                            </div>
                        </div>
                        <!-- Ec Header Logo End -->

                        <!-- Ec Header Search Start -->
                        <div class="align-self-center">
                            <div class="header-search">
                                <form class="ec-btn-group-form" action="landing_search" method="get">
                                    <input class="form-control ec-search-bar" name="search_params" placeholder="Search products..." type="text" />
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

                                <!-- Header wishlist Start -->
                                <a href="landing_wishlist" class="ec-header-btn ec-header-wishlist">
                                    <div class="header-icon">
                                        <img src="../public/landing_assets/images/icons/wishlist.svg" class="svg_img header_svg" alt="" />
                                    </div>
                                    <span class="ec-header-count"><?php echo $items_in_my_wishlist; ?></span>
                                </a>
                                <!-- Header wishlist End -->
                                <!-- Header Cart Start -->
                                <a href="landing_cart" class="ec-header-btn">
                                    <div class="header-icon">
                                        <img src="../public/landing_assets/images/icons/cart.svg" class="svg_img header_svg" alt="" />
                                        <span class="ec-header-count">
                                            <?php
                                            /* Count Number Of Items In My Cart */
                                            if (isset($_SESSION['cart_item'])) {
                                                echo sizeof($_SESSION["cart_item"]);
                                            } else {
                                                echo "0";
                                            } ?>
                                        </span>
                                    </div>
                                </a>
                                <!-- Header Cart End -->
                                <!-- Header User Start -->
                                <div class="ec-header-user dropdown">
                                    <button class="dropdown-toggle" data-bs-toggle="dropdown">
                                        <img src="../public/landing_assets/images/icons/user.svg" class="svg_img header_svg" alt="" />
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-right">
                                        <li>
                                            <a class="dropdown-item" href="landing_profile">My Profile</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="landing_purchase_history">Recent Orders</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="landing_track_order">Track Orders</a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="logout">Logout</a>
                                        </li>
                                    </ul>
                                </div>
                                <!-- Header User End -->
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
                            <a href="../">
                                <h2>
                                    eArtworks
                                </h2>
                            </a>
                        </div>
                    </div>
                    <!-- Ec Header Logo End -->
                    <!-- Ec Header Search Start -->
                    <div class="col">
                        <div class="header-search">
                            <form class="ec-btn-group-form" action="landing_search" method="get">
                                <input class="form-control ec-search-bar" name="search_params" placeholder="Search products..." type="text" />
                                <button class="submit" type="submit">
                                    <img src="../public/landing_assets/images/icons/search.svg" class="svg_img header_svg" alt="" />
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
                                        <?php
                                        /* Fetch All Categories */
                                        $categories_sql = mysqli_query($mysqli, "SELECT * FROM categories WHERE category_delete_status = '0'");
                                        if (mysqli_num_rows($categories_sql) > 0) {
                                            while ($categories = mysqli_fetch_array($categories_sql)) {
                                        ?>
                                                <li>
                                                    <a href="shop_by_categories?category=<?php echo $categories['category_id']; ?>&name=<?php echo $categories['category_name']; ?>"><?php echo $categories['category_name']; ?></a>
                                                </li>
                                            <?php }
                                        } else { ?>
                                            <li>
                                                <a href="#">No Categories</a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li><a href="landing_products">Products</a></li>
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
                                <?php
                                /* Fetch All Categories */
                                $categories_sql = mysqli_query($mysqli, "SELECT * FROM categories WHERE category_delete_status = '0'");
                                if (mysqli_num_rows($categories_sql) > 0) {
                                    while ($categories = mysqli_fetch_array($categories_sql)) {
                                ?>
                                        <li>
                                            <a href="shop_by_categories?category=<?php echo $categories['category_id']; ?>&name=<?php echo $categories['category_name']; ?>"><?php echo $categories['category_name']; ?></a>
                                        </li>
                                    <?php }
                                } else { ?>
                                    <li>
                                        <a href="#">No Categories</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li><a href="landing_products">Products</a></li>
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
                                    <a class="hdr-facebook" href="https://<?php echo $fb; ?>" target="_blank"><i class="ecicon eci-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="hdr-twitter" href="https://<?php echo $twitter; ?>" target="_blank"><i class="ecicon eci-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="hdr-instagram" href="https://<?php echo $instagram; ?>" target="_blank"><i class="ecicon eci-instagram"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="hdr-linkedin" href="https://<?php echo $linkedin; ?>" target="_blank"><i class="ecicon eci-linkedin"></i></a>
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
<?php
} else { ?>
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
                                    <a class="hdr-facebook" href="https://<?php echo $fb; ?>" target="_blank"><i class="ecicon eci-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="hdr-twitter" href="https://<?php echo $twitter; ?>" target="_blank"><i class="ecicon eci-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="hdr-instagram" href="https://<?php echo $instagram; ?>" target="_blank"><i class="ecicon eci-instagram"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="hdr-linkedin" href="https://<?php echo $linkedin; ?>" target="_blank"><i class="ecicon eci-linkedin"></i></a>
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
                            <!-- Header User End -->
                            <!-- Header Cart Start -->
                            <a href="login" class="ec-header-btn ec-header-wishlist">
                                <div class="header-icon">
                                    <img src="../public/landing_assets/images/icons/wishlist.svg" class="svg_img header_svg" alt="" />
                                </div>
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
                                <a href="../">
                                    <a href="../">
                                        <h2>
                                            eArtworks
                                        </h2>
                                    </a>
                                </a>
                            </div>
                        </div>
                        <!-- Ec Header Logo End -->

                        <!-- Ec Header Search Start -->
                        <div class="align-self-center">
                            <div class="header-search">
                                <form class="ec-btn-group-form" action="landing_search" method="get">
                                    <input class="form-control ec-search-bar" name="search_params" placeholder="Search products..." type="text" />
                                    <button class="submit" type="submit">
                                        <img src="../public/landing_assets/images/icons/search.svg" class="svg_img header_svg" alt="" />
                                    </button>
                                </form>
                            </div>
                        </div>
                        <!-- Ec Header Search End -->
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
                            <a href="../">
                                <h2>
                                    eArtworks
                                </h2>
                            </a>
                        </div>
                    </div>
                    <!-- Ec Header Logo End -->
                    <!-- Ec Header Search Start -->
                    <div class="col">
                        <div class="header-search">
                            <form class="ec-btn-group-form" action="landing_search" method="get">
                                <input class="form-control ec-search-bar" name="search_params" placeholder="Search products..." type="text" />
                                <button class="submit" type="submit">
                                    <img src="../public/landing_assets/images/icons/search.svg" class="svg_img header_svg" alt="" />
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
                                        <?php
                                        /* Fetch All Categories */
                                        $categories_sql = mysqli_query($mysqli, "SELECT * FROM categories WHERE category_delete_status = '0'");
                                        if (mysqli_num_rows($categories_sql) > 0) {
                                            while ($categories = mysqli_fetch_array($categories_sql)) {
                                        ?>
                                                <li>
                                                    <a href="shop_by_categories?category=<?php echo $categories['category_id']; ?>&name=<?php echo $categories['category_name']; ?>"><?php echo $categories['category_name']; ?></a>
                                                </li>
                                            <?php }
                                        } else { ?>
                                            <li>
                                                <a href="#">No Categories</a>
                                            </li>
                                        <?php } ?>
                                    </ul>
                                </li>
                                <li><a href="landing_products">Products</a></li>
                                <li><a href="register">Register</a></li>
                                <li><a href="login">Login</a></li>
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
                                <?php
                                /* Fetch All Categories */
                                $categories_sql = mysqli_query($mysqli, "SELECT * FROM categories WHERE category_delete_status = '0'");
                                if (mysqli_num_rows($categories_sql) > 0) {
                                    while ($categories = mysqli_fetch_array($categories_sql)) {
                                ?>
                                        <li>
                                            <a href="shop_by_categories?category=<?php echo $categories['category_id']; ?>&name=<?php echo $categories['category_name']; ?>"><?php echo $categories['category_name']; ?></a>
                                        </li>
                                    <?php }
                                } else { ?>
                                    <li>
                                        <a href="#">No Categories</a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </li>
                        <li><a href="landing_products">Products</a></li>
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
                                    <a class="hdr-facebook" href="https://<?php echo $fb; ?>" target="_blank"><i class="ecicon eci-facebook"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="hdr-twitter" href="https://<?php echo $twitter; ?>" target="_blank"><i class="ecicon eci-twitter"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="hdr-instagram" href="https://<?php echo $instagram; ?>" target="_blank"><i class="ecicon eci-instagram"></i></a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="hdr-linkedin" href="https://<?php echo $linkedin; ?>" target="_blank"><i class="ecicon eci-linkedin"></i></a>
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
<?php } ?>