<?php
/*
 *   Crafted On Mon Aug 29 2022
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
require_once('../app/helpers/users.php');
require_once('../app/partials/backoffice_head.php');
/* Load This Page With Variable From GET Function */
$get_id = mysqli_real_escape_string($mysqli, $_GET['view']);
$customer_sql = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id = '{$get_id}'");
if (mysqli_num_rows($customer_sql) > 0) {
    while ($customer = mysqli_fetch_array($customer_sql)) {
        /* Image Directory */
        if ($customer['user_profile_picture'] == '') {
            $profile_photo_directory = "../public/uploads/users/no-profile.png";
        } else {
            $profile_photo_directory = "../public/uploads/users/" . $customer['user_profile_picture'];
        }
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
                                    <h1><?php echo $customer['user_access_level']; ?> Profile</h1>
                                    <p class="breadcrumbs">
                                        <span><a href="dashboard">Home</a></span>
                                        <span><i class="mdi mdi-chevron-right"></i></span><a href="backoffice_manage_customers">Customers</a>
                                        <span><i class="mdi mdi-chevron-right"></i></span><a href="backoffice_manage_customers">Manage Customers</a>
                                        <span><i class="mdi mdi-chevron-right"></i><?php echo $customer['user_first_name'] . ' ' . $customer['user_last_name']; ?></span>
                                    </p>
                                </div>
                            </div>
                            <div class="card bg-white profile-content">
                                <div class="row">
                                    <div class="col-lg-4 col-xl-3">
                                        <div class="profile-content-left profile-left-spacing">
                                            <div class="text-center widget-profile px-0 border-0">
                                                <div class="card-img mx-auto rounded-circle">
                                                    <img src="<?php echo $profile_photo_directory; ?>" alt="user image">
                                                </div>
                                                <div class="card-body">
                                                    <h4 class="py-2 text-dark"><?php echo $customer['user_first_name'] . ' ' . $customer['user_last_name']; ?></h4>
                                                    <p><?php echo $customer['user_access_level']; ?></p>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-between ">
                                                <div class="text-center pb-4">
                                                    <h6 class="text-dark pb-2"></h6>
                                                    <p></p>
                                                </div>

                                                <div class="text-center pb-4">
                                                    <h6 class="text-dark pb-2"></h6>
                                                    <p></p>
                                                </div>

                                                <div class="text-center pb-4">
                                                    <h6 class="text-dark pb-2"></h6>
                                                    <p></p>
                                                </div>
                                            </div>

                                            <hr class="w-100">

                                            <div class="contact-info pt-4">
                                                <h5 class="text-dark">Contact Information</h5>
                                                <p class="text-dark font-weight-medium pt-24px mb-2">Email address</p>
                                                <p><?php echo $customer['user_email']; ?></p>
                                                <p class="text-dark font-weight-medium pt-24px mb-2">Phone Number</p>
                                                <p><?php echo $customer['user_phone_number']; ?></p>
                                                <p class="text-dark font-weight-medium pt-24px mb-2">Birthday</p>
                                                <p><?php echo date('M, d Y', strtotime($customer['user_dob'])); ?></p>
                                                <p class="text-dark font-weight-medium pt-24px mb-2">Address</p>
                                                <p><?php echo $customer['user_default_address']; ?></p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-xl-9">
                                        <div class="profile-content-right profile-right-spacing py-5">
                                            <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myProfileTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Edit Profile</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#profile_settings" type="button" role="tab">Change Password</button>
                                                </li>
                                            </ul>
                                            <div class="tab-content px-3 px-xl-5" id="myTabContent">

                                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                                    <div class="tab-pane-content mt-5">
                                                        <form method="post" enctype="multipart/form-data">
                                                            <div class="row mb-2">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="firstName">First name</label>
                                                                        <input type="text" required value="<?php echo $customer['user_first_name']; ?>" class="form-control" name="user_first_name">
                                                                        <input type="hidden" required value="<?php echo $customer['user_id']; ?>" class="form-control" name="user_id">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="lastName">Last name</label>
                                                                        <input type="text" required value="<?php echo $customer['user_last_name']; ?>" class="form-control" name="user_last_name">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group col-lg-12">
                                                                    <label for="email">Email</label>
                                                                    <input type="email" required value="<?php echo $customer['user_email']; ?>" class="form-control" name="user_email">
                                                                </div>

                                                                <div class="form-group col-lg-8">
                                                                    <label for="email">Phone Number</label>
                                                                    <input type="tel" minlength="12" maxlength="12" required value="<?php echo $customer['user_phone_number']; ?>" class="form-control" name="user_phone_number">
                                                                </div>

                                                                <div class="form-group col-lg-4">
                                                                    <label for="email">Date Of Birth</label>
                                                                    <input type="date" required value="<?php echo $customer['user_dob']; ?>" class="form-control" name="user_dob">
                                                                </div>

                                                                <div class="form-group col-lg-12">
                                                                    <label for="email">Address</label>
                                                                    <textarea class="form-control" required name="user_default_address"><?php echo $customer['user_default_address']; ?></textarea>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-group row mb-6">
                                                                <label for="coverImage" class="col-sm-4 col-lg-2 col-form-label">Profile Photo</label>
                                                                <div class="col-sm-8 col-lg-10">
                                                                    <div class="custom-file mb-1">
                                                                        <input type="file" accept=".png, .jpg" name="user_profile_picture" class="custom-file-input">
                                                                        <label class="custom-file-label" for="coverImage">
                                                                            Choose file...
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-end mt-5">
                                                                <button type="submit" name="Update_Customer_Profile" class="btn btn-primary mb-2 btn-pill">
                                                                    Update Profile
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                                <div class="tab-pane" id="profile_settings" role="tabpanel">
                                                    <div class="tab-pane-content mt-5">
                                                        <form method="post" autocomplete="off" enctype="multipart/form-data">
                                                            <div class="row mb-2">
                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="firstName">New Password</label>
                                                                        <input type="password" required class="form-control" name="new_password">
                                                                        <input type="hidden" required value="<?php echo $customer['user_id']; ?>" class="form-control" name="user_id">
                                                                    </div>
                                                                </div>

                                                                <div class="col-lg-6">
                                                                    <div class="form-group">
                                                                        <label for="lastName">Confirm Password</label>
                                                                        <input type="password" required class="form-control" name="confirm_password">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-end mt-5">
                                                                <button type="submit" name="Update_Staff_Password" class="btn btn-primary mb-2 btn-pill">
                                                                    Update Password
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-12 p-b-15">
                                        <!-- Recent Order Table -->
                                        <div class="card-table-border-none card-default recent-orders" id="recent-orders">
                                            <div class="card-header justify-content-between">
                                                <h2>Orders History</h2>
                                            </div>
                                            <div class="card-body pt-0 pb-5">
                                                <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Order ID</th>
                                                            <th>Product Name</th>
                                                            <th class="d-none d-lg-table-cell">Units</th>
                                                            <th class="d-none d-lg-table-cell">Order Date</th>
                                                            <th class="d-none d-lg-table-cell">Order Cost</th>
                                                            <th>Status</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        /* Fetch All Orders Made By This Fella - Sort Them By Date Added */
                                                        $orders_sql = mysqli_query(
                                                            $mysqli,
                                                            "SELECT * FROM orders o 
                                                                INNER JOIN products p 
                                                                ON p.product_id = o.order_product_id
                                                                WHERE o.order_delete_status = '0'
                                                                AND p.product_delete_status = '0'
                                                                AND o.order_product_id = '{$get_id}'
                                                                ORDER BY order_date ASC"
                                                        );
                                                        if (mysqli_num_rows($orders_sql) > 0) {
                                                            while ($orders = mysqli_fetch_array($orders_sql)) {
                                                        ?>
                                                                <tr>
                                                                    <td><?php echo $orders['order_code']; ?></td>
                                                                    <td>
                                                                        <a class="text-dark" href="backoffice_manage_customer?view=<?php echo $orders['user_id']; ?>"><?php echo $orders['user_first_name'] . ' ' . $orders['user_last_name']; ?></a>
                                                                    </td>
                                                                    <td class="d-none d-lg-table-cell"><?php echo $orders['order_qty']; ?> Unit(s)</td>
                                                                    <td class="d-none d-lg-table-cell"><?php echo date('M, d Y', strtotime($orders['order_date'])); ?></td>
                                                                    <td class="d-none d-lg-table-cell">Ksh <?php echo number_format($orders['order_cost']); ?></td>
                                                                    <td>
                                                                        <?php
                                                                        if ($orders['order_status'] == 'Placed Orders') { ?>
                                                                            <span class="badge badge-warning">Awaiting Fulfillment</span>
                                                                        <?php } else if ($orders['order_status'] == 'Awaiting Fullfilment') { ?>
                                                                            <span class="badge badge-warning">Awaiting Fulfillment</span>
                                                                        <?php } else if ($orders['order_status'] == 'Shipped') { ?>
                                                                            <span class="badge badge-primary">Shipped</span>
                                                                        <?php } else if ($orders['order_status'] == 'Out For Delivery') { ?>
                                                                            <span class="badge badge-primary">Out For Delivery</span>
                                                                        <?php } else if ($orders['order_status'] == 'Delivered') { ?>
                                                                            <span class="badge badge-success">Delivered</span>
                                                                        <?php } else { ?>
                                                                            <span class="badge badge-danger">Cancelled</span>
                                                                        <?php } ?>
                                                                    </td>
                                                                </tr>
                                                            <?php }
                                                        } else {
                                                            /* No Orders To Fetch */ ?>
                                                            <tr>
                                                                <td colspan="6" class="text-center">
                                                                    <span class="text-dark">There are no current orders posted.</span>
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
                            <hr>
                            <div class="row">
                                <div class="col-12">
                                    <div class="ec-vendor-list card card-default">
                                        <div class="card-header justify-content-between">
                                            <h2>Products Selling</h2>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table id="responsive-data-table" class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>Image</th>
                                                            <th>SKU</th>
                                                            <th>Name</th>
                                                            <th>QTY</th>
                                                            <th>Price</th>
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
                                                            AND p.product_delete_status = '0'
                                                            AND p.product_seller_id = '{$get_id}'"
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
                                                                    <td><?php echo $products['product_name']; ?></td>
                                                                    <td><?php echo $products['product_qty_in_stock']; ?></td>
                                                                    <td>Ksh <?php echo number_format($products['product_price'], 2); ?></td>
                                                                    <td>
                                                                        <div class="btn-group mb-1">
                                                                            <button type="button" class="btn btn-outline-success">Manage</button>
                                                                            <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                                                                <span class="sr-only">Manage</span>
                                                                            </button>

                                                                            <div class="dropdown-menu">
                                                                                <a class="dropdown-item" href="backoffice_manage_product?view=<?php echo $products['product_id']; ?>">View</a>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
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
            </div>
            <!-- End Wrapper -->

            <?php require_once('../app/partials/backoffice_scripts.php'); ?>

        </body>

        </html>
<?php
    }
} else {
    /* LOad 404 Page */
    include('error_404.php');
} ?>