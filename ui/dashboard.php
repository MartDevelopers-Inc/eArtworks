<?php
/*
 *   Crafted On Wed Aug 24 2022
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
require_once('../app/partials/backoffice_head.php');
?>

<body class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">

    <!--  WRAPPER  -->
    <div class="wrapper">

        <!-- LEFT MAIN SIDEBAR -->
        <?php require_once('../app/partials/backoffice_sidebar.php'); ?>

        <!--  PAGE WRAPPER -->
        <div class="ec-page-wrapper">

            <!-- Header -->
            <?php require_once('../app/partials/backoffice_header.php'); ?>

            <!-- CONTENT WRAPPER -->
            <div class="ec-content-wrapper">
                <div class="content">
                    <!-- Top Statistics -->
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                            <div class="card card-mini dash-card card-1">
                                <div class="card-body">
                                    <h2 class="mb-1">1,503</h2>
                                    <p>Customers</p>
                                    <span class="mdi mdi-account-group"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                            <div class="card card-mini dash-card card-2">
                                <div class="card-body">
                                    <h2 class="mb-1">79,503</h2>
                                    <p>Staffs</p>
                                    <span class="mdi mdi-account-group-outline"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                            <div class="card card-mini dash-card card-3">
                                <div class="card-body">
                                    <h2 class="mb-1">15,503</h2>
                                    <p>Products</p>
                                    <span class="mdi mdi-palette-advanced"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                            <div class="card card-mini dash-card card-4">
                                <div class="card-body">
                                    <h2 class="mb-1">Ksh 98,503</h2>
                                    <p>Overall Revenue</p>
                                    <span class="mdi mdi-currency-usd"></span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Orders statistics -->
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                            <div class="card card-mini dash-card card-1">
                                <div class="card-body">
                                    <h2 class="mb-1">1,503</h2>
                                    <p>Placed Orders</p>
                                    <span class="mdi mdi-cart-plus"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                            <div class="card card-mini dash-card card-2">
                                <div class="card-body">
                                    <h2 class="mb-1">79,503</h2>
                                    <p>Awaiting Fulfilment</p>
                                    <span class="mdi mdi-cart-arrow-down"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                            <div class="card card-mini dash-card card-3">
                                <div class="card-body">
                                    <h2 class="mb-1">15,503</h2>
                                    <p>Shipped Orders</p>
                                    <span class="mdi mdi-car-limousine"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
                            <div class="card card-mini dash-card card-4">
                                <div class="card-body">
                                    <h2 class="mb-1">Ksh 98,503</h2>
                                    <p>Out For Delivery</p>
                                    <span class="mdi mdi-dolly"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-sm-6 p-b-15 lbl-card">
                            <div class="card card-mini dash-card card-1">
                                <div class="card-body">
                                    <h2 class="mb-1">1,503</h2>
                                    <p>Delivered Orders</p>
                                    <span class="mdi mdi-package-variant"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-sm-6 p-b-15 lbl-card">
                            <div class="card card-mini dash-card card-2">
                                <div class="card-body">
                                    <h2 class="mb-1">79,503</h2>
                                    <p>Returned Orders</p>
                                    <span class="mdi mdi-account-clock"></span>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-12 p-b-15">
                            <!-- Recent Order Table -->
                            <div class="card card-table-border-none card-default recent-orders" id="recent-orders">
                                <div class="card-header justify-content-between">
                                    <h2>Recent Orders</h2>
                                    <!-- 
                                        Enable This When You Know What You Are Doing
                                        <div class="date-range-report">
                                        <span></span>
                                    </div>
                                    -->
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
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            /* Fetch All Orders - Sort Them By Date Added */
                                            $orders_sql = mysqli_query(
                                                $mysqli,
                                                "SELECT * FROM orders o 
                                                INNER JOIN products p 
                                                ON p.product_id = o.order_product_id
                                                WHERE o.order_delete_status = '0'
                                                ORDER BY order_date ASC"
                                            );
                                            if (mysqli_num_rows($orders_sql) > 0) {
                                                while ($orders = mysqli_fetch_array($orders_sql)) {
                                            ?>
                                                    <tr>
                                                        <td><?php echo $orders['order_code']; ?></td>
                                                        <td>
                                                            <a class="text-dark" href="backoffice_products?view=<?php echo $orders['product_id']; ?>">Coach Swagger</a>
                                                        </td>
                                                        <td class="d-none d-lg-table-cell"><?php echo $orders['order_qty']; ?> Unit(s)</td>
                                                        <td class="d-none d-lg-table-cell"><?php echo date('M, d Y', strtotime($orders['order_date'])); ?></td>
                                                        <td class="d-none d-lg-table-cell"><?php echo number_format($orders['order_cost']); ?></td>
                                                        <td>
                                                            <?php
                                                            if ($orders['order_status'] == 'Order Placed') { ?>
                                                                <span class="badge badge-warning">Awaiting Fulfillment</span>
                                                            <?php } else if ($orders['order_status'] == 'Awaiting Fulfillment') { ?>
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
                                                        <td class="text-right">
                                                            <div class="dropdown show d-inline-block widget-dropdown">
                                                                <a class="dropdown-toggle icon-burger-mini" href="#" role="button" id="dropdown-recent-order1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static"></a>
                                                                <ul class="dropdown-menu dropdown-menu-right">
                                                                    <li class="dropdown-item">
                                                                        <a href="backoffice_order?view=">View</a>
                                                                    </li>
                                                                    <li class="dropdown-item">
                                                                        <!-- Implement Delete Order Via Modal -->
                                                                        <a href="#">Delete</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
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

                    <div class="row">
                        <div class="col-xl-5">
                            <!-- New Customers -->
                            <div class="card ec-cust-card card-table-border-none card-default">
                                <div class="card-header justify-content-between ">
                                    <h2>New Customers</h2>
                                </div>
                                <div class="card-body pt-0 pb-15px">
                                    <table class="table ">
                                        <tbody>
                                            <?php
                                            /* Fetch Top 10 Registered Customers - Sort Them By Date Added */
                                            $users_sql = mysqli_query(
                                                $mysqli,
                                                "SELECT * FROM users
                                                WHERE user_access_level = 'Customer'
                                                AND user_delete_status = '0'
                                                ORDER BY user_date_joined ASC
                                                LIMIT 5"
                                            );
                                            if (mysqli_num_rows($users_sql) > 0) {
                                                while ($customers = mysqli_fetch_array($users_sql)) {
                                                    /* Load User Image */
                                                    if ($customers['user_profile_picture'] == '') {
                                                        $image_dir = "../public/uploads/users/no-profile.png";
                                                    } else {
                                                        $image_dir = "../public/uploads/users/" . $customers['user_profile_picture'];
                                                    }
                                            ?>
                                                    <tr>
                                                        <td>
                                                            <div class="media">
                                                                <div class="media-image mr-3 rounded-circle">
                                                                    <a href="backoffice_customer?view=<?php echo $customers['user_id']; ?>">
                                                                        <img class="profile-img rounded-circle w-45" src="<?php echo $image_dir; ?>" alt="customer image">
                                                                    </a>
                                                                </div>
                                                                <div class="media-body align-self-center">
                                                                    <a href="backoffice_customer?view=<?php echo $customers['user_id']; ?>">
                                                                        <h6 class="mt-0 text-dark font-weight-medium">
                                                                            <?php echo $customers['user_first_name'] . ' ' . $customers['user_last_name']; ?>
                                                                        </h6>
                                                                    </a>
                                                                    <small><?php echo $customers['user_email']; ?></small>
                                                                </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                <?php
                                                }
                                            } else
                                            /* No Customers */ {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <div class="media">
                                                            <div class="media-image mr-3 rounded-circle">
                                                                <img class="profile-img rounded-circle w-45" src="../public/uploads/users/no-profile.png" alt="customer image">
                                                            </div>
                                                            <div class="media-body align-self-center">
                                                                <h6 class="mt-0 text-dark font-weight-medium">
                                                                    There are currently no registered customers.
                                                                </h6>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-7">
                            <!-- Top Products -->
                            <div class="card card-default ec-card-top-prod">
                                <div class="card-header justify-content-between">
                                    <h2>Top Orders & Products</h2>
                                </div>
                                <div class="card-body mt-10px mb-10px py-0">
                                    <?php
                                    /* Fetch Products With Top Sales -
                                    Revise This Logic Later
                                    */
                                    $orders_sql = mysqli_query(
                                        $mysqli,
                                        "SELECT * FROM orders o 
                                        INNER JOIN products p 
                                        ON p.product_id = o.order_product_id
                                        WHERE o.order_delete_status = '0'
                                        ORDER BY o.order_qty ASC
                                        LIMIT 5
                                        "
                                    );
                                    if (mysqli_num_rows($orders_sql) > 0) {
                                        while ($top_product = mysqli_fetch_array($orders_sql)) {
                                            /* Load Product Image */
                                            if ($top_product['product_image'] == '') {
                                                $product_image_dir = "../public/uploads/products/no_image.png";
                                            } else {
                                                $product_image_dir = "../public/uploads/products/" . $top_product['product_image'];
                                            }
                                    ?>
                                            <div class="row media d-flex pt-15px pb-15px">
                                                <div class="col-lg-3 col-md-3 col-2 media-image align-self-center rounded">
                                                    <a href="#">
                                                        <img src="<?php echo $product_image_dir; ?>" alt="Product Image">
                                                    </a>
                                                </div>
                                                <div class="col-lg-9 col-md-9 col-10 media-body align-self-center ec-pos">
                                                    <a href="#">
                                                        <h6 class="mb-10px text-dark font-weight-medium"><?php echo $top_product['product_name']; ?></h6>
                                                    </a>
                                                    <p class="float-md-right sale">
                                                        <span class="mr-2"><?php echo $top_product['order_qty']; ?></span>Order Items
                                                    </p>
                                                    <p class="mb-0 ec-price">
                                                        <span class="text-dark">Ksh <?php echo number_format($top_product['order_cost']); ?></span>
                                                    </p>
                                                </div>
                                            </div>
                                        <?php }
                                    } else { ?>
                                        <div class="row media d-flex pt-15px pb-15px">
                                            <div class="col-lg-9 col-md-9 col-10 media-body align-self-center ec-pos">
                                                <a href="#">
                                                    <h6 class="mb-10px text-dark font-weight-medium">
                                                        There are currently no top products or orders.
                                                    </h6>
                                                </a>
                                            </div>
                                        </div>
                                    <?php } ?>
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