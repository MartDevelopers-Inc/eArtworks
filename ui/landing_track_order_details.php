<?php
/*
 *   Crafted On Sun Aug 21 2022
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
require_once('../app/settings/codeGen.php');
require_once('../app/settings/fluttterwave_api_configs.php');
require_once('../app/settings/mpesa_daraja_api_config.php');
checklogin();
require_once('../app/helpers/payments.php');
require_once('../app/partials/landing_head.php');
?>

<body class="track_order_page">
    <div id="ec-overlay"><span class="loader_img"></span></div>

    <!-- Header start  -->
    <?php require_once('../app/partials/landing_navigation.php');
    $order_code = mysqli_real_escape_string($mysqli, $_GET['view']);
    /* Pull Recent Purchases Made By This User */
    $order_user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
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
        AND o.order_code = '{$order_code}'
        GROUP BY o.order_code"
    );
    if (mysqli_num_rows($orders_sql) > 0) {
        while ($orders = mysqli_fetch_array($orders_sql)) {
    ?>
            <!-- Header End  -->

            <!-- Ec breadcrumb start -->
            <div class="sticky-header-next-sec  ec-breadcrumb section-space-mb">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="row ec_breadcrumb_inner">
                                <div class="col-md-6 col-sm-12">
                                    <h2 class="ec-breadcrumb-title">Track Order</h2>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <!-- ec-breadcrumb-list start -->
                                    <ul class="ec-breadcrumb-list">
                                        <li class="ec-breadcrumb-item"><a href="../">Home</a></li>
                                        <li class="ec-breadcrumb-item"><a href="landing_track_order">Orders</a></li>
                                        <li class="ec-breadcrumb-item active">Track</li>
                                    </ul>
                                    <!-- ec-breadcrumb-list end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ec breadcrumb end -->

            <!-- Ec Track Order section -->
            <section class="ec-page-content section-space-p">
                <div class="container">
                    <!-- Track Order Content Start -->
                    <div class="ec-trackorder-content col-md-12">
                        <div class="ec-trackorder-inner">
                            <div class="ec-trackorder-top">
                                <h2 class="ec-order-id">Order #<?php echo $orders['order_code']; ?></h2>
                                <div class="ec-order-detail">
                                    <div>Expected arrival date: <?php echo date('d M Y', strtotime($orders['order_estimated_delivery_date'])); ?></div>
                                </div>
                            </div>
                            <div class="ec-trackorder-bottom">
                                <div class="ec-progress-track">
                                    <ul id="ec-progressbar">
                                        <?php
                                        if ($orders['order_status'] == 'Placed Orders') { ?>
                                            <li class="step0 active">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_1.png" alt="track_order">
                                                </span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    order <br>processing
                                                </span>
                                            </li>
                                            <li class="step0">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_2.png" alt="track_order"></span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    Awaiting <br>Fullfilment</span>
                                            </li>
                                            <li class="step0">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_3.png" alt="track_order"></span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    order <br>shipped
                                                </span>
                                            </li>
                                            <li class="step0">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_4.png" alt="track_order"></span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    Out For <br> Delivery
                                                </span>
                                            </li>
                                            <li class="step0">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_5.png" alt="track_order"></span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    order <br>arrived
                                                </span>
                                            </li>
                                        <?php } else if ($orders['order_status'] == 'Awaiting Fullfilment') { ?>
                                            <li class="step0 active">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_1.png" alt="track_order">
                                                </span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    order <br>processing
                                                </span>
                                            </li>
                                            <li class="step0 active">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_2.png" alt="track_order"></span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    Awaiting <br>Fullfilment</span>
                                            </li>
                                            <li class="step0">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_3.png" alt="track_order"></span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    order <br>shipped
                                                </span>
                                            </li>
                                            <li class="step0">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_4.png" alt="track_order"></span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    Out For <br> Delivery
                                                </span>
                                            </li>
                                            <li class="step0">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_5.png" alt="track_order"></span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    order <br>arrived
                                                </span>
                                            </li>
                                        <?php } else if ($orders['order_status'] == 'Shipped') { ?>
                                            <li class="step0 active">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_1.png" alt="track_order">
                                                </span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    order <br>processing
                                                </span>
                                            </li>
                                            <li class="step0 active">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_2.png" alt="track_order"></span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    Awaiting <br>Fullfilment</span>
                                            </li>
                                            <li class="step0 active">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_3.png" alt="track_order"></span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    order <br>shipped
                                                </span>
                                            </li>
                                            <li class="step0">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_4.png" alt="track_order"></span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    Out For <br> Delivery
                                                </span>
                                            </li>
                                            <li class="step0">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_5.png" alt="track_order"></span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    order <br>arrived
                                                </span>
                                            </li>
                                        <?php } else if ($orders['order_status'] == 'Out For Delivery') { ?>
                                            <li class="step0 active">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_1.png" alt="track_order">
                                                </span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    order <br>processing
                                                </span>
                                            </li>
                                            <li class="step0 active">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_2.png" alt="track_order"></span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    Awaiting <br>Fullfilment</span>
                                            </li>
                                            <li class="step0 active">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_3.png" alt="track_order"></span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    order <br>shipped
                                                </span>
                                            </li>
                                            <li class="step0 active">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_4.png" alt="track_order"></span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    Out For <br> Delivery
                                                </span>
                                            </li>
                                            <li class="step0">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_5.png" alt="track_order"></span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    order <br>arrived
                                                </span>
                                            </li>
                                        <?php } else if ($orders['order_status'] == 'Delivered') { ?>
                                            <li class="step0 active">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_1.png" alt="track_order">
                                                </span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    order <br>processing
                                                </span>
                                            </li>
                                            <li class="step0 active">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_2.png" alt="track_order"></span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    Awaiting <br>Fullfilment</span>
                                            </li>
                                            <li class="step0 active">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_3.png" alt="track_order"></span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    order <br>shipped
                                                </span>
                                            </li>
                                            <li class="step0 active">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_4.png" alt="track_order"></span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    Out For <br> Delivery
                                                </span>
                                            </li>
                                            <li class="step0 active">
                                                <span class="ec-track-icon">
                                                    <img src="../public/landing_assets/images/icons/track_5.png" alt="track_order"></span>
                                                <span class="ec-progressbar-track"></span>
                                                <span class="ec-track-title">
                                                    order <br> Delivered
                                                </span>
                                            </li>
                                        <?php } else if ($orders['order_status'] == 'Cancelled') { ?>
                                            <h4 class="text-center text-danger">This order has been Cancelled.</h4>
                                        <?php } else { ?>
                                            <h4 class="text-center text-danger">We are unable to track this order.</h4>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>
                            <br><br><br>
                            <div class="ec-vendor-card-header text-center">
                                <h5>Items In This Order</h5>
                            </div>
                            <br>
                            <div class="ec-vendor-card-body">
                                <div class="ec-vendor-card-table">
                                    <table class="table ec-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Item SKU</th>
                                                <th scope="col">Item Name</th>
                                                <th scope="col">Item QTY</th>
                                                <th scope="col">Item Cost</th>
                                                <th scope="col">Total Cost</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $total_quantity = 0;
                                            $total_price = 0;
                                            /* Pull Recent Purchases Made By This User */
                                            $order_user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
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
                                                AND u.user_id = '{$order_user_id}'
                                                AND o.order_code = '{$order_code}'
                                                "
                                            );
                                            if (mysqli_num_rows($orders_sql) > 0) {
                                                while ($orders = mysqli_fetch_array($orders_sql)) {
                                                    /* Sum Number Of Items In The Order */
                                                    $query = "SELECT COUNT(*)  FROM orders WHERE order_code = '{$orders['order_code']}'";
                                                    $stmt = $mysqli->prepare($query);
                                                    $stmt->execute();
                                                    $stmt->bind_result($items_in_my_order);
                                                    $stmt->fetch();
                                                    $stmt->close();
                                                    /* Compute Quantity And Amount Supposed To Be Paid */
                                                    $total_quantity += $orders["order_qty"];
                                                    $total_price += $orders['order_cost'];
                                                    /* DeliverY Fee */

                                                    $constant_delivery_fee = '1500';
                                                    $payment_status = $orders['order_payment_status'];
                                                    $user_name = $orders['user_first_name'] . ' ' . $orders['user_last_name'];
                                                    $user_contacts = $orders['user_phone_number'];


                                                    /* Push Variables To Global Variable */
                                                    global $payment_status, $user_name, $user_contacts;


                                            ?>
                                                    <tr>
                                                        <td><span><?php echo $orders['product_sku_code']; ?></span></td>
                                                        <td><span><?php echo $orders['product_name']; ?></span></td>
                                                        <td><span><?php echo $orders['order_qty']; ?></span></td>
                                                        <td><span>Ksh <?php echo number_format($orders['product_price'], 2); ?></span></td>
                                                        <td><span>Ksh <?php echo number_format($orders['order_cost'], 2); ?></span></td>
                                                    </tr>

                                                <?php  } ?>
                                                <tr>
                                                    <td data-label="Product" class="ec-cart-pro-name">
                                                        <b>Sub Total Payable Amount</b>
                                                    </td>
                                                    <td data-label="Price" class="ec-cart-pro-price"><span class="amount"></span></td>
                                                    <td data-label="Price" class="ec-cart-pro-price"><span class="amount"></span></td>
                                                    <td data-label="Price" class="ec-cart-pro-price text-center"><span class="amount"></span></td>
                                                    <td data-label="Total" class="ec-cart-pro-subtotal">Ksh <?php echo number_format($total_price, 2); ?></td>
                                                </tr>
                                                <tr>
                                                    <td data-label="Product" class="ec-cart-pro-name">
                                                        <b>Delivery Fee</b>
                                                    </td>
                                                    <td data-label="Price" class="ec-cart-pro-price"><span class="amount"></span></td>
                                                    <td data-label="Price" class="ec-cart-pro-price"><span class="amount"></span></td>
                                                    <td data-label="Price" class="ec-cart-pro-price text-center"><span class="amount"></span></td>
                                                    <td data-label="Total" class="ec-cart-pro-subtotal">Ksh <?php echo number_format($constant_delivery_fee, 2); ?></td>
                                                </tr>
                                                <tr>
                                                    <td data-label="Product" class="ec-cart-pro-name">
                                                        <b>Total Payable Amount</b>
                                                    </td>
                                                    <td data-label="Price" class="ec-cart-pro-price"><span class="amount"></span></td>
                                                    <td data-label="Price" class="ec-cart-pro-price"><span class="amount"></span></td>
                                                    <td data-label="Price" class="ec-cart-pro-price text-center"><span class="amount"></span></td>
                                                    <td data-label="Total" class="ec-cart-pro-subtotal">Ksh <?php echo number_format(($total_price + $constant_delivery_fee), 2); ?></td>
                                                </tr>
                                                <?php
                                                if ($payment_status == 'Pending') {
                                                ?>
                                                    <tr>
                                                        <td data-label="Product" class="ec-cart-pro-name">
                                                        </td>
                                                        <td data-label="Price" class="ec-cart-pro-price"><span class="amount"></span></td>
                                                        <td data-label="Price" class="ec-cart-pro-price"><span class="amount"></span></td>
                                                        <td data-label="Price" class="ec-cart-pro-price text-center"><span class="amount"></span></td>
                                                        <td data-label="Total" class="ec-cart-pro-subtotal">
                                                            <span class="tbl-btn"><button class="btn btn-lg btn-primary" data-bs-toggle="modal" data-bs-target="#checkout_modal_<?php echo $order_code; ?>">Add Payment</button></span>
                                                        </td>
                                                    </tr>
                                                <?php }
                                                /* Include Payments Modal */
                                                include('../app/modals/payment_modal.php');
                                            } else { ?>
                                                <tr>
                                                    <th scope="row">No Items In Your Order</th>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <br><br><br>
                            <div class="ec-vendor-card-header text-center">
                                <h5>Order Payment Details</h5>
                            </div>
                            <br>
                            <div class="ec-vendor-card-body">
                                <div class="ec-vendor-card-table">
                                    <table class="table ec-table">
                                        <thead>
                                            <tr>
                                                <th scope="col">Payment Ref</th>
                                                <th scope="col">Payment Means</th>
                                                <th scope="col">Payment Amount</th>
                                                <th scope="col">Payment Date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $payment_sql = mysqli_query(
                                                $mysqli,
                                                "SELECT * FROM payments p
                                                INNER JOIN payment_means pm ON pm.means_id = p.payment_means_id
                                                WHERE p.payment_order_code = '{$order_code}' AND p.payment_delete_status = '0'"
                                            );
                                            if (mysqli_num_rows($payment_sql) > 0) {
                                                while ($payment = mysqli_fetch_array($payment_sql)) {
                                            ?>
                                                    <tr>
                                                        <td><span><?php echo $payment['payment_ref_code']; ?></span></td>
                                                        <td><span><?php echo $payment['means_code'] . ' ' . $payment['means_name']; ?></span></td>
                                                        <td><span>Ksh <?php echo number_format($payment['payment_amount'], 2); ?></span></td>
                                                        <td><span> <?php echo date('d M Y g:ia', strtotime($payment['payment_date'])); ?></span></td>
                                                    </tr>
                                                <?php  }
                                            } else { ?>
                                                <tr>
                                                    <th scope="row">We Can't Find Any Payment Records Related To This Order</th>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Track Order Content end -->
                </div>
            </section>
            <!-- End Track Order section -->
    <?php }
    } ?>

    <!-- Footer Start -->
    <?php require_once('../app/partials/landing_footer.php'); ?>

    <!-- Footer Area End -->

    <!-- Vendor JS -->
    <?php require_once('../app/partials/landing_scripts.php'); ?>

</body>


</html>