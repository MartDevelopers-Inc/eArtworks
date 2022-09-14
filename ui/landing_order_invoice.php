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
checklogin();
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
                            <h2 class="ec-breadcrumb-title">Customer Order Invoice</h2>
                        </div>
                        <div class="col-md-6 col-sm-12">
                            <!-- ec-breadcrumb-list start -->
                            <ul class="ec-breadcrumb-list">
                                <li class="ec-breadcrumb-item"><a href="../">Home</a></li>
                                <li class="ec-breadcrumb-item"><a href="landing_cart">Cart</a></li>
                                <li class="ec-breadcrumb-item active">Invoice</li>
                            </ul>
                            <!-- ec-breadcrumb-list end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Ec breadcrumb end -->

    <!-- User invoice section -->
    <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
        <div class="container">
            <div class="row">
                <div class="ec-shop-rightside col-lg-8 col-md-8">
                    <div class="ec-vendor-dashboard-card">
                        <div class="ec-vendor-card-header">
                            <h5>Invoice</h5>
                            <div class="ec-header-btn">
                                <a class="btn btn-lg btn-primary" href="#">Download</a>
                            </div>
                        </div>
                        <div class="ec-vendor-card-body padding-b-0">
                            <div class="page-content">
                                <div class="page-header text-blue-d2">
                                    <img src="../public/landing_assets/images/logo/logo.png" alt="Site Logo">
                                </div>

                                <div class="container px-0">
                                    <div class="row mt-4">
                                        <div class="col-lg-12">
                                            <hr class="row brc-default-l1 mx-n1 mb-4" />

                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <div class="my-2">
                                                        <span class="text-sm text-grey-m2 align-middle">To : </span>
                                                        <span class="text-600 text-110 text-blue align-middle">Alex
                                                            Doe</span>
                                                    </div>
                                                    <div class="text-grey-m2">
                                                        <div class="my-2">
                                                            123, Mountain View,
                                                        </div>
                                                        <div class="my-2">
                                                            California, US State.
                                                        </div>
                                                        <div class="my-2"><b class="text-600">Phone : </b>1234567890
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.col -->

                                                <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                                                    <hr class="d-sm-none" />
                                                    <div class="text-grey-m2">

                                                        <div class="my-2">
                                                            <span class="text-600 text-90">ID : </span>
                                                            #111-222
                                                        </div>

                                                        <div class="my-2">
                                                            <span class="text-600 text-90">Invoice Status :
                                                            </span> Paid
                                                        </div>
                                                        <div class="my-2">
                                                            <span class="text-600 text-90">Issue Date :
                                                            </span> Oct 12, 2021-2022
                                                        </div>

                                                        <div class="my-2">
                                                            <span class="text-600 text-90">Invoice No :
                                                            </span>6548
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- /.col -->
                                            </div>

                                            <div class="mt-4">

                                                <div class="text-95 text-secondary-d3">
                                                    <div class="ec-vendor-card-table">
                                                        <table class="table ec-table">
                                                            <thead>
                                                                <tr>
                                                                    <th scope="col">ID</th>
                                                                    <th scope="col">Name</th>
                                                                    <th scope="col">Qty</th>
                                                                    <th scope="col">Price</th>
                                                                    <th scope="col">Amount</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th><span>225</span></th>
                                                                    <td><span>Women sliveless top</span></td>
                                                                    <td><span>2</span></td>
                                                                    <td><span>$65</span></td>
                                                                    <td><span>$130</span></td>
                                                                </tr>
                                                            </tbody>
                                                            <tfoot>
                                                                <tr>
                                                                    <td class="border-none" colspan="3">
                                                                        <span></span>
                                                                    </td>
                                                                    <td class="border-color" colspan="1">
                                                                        <span><strong>Sub Total</strong></span>
                                                                    </td>
                                                                    <td class="border-color">
                                                                        <span>$3520</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="border-none" colspan="3">
                                                                        <span></span>
                                                                    </td>
                                                                    <td class="border-color" colspan="1">
                                                                        <span><strong>Tax (10%)</strong></span>
                                                                    </td>
                                                                    <td class="border-color">
                                                                        <span>$352</span>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="border-none m-m15" colspan="3"><span class="note-text-color"></span></td>
                                                                    <td class="border-color m-m15" colspan="1"><span><strong>Total</strong></span>
                                                                    </td>
                                                                    <td class="border-color m-m15">
                                                                        <span>$3872</span>
                                                                    </td>
                                                                </tr>
                                                            </tfoot>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="ec-shop-rightside col-lg-4 col-md-4">
                    <div class="ec-sidebar-wrap ec-checkout-pay-wrap">
                        <!-- Sidebar Payment Block -->
                        <div class="ec-sidebar-block">
                            <div class="ec-sb-title">
                                <h3 class="ec-sidebar-title">Payment Method</h3>
                            </div>
                            <div class="ec-sb-block-content">
                                <div class="ec-checkout-pay">
                                    <div class="ec-pay-desc">Please select the preferred payment method to use on this
                                        order.
                                    </div>
                                    <form method="POST">
                                        <span class="ec-bill-wrap ec-bill-full">
                                            <label>Payment Method</label>
                                            <span class="ec-bl-select-inner">
                                                <select required name="payment_means_id" id="ec-select-state" class="ec-bill-select">
                                                    <option>Select</option>
                                                    <?php
                                                    $method_sql = mysqli_query($mysqli, "SELECT * FROM payment_means");
                                                    if (mysqli_num_rows($method_sql) > 0) {
                                                        while ($method = mysqli_fetch_array($method_sql)) { ?>
                                                            <option value="<?php echo $method['means_id']; ?>"><?php echo $method['means_name']; ?></option>
                                                    <?php }
                                                    } ?>
                                                </select>
                                            </span>
                                        </span>
                                        <span class="ec-pay-agree">
                                            <input required type="checkbox" value="">
                                            <a href="landing_terms">I have
                                                read and agree to the <span>Terms & Conditions</span>
                                            </a>
                                            <span class="checked"></span>
                                        </span>
                                        <span class="ec-pay-agree text-right">
                                            <button type="submit" name="Pay_Order" class="btn btn-primary btn-sm">Pay </button>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Sidebar Payment Block -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End User invoice section -->

    <!-- Footer Start -->
    <?php require_once('../app/partials/landing_footer.php'); ?>
    <!-- Footer Area End -->


    <!-- Vendor JS -->
    <?php require_once('../app/partials/landing_scripts.php'); ?>

</body>


</html>