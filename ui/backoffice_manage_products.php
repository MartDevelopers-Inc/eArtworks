<?php
/*
 *   Crafted On Sun Aug 28 2022
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
require_once('../app/partials/backoffice_head.php');
?>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-dark ec-header-light" id="body">

    <!-- WRAPPER -->
    <div class="wrapper">

        <!-- LEFT MAIN SIDEBAR -->
        <?php require_once('../app/partials/backoffice_sidebar.php'); ?>


        <!-- PAGE WRAPPER -->
        <div class="ec-page-wrapper">

            <!-- Header -->
            <?php require_once('../app/partials/backoffice_header.php'); ?>

            <!-- CONTENT WRAPPER -->
            <div class="ec-content-wrapper">
                <div class="content">
                    <div class="breadcrumb-wrapper breadcrumb-contacts">
                        <div>
                            <h1>Products</h1>
                            <p class="breadcrumbs">
                                <span><a href="dashboard">Home</a></span>
                                <span><i class="mdi mdi-chevron-right"></i></span><a href="backoffice_manage_products">Products</a>
                                <span><i class="mdi mdi-chevron-right"></i></span>Manage Products
                            </p>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">
                                Register Product
                            </button>
                        </div>
                    </div>

                    <!-- Add  Modal  -->
                    <div class="modal fade modal-add-contact" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="modal-header px-4">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Register New Product</h5>
                                    </div>

                                    <div class="modal-body px-4">
                                        <div class="row mb-2">
                                            <div class="col-lg-8">
                                                <div class="form-group">
                                                    <label for="firstName">Product Name</label>
                                                    <input type="text" required class="form-control" name="product_name">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="lastName">Available From</label>
                                                    <input type="date" required class="form-control" name="product_available_from">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="lastName">SKU Code</label>
                                                    <input type="text" required class="form-control" value="<?php echo $sku_code; ?>" name="product_sku_code">
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-4">
                                                <label for="email">Product price (Ksh)</label>
                                                <input type="number" required class="form-control" name="product_price">
                                            </div>

                                            <div class="form-group col-lg-4">
                                                <label for="email">Quantity In Stock</label>
                                                <input type="number" required class="form-control" name="product_qty_in_stock">
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-lg-8">
                                                    <label for="email">Select Product Seller</label>
                                                    <select type="text" required class="form-control" name="product_seller_id">
                                                        <?php
                                                        $sellers_sql = mysqli_query($mysqli, "SELECT * FROM users WHERE user_delete_status = '0' 
                                                    AND user_access_level = 'Customer' ORDER BY user_first_name ASC");
                                                        if (mysqli_num_rows($sellers_sql) > 0) {
                                                            while ($sellers = mysqli_fetch_array($sellers_sql)) {
                                                        ?>
                                                                <option value="<?php echo $sellers['user_id']; ?>"><?php echo $sellers['user_first_name'] . ' ' . $sellers['user_last_name'] . '.  Phone Number: ' . $sellers['user_phone_number']; ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-4">
                                                    <label for="email">Select Product Category</label>
                                                    <select type="text" required class="form-control" name="product_category_id">
                                                        <?php
                                                        $categories_sql = mysqli_query($mysqli, "SELECT * FROM categories WHERE category_delete_status = '0' ORDER BY category_name ASC");
                                                        if (mysqli_num_rows($categories_sql) > 0) {
                                                            while ($product_categories = mysqli_fetch_array($categories_sql)) {
                                                        ?>
                                                                <option value="<?php echo $product_categories['category_id']; ?>"><?php echo $product_categories['category_code'] . ' ' .  $product_categories['category_name']; ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row mb-6">
                                                <label for="coverImage" class="col-sm-12 col-lg-12 col-form-label">Product Image</label>
                                                <div class="col-sm-12 col-lg-12">
                                                    <div class="custom-file mb-1">
                                                        <input type="file" required accept=".png, .jpg, .jpeg" name="product_image" class="custom-file-input">
                                                        <label class="custom-file-label" for="coverImage">
                                                            Choose file...
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="form-group col-lg-12">
                                                <label for="email">Product Details</label>
                                                <textarea class="form-control" required name="product_details"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer px-4">
                                        <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="Register_New_Product" class="btn btn-primary btn-pill">Register Product</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="ec-vendor-list card card-default">
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="responsive-data-table" class="table">
                                            <thead>
                                                <tr>
                                                    <th>Image</th>
                                                    <th>SKU</th>
                                                    <th>Name</th>
                                                    <th>Seller</th>
                                                    <th>QTY</th>
                                                    <th>Price</th>
                                                    <th>Available From</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
                                                $products_sql = mysqli_query(
                                                    $mysqli,
                                                    "SELECT * FROM products p
                                                    INNER JOIN users u ON u.user_id = p.product_seller_id
                                                    INNER JOIN categories c ON c.category_id = p.product_category_id
                                                    WHERE u.user_delete_status = '0' 
                                                    AND c.category_delete_status = '0'
                                                    AND p.product_delete_status = '0'"
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
                                                            <td><img class="vendor-thumb" src="<?php echo $image_dir; ?>" alt="Product" /></td>
                                                            <td><?php echo $products['product_sku_code']; ?></td>
                                                            <td>
                                                                <?php echo $products['product_name']; ?>
                                                            </td>
                                                            <td><?php echo $products['user_first_name'] . ' ' . $products['user_last_name']; ?></td>
                                                            <td><?php echo $products['product_qty_in_stock']; ?></td>
                                                            <td>Ksh <?php echo number_format($products['product_price'], 2); ?></td>
                                                            <td>
                                                                <?php echo date('d M Y', strtotime($products['product_available_from'])); ?>
                                                            </td>
                                                            <td>
                                                                <div class="btn-group mb-1">
                                                                    <button type="button" class="btn btn-outline-success">Manage</button>
                                                                    <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                                                        <span class="sr-only">Manage</span>
                                                                    </button>

                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="backoffice_manage_product?view=<?php echo $products['product_id']; ?>">View</a>
                                                                        <a class="dropdown-item" data-bs-toggle="modal" href="#delete_product_<?php echo $products['product_id']; ?>">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <!-- Delete Staff Modal -->
                                                        <?php include('../app/modals/delete_product.php'); ?>
                                                        <!-- End Modal -->
                                                <?php }
                                                } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div> <!-- End Content -->
            </div> <!-- End Content Wrapper -->

            <!-- Footer -->
            <?php require_once('../app/partials/backoffice_footer.php'); ?>

        </div> <!-- End Page Wrapper -->
    </div> <!-- End Wrapper -->

    <?php require_once('../app/partials/backoffice_scripts.php'); ?>
</body>


</html>