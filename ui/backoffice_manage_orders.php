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
require_once('../app/helpers/orders.php');
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
                            <h1>Orders</h1>
                            <p class="breadcrumbs">
                                <span><a href="dashboard">Home</a></span>
                                <span><i class="mdi mdi-chevron-right"></i></span><a href="backoffice_manage_orders">Orders</a>
                                <span><i class="mdi mdi-chevron-right"></i></span>Manage Orders
                            </p>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">
                                Register Order
                            </button>
                        </div>
                    </div>

                    <!-- Add User Modal  -->
                    <div class="modal fade modal-add-contact" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="modal-header px-4">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Register New Order</h5>
                                    </div>

                                    <div class="modal-body px-4">
                                        <div class="row mb-2">
                                            <div class="form-row">
                                                <div class="form-group col-lg-12">
                                                    <label for="email">Select Customer</label>
                                                    <select type="text" required class="form-control" name="order_user_id">
                                                        <?php
                                                        $customer_sql = mysqli_query($mysqli, "SELECT * FROM users WHERE user_delete_status = '0' 
                                                        AND user_access_level = 'Customer' ORDER BY user_first_name ASC");
                                                        if (mysqli_num_rows($customer_sql) > 0) {
                                                            while ($customers = mysqli_fetch_array($customer_sql)) {
                                                        ?>
                                                                <option value="<?php echo $customers['user_id']; ?>"><?php echo $customers['user_first_name'] . ' ' . $customers['user_last_name'] . '.  Phone Number: ' . $customers['user_phone_number']; ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="form-group col-lg-8">
                                                    <label for="email">Select Product</label>
                                                    <select type="text" required class="form-control" name="order_product_id">
                                                        <option>Select Product</option>
                                                        <?php
                                                        $products_sql = mysqli_query($mysqli, "SELECT * FROM products WHERE product_delete_status = '0'");
                                                        if (mysqli_num_rows($products_sql) > 0) {
                                                            while ($products = mysqli_fetch_array($products_sql)) {
                                                        ?>
                                                                <option value="<?php echo $products['product_id']; ?>"><?php echo $products['product_name']; ?></option>
                                                        <?php }
                                                        } ?>
                                                    </select>
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label for="firstName">Order Qty</label>
                                                        <input type="number" required class="form-control" name="order_qty">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="lastName">Order Status</label>
                                                    <select type="text" required class="form-control" name="order_status">
                                                        <option value="Placed Orders">Order Placed</option>
                                                        <option>Awaiting Fullfilment</option>
                                                        <option>Shipped</option>
                                                        <option>Out For Delivery</option>
                                                        <option>Delivered</option>
                                                        <option>Returned</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group col-lg-6">
                                                <label for="email">Estimated Delivery Date</label>
                                                <input type="date" required class="form-control" name="order_estimated_delivery_date">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="modal-footer px-4">
                                        <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="Add_Order" class="btn btn-primary btn-pill">Register Order</button>
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
                                                    <th>Order Code</th>
                                                    <th>Customer Details</th>
                                                    <th>Order Items</th>
                                                    <th>Order Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                <?php
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
                                                    GROUP BY o.order_code"
                                                );
                                                if (mysqli_num_rows($orders_sql) > 0) {
                                                    while ($orders = mysqli_fetch_array($orders_sql)) {
                                                        /* Image Directory */
                                                        if ($orders['product_image'] == '') {
                                                            $image_dir = "../public/uploads/products/no_image.png";
                                                        } else {
                                                            $image_dir = "../public/uploads/products/" . $orders['product_image'];
                                                        }

                                                        /* Count Number Of Items In Order */
                                                        $query = "SELECT COUNT(*)  FROM orders WHERE order_code = '{$orders['order_code']}'";
                                                        $stmt = $mysqli->prepare($query);
                                                        $stmt->execute();
                                                        $stmt->bind_result($items_in_my_order);
                                                        $stmt->fetch();
                                                        $stmt->close();
                                                ?>
                                                        <tr>
                                                            <td>
                                                                <a href="backoffice_manage_order?view=<?php echo $orders['order_code']; ?>">
                                                                    <?php echo $orders['order_code']; ?>
                                                                </a>
                                                            </td>
                                                            <td>
                                                                Name: <?php echo $orders['user_first_name'] . ' ' . $orders['user_last_name']; ?><br>
                                                                Phone: <?php echo $orders['user_phone_number']; ?>
                                                            </td>
                                                            <td><?php echo $items_in_my_order; ?> Items</td>
                                                            <td>
                                                                <?php
                                                                if ($orders['order_status'] == 'Placed Orders') { ?>
                                                                    <span class="badge badge-warning">Order Placed</span>
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
                                                            <td>
                                                                <div class="btn-group mb-1">
                                                                    <button type="button" class="btn btn-outline-success">Manage</button>
                                                                    <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-display="static">
                                                                        <span class="sr-only">Manage</span>
                                                                    </button>

                                                                    <div class="dropdown-menu">
                                                                        <a class="dropdown-item" href="backoffice_manage_order?view=<?php echo $orders['order_code']; ?>">View</a>
                                                                        <a class="dropdown-item" href="backoffice_generate_delivery_note?view=<?php echo $orders['order_code']; ?>">Generate Delivery Note</a>
                                                                        <a class="dropdown-item" data-bs-toggle="modal" href="#update_order_status<?php echo $orders['order_code']; ?>">Update Status</a>
                                                                        <a class="dropdown-item" data-bs-toggle="modal" href="#update_order_<?php echo $orders['order_code']; ?>">Edit</a>
                                                                        <a class="dropdown-item" data-bs-toggle="modal" href="#delete_order_<?php echo $orders['order_code']; ?>">Delete</a>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        <!-- Delete Staff Modal -->
                                                        <?php include('../app/modals/manage_order.php'); ?>
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