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
require_once('../app/settings/checklogin.php');
checklogin();
require_once('../app/settings/config.php');
require_once('../app/partials/landing_head.php');
?>

<body class="track_order_page">
    <div id="ec-overlay"><span class="loader_img"></span></div>

    <!-- Header start  -->
    <?php require_once('../app/partials/landing_navigation.php');
    $order_id = mysqli_real_escape_string($mysqli, $_GET['view']);
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
        AND o.order_id = '{$order_id}'"
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
                                    <div>Expected arrival <?php echo date('d M Y', strtotime($orders['order_estimated_delivery_date'])); ?></div>
                                    <div><?php echo $orders['product_sku_code']; ?> <span><?php echo $orders['product_name']; ?></span></div>
                                </div>
                            </div>
                            <div class="ec-trackorder-bottom">
                                <div class="ec-progress-track">
                                    <ul id="ec-progressbar">
                                        <li class="step0 active">
                                            <span class="ec-track-icon">
                                                <img src="../public/landing_assets/images/icons/track_1.png" alt="track_order">
                                            </span>
                                            <span class="ec-progressbar-track"></span>
                                            <span class="ec-track-title">
                                                order <br>processed
                                            </span>
                                        </li>
                                        <li class="step0 active">
                                            <span class="ec-track-icon">
                                                <img src="../public/landing_assets/images/icons/track_2.png" alt="track_order"></span>
                                            <span class="ec-progressbar-track"></span>
                                            <span class="ec-track-title">
                                                order <br>designing</span>
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
                                                order <br>enroute
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
                                    </ul>
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