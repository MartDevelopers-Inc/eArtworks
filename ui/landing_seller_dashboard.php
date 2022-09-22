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
require_once('../app/settings/codeGen.php');
require_once('../app/settings/checklogin.php');
checklogin();
require_once('../app/helpers/seller_analytics.php');
require_once('../app/partials/landing_head.php');
?>

<body class="shop_page">
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
                            <h2 class="ec-breadcrumb-title">Seller Dashboard</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="../">Home</a></li>
                                <li class="ec-breadcrumb-item active">Dashboard</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Vendor dashboard section -->
    <section class="ec-page-content ec-vendor-dashboard section-space-p">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                <?php require_once('../app/partials/landing_seller_sidebar.php'); ?>

                <div class="ec-shop-rightside col-lg-9 col-md-12">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="ec-vendor-dashboard-sort-card color-blue">
                                <h5>Products</h5>
                                <h3><?php echo $my_products; ?></h3>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="ec-vendor-dashboard-sort-card color-green">
                                <h5>Orders</h5>
                                <h3><?php echo $my_orders; ?></h3>
                            </div>
                        </div>
                    </div>
                    <div class="ec-vendor-dashboard-card space-bottom-30">
                        <div class="ec-vendor-card-header">
                            <h5>Latest Orders</h5>
                            <div class="ec-header-btn">
                                <a class="btn btn-lg btn-primary" href="landing_seller_orders">View All</a>
                            </div>
                        </div>
                        <div class="ec-vendor-card-body">
                            <div class="ec-vendor-card-table">
                                <table class="table ec-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Order#</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">SKU</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">QTY</th>
                                            <th scope="col">Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        /* Pull All Orders By For Products Owned By This Fella */
                                        $orders_sql = mysqli_query(
                                            $mysqli,
                                            "SELECT * FROM orders o  
                                            INNER JOIN products p ON p.product_id = o.order_product_id
                                            INNER JOIN users u ON u.user_id = o.order_user_id
                                            INNER JOIN categories c ON c.category_id = p.product_category_id
                                            WHERE u.user_delete_status = '0' 
                                            AND c.category_delete_status = '0'
                                            AND p.product_delete_status = '0'
                                            AND o.order_delete_status = '0'
                                            AND p.product_seller_id = '{$user_id}'
                                            ORDER BY o.order_date DESC
                                            "
                                        );
                                        if (mysqli_num_rows($orders_sql) > 0) {
                                            while ($orders = mysqli_fetch_array($orders_sql)) {
                                                /* Image Directory */
                                                if ($orders['product_image'] == '') {
                                                    $image_dir = "../public/uploads/products/no_image.png";
                                                } else {
                                                    $image_dir = "../public/uploads/products/" . $orders['product_image'];
                                                }

                                        ?>
                                                <tr>
                                                    <th scope="row"><span><?php echo $orders['order_code']; ?></span></th>
                                                    <td>
                                                        <img class="prod-img" src="<?php echo $image_dir; ?>" alt="product image">
                                                    </td>
                                                    <td><span><?php echo $orders['product_sku_code']; ?></span></td>
                                                    <td><span><?php echo $orders['product_name']; ?></span></td>
                                                    <td><span><?php echo $orders['order_qty']; ?></span></td>
                                                    <td><span><?php echo date('d M Y', strtotime($orders['order_date'])); ?></span></td>
                                                </tr>
                                            <?php }
                                        } else { ?>
                                            <tr>
                                                <td colspan="8" align="center">
                                                    No orders available
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="ec-vendor-dashboard-card space-bottom-30">
                        <div class="ec-vendor-card-header">
                            <h5>Product List</h5>
                            <div class="ec-header-btn">
                                <a class="btn btn-lg btn-primary" href="landing_seller_products">View All</a>
                                <a class="btn btn-lg btn-primary" href="landing_seller_add_product">Add</a>
                            </div>
                        </div>
                        <div class="ec-vendor-card-body">
                            <div class="ec-vendor-card-table">
                                <table class="table ec-table">
                                    <thead>
                                        <tr>
                                            <th scope="col">SKU</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Qty In Stock</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        /* Pop All Products Owned By This Fella */
                                        $products_sql = mysqli_query(
                                            $mysqli,
                                            "SELECT * FROM products p
                                            INNER JOIN users u ON u.user_id = p.product_seller_id
                                            INNER JOIN categories c ON c.category_id = p.product_category_id
                                            WHERE u.user_delete_status = '0' 
                                            AND c.category_delete_status = '0'
                                            AND p.product_delete_status = '0'
                                            AND p.product_seller_id = '{$user_id}'
                                            ORDER BY RAND() LIMIT 5"
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
                                                <tr>
                                                    <th scope="row"><span><?php echo $products['product_sku_code']; ?></span></th>
                                                    <td><img class="prod-img" src="<?php echo $image_dir; ?>" alt="product image"></td>
                                                    <td><span><?php echo $products['product_name']; ?></span></td>
                                                    <td><span>Ksh<?php echo number_format($products['product_price'], 2); ?></span></td>
                                                    <td><span><?php echo $products['product_qty_in_stock']; ?></span></td>
                                                </tr>
                                            <?php }
                                        } else { ?>
                                            <tr>
                                                <td colspan="8" align="center">
                                                    No products available
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Vendor dashboard section -->

    <!-- Footer Start -->
    <?php require_once('../app/partials/landing_footer.php'); ?>
    <!-- Footer Area End -->

    <?php require_once('../app/partials/landing_scripts.php'); ?>

</body>


</html>