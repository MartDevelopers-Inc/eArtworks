<?php
/*
 *   Crafted On Wed Aug 31 2022
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
require_once('../app/helpers/orders.php');
require_once('../app/partials/backoffice_head.php');
/* Load This Page With Variable From GET Function */
$get_id = mysqli_real_escape_string($mysqli, $_GET['view']);
$product_sql = mysqli_query(
    $mysqli,
    "SELECT * FROM orders o  
    INNER JOIN products p ON p.product_id = o.order_product_id
    INNER JOIN users u ON u.user_id = o.order_user_id
    INNER JOIN categories c ON c.category_id = p.product_category_id
    WHERE u.user_delete_status = '0' 
    AND c.category_delete_status = '0'
    AND p.product_delete_status = '0'
    AND o.order_delete_status = '0' 
    AND o.order_id = '{$get_id}'"
);
if (mysqli_num_rows($product_sql) > 0) {
    while ($product = mysqli_fetch_array($product_sql)) {
        /* Image Directory */
        if ($product['product_image'] == '') {
            $product_photo_directory = "../public/uploads/products/no_image.png";
        } else {
            $product_photo_directory = "../public/uploads/products/" . $product['product_image'];
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
                                    <h1>
                                        <?php echo $product['order_code']; ?> Details
                                    </h1>
                                    <?php
                                    if ($product['order_status'] == 'Placed Orders') { ?>
                                        <span class="badge badge-warning">Order Placed</span>
                                    <?php } else if ($product['order_status'] == 'Awaiting Fullfilment') { ?>
                                        <span class="badge badge-warning">Awaiting Fulfillment</span>
                                    <?php } else if ($product['order_status'] == 'Shipped') { ?>
                                        <span class="badge badge-primary">Shipped</span>
                                    <?php } else if ($product['order_status'] == 'Out For Delivery') { ?>
                                        <span class="badge badge-primary">Out For Delivery</span>
                                    <?php } else if ($product['order_status'] == 'Delivered') { ?>
                                        <span class="badge badge-success">Delivered</span>
                                    <?php } else { ?>
                                        <span class="badge badge-danger">Cancelled</span>
                                    <?php } ?>
                                    <p class="breadcrumbs">
                                        <span><a href="dashboard">Home</a></span>
                                        <span><i class="mdi mdi-chevron-right"></i></span><a href="backoffice_manage_orders">Orders</a>
                                        <span><i class="mdi mdi-chevron-right"></i></span><a href="backoffice_manage_orders">Manage Orders</a>
                                        <span><i class="mdi mdi-chevron-right"></i><?php echo $product['order_code']; ?></span>
                                    </p>
                                </div>
                            </div>
                            <div class="card bg-white profile-content">
                                <div class="row">
                                    <div class="col-lg-4 col-xl-4">
                                        <div class="profile-content-left profile-left-spacing">
                                            <div class="text-center widget-profile px-0 border-0">
                                                <div class="card-img mx-auto rounded-circle">
                                                    <img src="<?php echo $product_photo_directory; ?>" alt="user image">
                                                </div>
                                                <div class="card-body">
                                                    <h4 class="py-2 text-dark"><?php echo $product['product_name']; ?></h4>
                                                    <p><?php echo $product['product_sku_code']; ?></p>
                                                </div>
                                            </div>
                                            <hr>
                                            <div class="d-flex justify-content-between ">
                                                <div class="text-center pb-4">
                                                    <h6 class="text-dark pb-2">Category</h6>
                                                    <p><?php echo $product['category_name']; ?></p>
                                                </div>

                                                <div class="text-center pb-4">
                                                    <h6 class="text-dark pb-2">Quantity</h6>
                                                    <p><?php echo $product['order_qty']; ?></p>
                                                </div>

                                                <div class="text-center pb-4">
                                                    <h6 class="text-dark pb-2">Price</h6>
                                                    <p>Ksh <?php echo number_format($product['order_cost'], 2); ?></p>
                                                </div>
                                            </div>

                                            <hr class="w-100">

                                            <div class="contact-info pt-4">
                                                <h5 class="text-dark">Customer Information</h5>
                                                <p class="text-dark font-weight-medium pt-24px mb-2">Names</p>
                                                <p><?php echo $product['user_first_name'] . ' ' . $product['user_last_name']; ?></p>
                                                <p class="text-dark font-weight-medium pt-24px mb-2">Email Address</p>
                                                <p><?php echo $product['user_email']; ?></p>
                                                <p class="text-dark font-weight-medium pt-24px mb-2">Phone Number</p>
                                                <p><?php echo $product['user_phone_number']; ?></p>
                                                <p class="text-dark font-weight-medium pt-24px mb-2">Birthday</p>
                                                <p><?php echo date('M, d Y', strtotime($product['user_dob'])); ?></p>
                                                <p class="text-dark font-weight-medium pt-24px mb-2">Delivery Address</p>
                                                <p><?php echo $product['user_default_address']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-xl-8">
                                        <div class="profile-content-right profile-right-spacing py-5">
                                            <ul class="nav nav-tabs px-3 px-xl-5 nav-style-border" id="myProfileTab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Details</button>
                                                </li>

                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Payment History</button>
                                                </li>

                                            </ul>
                                            <div class="tab-content px-3 px-xl-5" id="myTabContent">

                                                <div class="tab-pane fade show active" id="profile" role="tabpanel">
                                                    <div class="tab-pane-content mt-5">
                                                        <h5 class="text-dark">Product details</h5>
                                                        <?php echo $product['product_details']; ?>
                                                        <hr>
                                                        <h5 class="text-dark">Order details</h5>
                                                        Order Date Made: <?php echo date('d M Y', strtotime($product['order_date'])); ?><br>
                                                        Estimated Delivery Date: <?php echo date('d M Y', strtotime($product['order_estimated_delivery_date'])); ?> <br>
                                                        Order Payment Status:
                                                        <?php
                                                        if ($product['order_payment_status'] == 'Pending') { ?>
                                                            <span class="badge badge-danger">Payment Pending</span>
                                                        <?php } else { ?>
                                                            <span class="badge badge-success">Order Paid</span>
                                                        <?php } ?>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="nav-home" role="tabpanel">
                                                    <div class="tab-pane-content mt-5">
                                                        <table class="table card-table table-responsive table-responsive-large" style="width:100%">
                                                            <thead>
                                                                <tr>
                                                                    <th>Payment REF</th>
                                                                    <th>Payment Amount</th>
                                                                    <th class="d-none d-lg-table-cell">Payment Date</th>
                                                                    <th class="d-none d-lg-table-cell">Payment Means</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php
                                                                /* Fetch All Orders Made To This Product - Sort Them By Date Added */
                                                                $payments_sql = mysqli_query(
                                                                    $mysqli,
                                                                    "SELECT * FROM payments p
                                                                    INNER JOIN orders o ON order_id = p.payment_order_id
                                                                    INNER JOIN payment_means pm ON pm.means_id = p.payment_means_id
                                                                    WHERE p.payment_order_id = '{$get_id}'"
                                                                );
                                                                if (mysqli_num_rows($payments_sql) > 0) {
                                                                    while ($payment = mysqli_fetch_array($payments_sql)) {
                                                                ?>
                                                                        <tr>
                                                                            <td><?php echo $payment['payment_ref_code']; ?></td>
                                                                            <td class="d-none d-lg-table-cell">Ksh <?php echo number_format($payment['payment_amount']); ?></td>
                                                                            <td class="d-none d-lg-table-cell"><?php echo date('M, d Y', strtotime($payment['payment_date'])); ?></td>
                                                                            <td class="d-none d-lg-table-cell"><?php echo $payment['means_code'] . ' ' . $payment['means_name']; ?></td>
                                                                        </tr>
                                                                    <?php }
                                                                } else {
                                                                    /* No Payments To Fetch */ ?>
                                                                    <tr>
                                                                        <td colspan="6" class="text-center">
                                                                            <span class="text-dark">There are no current orders payments posted.</span>
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