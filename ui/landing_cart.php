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
require_once('../app/settings/cart_db_controller.php');
require_once('../app/settings/checklogin.php');
require_once('../app/settings/codeGen.php');
checklogin();
include('../app/helpers/cart.php');
require_once('../app/partials/landing_head.php');
?>

<body class="cart_page">
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
                            <h2 class="ec-breadcrumb-title">Cart</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="../">Home</a></li>
                                <li class="ec-breadcrumb-item active">Cart</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- Ec cart page -->
    <section class="ec-page-content section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-cart-leftside col-lg-8 col-md-12 ">
                    <!-- cart content Start -->
                    <div class="ec-cart-content">
                        <div class="ec-cart-inner">
                            <div class="row">
                                <div class="table-content cart-table-">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Unit Price</th>
                                                <th style="text-align: center;">Quantity</th>
                                                <th>Total</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            /* Fetch Everything In My Shopping Cart */
                                            if (isset($_SESSION["cart_item"])) {
                                                $total_quantity = 0;
                                                $total_price = 0;
                                                /* Populate Them */
                                                foreach ($_SESSION["cart_item"] as $item) {
                                                    $item_price = $item["quantity"] * $item["product_price"];
                                                    /* Check If This Product Has An Image */
                                                    if ($item['product_image'] == '') {
                                                        $image_dir = "../public/uploads/products/no_image.png";
                                                    } else {
                                                        $image_dir = "../public/uploads/products/" . $item['product_image'];
                                                    }
                                            ?>
                                                    <tr>
                                                        <td data-label="Product" class="ec-cart-pro-name">
                                                            <a href="">
                                                                <img class="ec-cart-pro-img mr-4" src="<?php echo $image_dir; ?>" alt="" /><?php echo $item['product_name']; ?>
                                                            </a>
                                                        </td>
                                                        <td data-label="Price" class="ec-cart-pro-price"><span class="amount">Ksh <?php echo number_format($item['product_price'], 2); ?></span></td>
                                                        <td data-label="Price" class="ec-cart-pro-price text-center"><span class="amount"><?php echo $item['quantity']; ?></span></td>
                                                        <td data-label="Total" class="ec-cart-pro-subtotal">Ksh <?php echo number_format($item_price, 2); ?></td>
                                                        <td data-label="Remove" class="ec-cart-pro-remove text-center">
                                                            <form method="post" action="landing_cart?action=remove&product_sku_code=<?php echo $item["product_sku_code"]; ?>">
                                                                <!-- Hide This -->
                                                                <button name="Remove_Item" type="submit"><i class="ecicon eci-trash-o"></i></button></a>
                                                            </form>
                                                        </td>
                                                    </tr>
                                                <?php
                                                    /* Compute Quantity And Amount Supposed To Be Paid */
                                                    $total_quantity += $item["quantity"];
                                                    $total_price += ($item["product_price"] * $item["quantity"]);
                                                    /* DeliverY Fee */
                                                    $constant_delivery_fee = '1500';
                                                }

                                                ?>
                                                <tr>
                                                    <td data-label="Product" class="ec-cart-pro-name">
                                                        <b>Sub Total</b>
                                                    </td>
                                                    <td data-label="Price" class="ec-cart-pro-price"><span class="amount"></span></td>
                                                    <td data-label="Price" class="ec-cart-pro-price text-center"><span class="amount"><?php echo $total_quantity; ?></span></td>
                                                    <td data-label="Total" class="ec-cart-pro-subtotal">Ksh <?php echo number_format($total_price, 2); ?></td>
                                                </tr>
                                            <?php } else { ?>
                                                <tr class="text-center">
                                                    <td>No items in the cart.</td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="ec-cart-update-bottom">
                                            <a href="landing_products">Continue Shopping</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--cart content End -->
                </div>
                <!-- Sidebar Area Start -->
                <div class="ec-cart-rightside col-lg-4 col-md-12">
                    <div class="ec-sidebar-wrap">
                        <!-- Sidebar Summary Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Order Summary</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <h4 class="ec-ship-title">Default Shipping Address</h4>
                                <div class="ec-cart-form">
                                    <?php
                                    /* Get Default Shipping Address */
                                    $user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
                                    $user_sql = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id = '{$user_id}'");
                                    if (mysqli_num_rows($user_sql) > 0) {
                                        while ($customer = mysqli_fetch_array($user_sql)) {
                                    ?>
                                            <p>
                                                <?php echo $customer['user_default_address']; ?>
                                            </p>
                                    <?php
                                        }
                                    } ?>
                                </div>
                            </div>
                            <div class="ec-sb-block-content">
                                <div class="ec-cart-summary-bottom">
                                    <div class="ec-cart-summary">
                                        <div>
                                            <span class="text-left">Sub-Total</span>
                                            <span class="text-right">Ksh <?php echo number_format($total_price, 2); ?></span>
                                        </div>
                                        <div>
                                            <span class="text-left">Delivery Charges</span>
                                            <span class="text-right">Ksh <?php echo number_format($constant_delivery_fee, 2); ?></span>
                                        </div>
                                        <?php
                                        /* Show This If Cart Already Has Something */
                                        if (isset($_SESSION['cart_item'])) {
                                            /* Add 7 Days To Todays Date */
                                            $delivery_date = strtotime("+7 day");
                                        ?>
                                            <div>
                                                <span class="text-left">Estimated Delivery Date: </span>
                                                <span class="text-right"><?php echo date('d M, Y', $delivery_date); ?></span>
                                            </div>
                                        <?php } ?>
                                        <div class="ec-cart-summary-total">
                                            <span class="text-left">Total Amount</span>
                                            <span class="text-right">Ksh <?php echo number_format($total_price + $constant_delivery_fee, 2); ?></span>
                                        </div>

                                    </div><br>
                                    <?php
                                    if (isset($_SESSION["cart_item"])) { ?>
                                        <div class="cart_btn text-right">
                                            <a href="?action=empty" class="btn btn-danger">Clear Cart</a>
                                            <!-- Hide This Please -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#checkout_modal">
                                                Checkout
                                            </button>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Summary Block -->
                        <?php include('../app/modals/checkout_modal.php'); ?>
                        <!-- Trigger Checkout Modal -->
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer Start -->
    <?php require_once('../app/partials/landing_footer.php'); ?>
    <!-- Footer Area End -->

    <!-- Vendor JS -->
    <?php require_once('../app/partials/landing_scripts.php'); ?>

</body>


</html>