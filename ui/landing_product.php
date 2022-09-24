<?php
/*
 *   Crafted On Thu Aug 18 2022
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
session_start();
require_once('../app/settings/config.php');
require_once('../app/settings/checklogin.php');
require_once('../app/helpers/landing.php');
require_once('../app/settings/cart_db_controller.php');
include('../app/helpers/cart.php');
require_once('../app/partials/landing_head.php');
?>

<body class="product_page">
    <div id="ec-overlay"><span class="loader_img"></span></div>

    <!-- Header start  -->
    <?php require_once('../app/partials/landing_navigation.php'); ?>
    <!-- Header End  -->


    <!-- Ec breadcrumb start -->
    <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="row ec_breadcrumb_inner">
                        <div class="col-md-6 col-sm-12">
                            <h2 class="ec-breadcrumb-title">Single Product</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="../">Home</a></li>
                                <li class="ec-breadcrumb-item"><a href="../">Products</a></li>
                                <li class="ec-breadcrumb-item active">Product</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Sart Single product -->
    <?php
    $product_id = mysqli_real_escape_string($mysqli, $_GET['view']);
    $products_sql = mysqli_query(
        $mysqli,
        "SELECT * FROM products p
        INNER JOIN users u ON u.user_id = p.product_seller_id
        INNER JOIN categories c ON c.category_id = p.product_category_id
        WHERE u.user_delete_status = '0' 
        AND c.category_delete_status = '0'
        AND p.product_delete_status = '0'
        AND p.product_id = '{$product_id}'
        "
    );
    if (mysqli_num_rows($products_sql) > 0) {
        while ($products = mysqli_fetch_array($products_sql)) {
            /* Image Directory */
            if ($products['product_image'] == '') {
                $image_dir = "../public/uploads/products/no_image.png";
            } else {
                $image_dir = "../public/uploads/products/" . $products['product_image'];
            }
    ?>
            <section class="ec-page-content section-space-p">
                <div class="container">
                    <div class="row">
                        <div class="ec-pro-rightside ec-common-rightside col-lg-12 order-lg-last col-md-12 order-md-first">

                            <!-- Single product content Start -->
                            <div class="single-pro-block">
                                <div class="single-pro-inner">
                                    <div class="row">
                                        <div class="single-pro-img">
                                            <div class="single-product-scroll">
                                                <div class="single-product-cover">
                                                    <div class="single-slide zoom-image-hover">
                                                        <img class="img-responsive" src="<?php echo $image_dir; ?>" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-pro-desc">
                                            <div class="single-pro-content">
                                                <h5 class="ec-single-title"><?php echo $products['product_name']; ?></h5>
                                                <div class="ec-single-rating-wrap">
                                                    <div class="ec-single-rating">
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                        <i class="ecicon eci-star fill"></i>
                                                    </div>
                                                </div>
                                                <div class="ec-single-price-stoke">
                                                    <div class="ec-single-price">
                                                        <span class="ec-single-ps-title">As low as</span>
                                                        <span class="new-price">Ksh <?php echo number_format($products['product_price'], 2); ?></span>
                                                    </div>
                                                    <div class="ec-single-stoke">
                                                        <span class="ec-single-ps-title">IN STOCK</span>
                                                        <span class="ec-single-sku">SKU#: <?php echo $products['product_sku_code']; ?></span>
                                                    </div>
                                                </div>
                                                <?php if ($_SESSION['user_access_level'] == 'Customer') { ?>
                                                    <div class="ec-single-price-stoke">
                                                        <div class="ec-single-price">
                                                            <span class="ec-single-ps-title">Seller Details</span>
                                                            <span class="new-price">Name : <?php echo $products['user_first_name'] . ' ' . $products['user_last_name']; ?> </span>
                                                            <span class="new-price">Email : <?php echo $products['user_email']; ?> </span>
                                                            <span class="new-price">Contacts : <?php echo $products['user_phone_number']; ?></span>

                                                        </div>
                                                    </div>


                                                    <div class="ec-single-qty">
                                                        <?php
                                                        $product_array = $db_handle->runQuery("SELECT * FROM products WHERE product_id = '{$product_id}' ");
                                                        if (!empty($product_array)) {
                                                            foreach ($product_array as $key => $value) {
                                                        ?>
                                                                <form method="post" action="landing_product?view=<?php echo $product_id; ?>&category=<?php echo $products['category_id']; ?>&action=add&product_id=<?php echo $product_array[$key]["product_id"]; ?>">
                                                                    <!-- Hidden -->
                                                                    <div class="qty-plus-minus">
                                                                        <input class="qty-input" type="text" name="quantity" value="1" />
                                                                    </div>
                                                                    <br>
                                                                    <div class="ec-single-cart ">
                                                                        <button type="submit" class="btn btn-primary">Add To Cart</button>
                                                                    </div>
                                                                </form>
                                                        <?php
                                                            }
                                                        } ?>
                                                        <div class="ec-single-wishlist">
                                                            <form method="post">
                                                                <!-- Hidden Values -->
                                                                <input type="hidden" name="wishlist_product_id" value="<?php echo $products['product_id']; ?>">
                                                                <input type="hidden" name="wishlist_user_id" value="<?php echo $_SESSION['user_id']; ?>">
                                                                <button type="submit" name="Add_To_WishList" class="ec-btn-group wishlist"><img src="../public/landing_assets/images/icons/wishlist.svg" class="svg_img pro_svg" alt="" /></button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--Single product content End -->
                            <!-- Single product tab start -->
                            <div class="ec-single-pro-tab">
                                <div class="ec-single-pro-tab-wrapper">
                                    <div class="ec-single-pro-tab-nav">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-bs-toggle="tab" data-bs-target="#ec-spt-nav-details" role="tablist">Details</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content  ec-single-pro-tab-content">
                                        <div id="ec-spt-nav-details" class="tab-pane fade show active">
                                            <div class="ec-single-pro-tab-desc">
                                                <?php echo $products['product_details']; ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- product details description area end -->
                        </div>
                    </div>
                </div>
            </section>
            <!-- End Single product -->
    <?php }
    } ?>

    <!-- Related Product Start -->
    <section class="section ec-releted-product section-space-p">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">
                    <div class="section-title">
                        <h2 class="ec-bg-title">Related products</h2>
                        <h2 class="ec-title">Related products</h2>
                        <p class="sub-title">Browse The Collection of Top Products</p>
                    </div>
                </div>
            </div>
            <div class="row margin-minus-b-30">
                <!-- Related Product Content -->
                <?php
                $category = mysqli_real_escape_string($mysqli, $_GET['category']);
                $products_sql = mysqli_query(
                    $mysqli,
                    "SELECT * FROM products p
                    INNER JOIN users u ON u.user_id = p.product_seller_id
                    INNER JOIN categories c ON c.category_id = p.product_category_id
                    WHERE u.user_delete_status = '0' 
                    AND c.category_delete_status = '0'
                    AND p.product_delete_status = '0'
                    AND c.category_id = '{$category}' 
                    AND p.product_id != '{$product_id}'
                    "
                );
                if (mysqli_num_rows($products_sql) > 0) {
                    while ($products = mysqli_fetch_array($products_sql)) {
                        /* Image Directory */
                        if ($products['product_image'] == '') {
                            $image_dir = "../public/uploads/products/no_image.png";
                        } else {
                            $image_dir = "../public/uploads/products/" . $products['product_image'];
                        }
                        /* Only show available artworks */
                        $availability = strtotime($products['product_available_from']);
                        /* Show Available Artowkrs */
                        if ($current_time >= $availability) {
                ?>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 mb-6 pro-gl-content">
                                <div class="ec-product-inner">
                                    <div class="ec-pro-image-outer">
                                        <div class="ec-pro-image">
                                            <a href="landing_product?view=<?php echo $products['product_id']; ?>&category=<?php echo $products['category_id']; ?>" class="image">
                                                <img class="main-image" src="<?php echo $image_dir; ?>" alt="Product" />
                                            </a>
                                        </div>
                                    </div>
                                    <div class="ec-pro-content">
                                        <h5 class="ec-pro-title"><a href="landing_product?view=<?php echo $products['product_id']; ?>&category=<?php echo $products['category_id']; ?>"><?php echo $products['product_name']; ?></a></h5>
                                        <div class="ec-pro-rating">
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                            <i class="ecicon eci-star fill"></i>
                                        </div>
                                        <span class="ec-price">
                                            <span class="new-price">Ksh <?php echo number_format($products['product_price'], 2); ?></span>
                                        </span>
                                    </div>
                                </div>
                            </div>
                <?php }
                    }
                } ?>
            </div>
        </div>
    </section>
    <!-- Related Product end -->
    <!-- Footer Start -->
    <?php require_once('../app/partials/landing_footer.php'); ?>
    <!-- Footer Area End -->

    <!-- Vendor JS -->
    <?php require_once('../app/partials/landing_scripts.php'); ?>
</body>

</html>