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
require_once('../app/helpers/artworks.php');
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
                            <h2 class="ec-breadcrumb-title">Add Product</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="../">Home</a></li>
                                <li class="ec-breadcrumb-item"><a href="../">Dashboard</a></li>
                                <li class="ec-breadcrumb-item active">Add Product</li>
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
                <?php
                require_once('../app/partials/landing_seller_sidebar.php');
                $product_id = mysqli_real_escape_string($mysqli, $_GET['view']);
                $product_sql = mysqli_query(
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
                if (mysqli_num_rows($product_sql) > 0) {
                    while ($product = mysqli_fetch_array($product_sql)) {
                ?>

                        <div class="ec-shop-rightside col-lg-9 col-md-12">
                            <div class="ec-vendor-dashboard-card space-bottom-30">
                                <div class="ec-vendor-card-header">
                                    <h5>Update <?php echo $product['product_name']; ?></h5>
                                    <div class="ec-header-btn">
                                        <a class="btn btn-lg btn-primary" href="landing_seller_products">View All</a>
                                    </div>
                                </div>
                                <div class="ec-vendor-card-body">
                                    <div class="ec-vendor-card-table">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="modal-body px-4">
                                                <div class="row mb-2">
                                                    <div class="col-lg-8">
                                                        <div class="form-group">
                                                            <label for="firstName">Product Name</label>
                                                            <input type="hidden" required class="form-control" name="product_seller_id" value="<?php echo $product['product_seller_id']; ?>">
                                                            <input type="hidden" required class="form-control" name="product_id" value="<?php echo $product['product_id']; ?>">
                                                            <input type="text" required class="form-control" name="product_name" value="<?php echo $product['product_name']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-group">
                                                            <label for="lastName">Available From</label>
                                                            <input type="date" required class="form-control" name="product_available_from" value="<?php echo date('Y-m-d', strtotime($product['product_available_from'])); ?>">
                                                        </div>
                                                    </div>
                                                    <div class=" col-lg-4" style="display: none;">
                                                        <div class="form-group">
                                                            <label for="lastName">SKU Code</label>
                                                            <input type="text" required class="form-control" value="<?php echo $product['product_sku_code']; ?>" name="product_sku_code">
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <label for="email">Product price (Ksh)</label>
                                                        <input type="number" required class="form-control" name="product_price" value="<?php echo $product['product_price']; ?>">
                                                    </div>

                                                    <div class="form-group col-lg-6">
                                                        <label for="email">Quantity In Stock</label>
                                                        <input type="number" required class="form-control" name="product_qty_in_stock" value="<?php echo $product['product_qty_in_stock']; ?>">
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-lg-12">
                                                            <label for="email">Select Product Category</label>
                                                            <select type="text" required class="form-control" name="product_category_id">
                                                                <option value="<?php echo $product['category_id']; ?>"><?php echo $product['category_code'] . ' ' .  $product['category_name']; ?></option>
                                                                <?php
                                                                $categories_sql = mysqli_query($mysqli, "SELECT * FROM categories
                                                                WHERE category_delete_status = '0' 
                                                                AND category_id !='{$product['category_id']}'
                                                                ORDER BY category_name ASC
                                                                ");
                                                                if (mysqli_num_rows($categories_sql) > 0) {
                                                                    while ($product_categories = mysqli_fetch_array($categories_sql)) {
                                                                ?>
                                                                        <option value="<?php echo $product_categories['category_id']; ?>"><?php echo $product_categories['category_code'] . ' ' .  $product_categories['category_name']; ?></option>
                                                                <?php }
                                                                } ?>
                                                            </select>
                                                        </div>

                                                        <div class="form-group col-lg-12">
                                                            <label for="email">Product Image</label>
                                                            <input type="file" accept=".png, .jpg, .jpeg" name="product_image" class="form-control">
                                                        </div>
                                                    </div>

                                                    <div class="form-group col-lg-12">
                                                        <label for="email">Product Details</label>
                                                        <textarea class="form-control" rows="5" required name="product_details"><?php echo $product['product_details']; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="modal-footer px-4">
                                                <button type="submit" name="Update_Product" class="btn btn-primary btn-pill">Update Product</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                        </div>
                <?php
                    }
                } ?>
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