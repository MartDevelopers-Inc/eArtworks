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
require_once('../app/helpers/system_settings.php');
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
                            <h1>System Recycle Bin</h1>
                            <p class="breadcrumbs">
                                <span><a href="dashboard">Home</a></span>
                                <span><i class="mdi mdi-chevron-right"></i></span>Recycle Bin
                            </p>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#empty">
                                Purge Recycle Bin Cache
                            </button>
                        </div>
                    </div>

                    <!-- Delete Modal -->
                    <div class="modal fade" id="empty" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">CONFIRM RECYCLE BIN PURGE</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form method="POST">
                                    <div class="modal-body text-center ">
                                        <h4 class="text-danger">
                                            Heads Up!, You are about to purge everything in recycle bin. Are you sure you want to proceed?
                                        </h4>
                                        <br>
                                        <!-- Hide This -->
                                        <button type="button" class="text-center btn btn-success" data-bs-dismiss="modal">No</button>
                                        <button type="submit" class="text-center btn btn-danger" name="Purge_Everything">Yes, Purge Eveything</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End Modal -->
                    <div class="product-brand p-24px">
                        <div class="row mb-m-24px">

                            <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6">
                                <a href="backoffice_deleted_staff">
                                    <div class="card card-default">
                                        <div class="card-body text-center p-24px">
                                            <div class="image mb-3">
                                                <img src="../public/backoffice_assets/img/man.png" class="img-fluid rounded-circle" alt="Avatar Image">
                                            </div>
                                            <h5 class="card-title text-dark">Staffs</h5>
                                            <p class="item-count">
                                                <button class="btn btn-primary btn-sm"><?php echo $deleted_staffs; ?></button>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6">
                                <a href="backoffice_deleted_customers">
                                    <div class="card card-default">
                                        <div class="card-body text-center p-24px">
                                            <div class="image mb-3">
                                                <img src="../public/backoffice_assets/img/man.png" class="img-fluid rounded-circle" alt="Avatar Image">
                                            </div>
                                            <h5 class="card-title text-dark">Customers</h5>
                                            <p class="item-count">
                                                <button class="btn btn-primary btn-sm"><?php echo $deleted_customers; ?></button>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6">
                                <a href="backoffice_deleted_categories">
                                    <div class="card card-default">
                                        <div class="card-body text-center p-24px">
                                            <div class="image mb-3">
                                                <img src="../public/backoffice_assets/img/categories.png" class="img-fluid rounded-circle" alt="Avatar Image">
                                            </div>
                                            <h5 class="card-title text-dark">Categories</h5>
                                            <p class="item-count">
                                                <button class="btn btn-primary btn-sm"><?php echo $deleted_categories; ?></button>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6">
                                <a href="backoffice_deleted_products">
                                    <div class="card card-default">
                                        <div class="card-body text-center p-24px">
                                            <div class="image mb-3">
                                                <img src="../public/backoffice_assets/img/painting.png" class="img-fluid rounded-circle" alt="Avatar Image">
                                            </div>
                                            <h5 class="card-title text-dark">Products</h5>
                                            <p class="item-count">
                                                <button class="btn btn-primary btn-sm"><?php echo $deleted_products; ?></button>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6">
                                <a href="backoffice_deleted_order">
                                    <div class="card card-default">
                                        <div class="card-body text-center p-24px">
                                            <div class="image mb-3">
                                                <img src="../public/backoffice_assets/img/order.png" class="img-fluid rounded-circle" alt="Avatar Image">
                                            </div>
                                            <h5 class="card-title text-dark">Orders</h5>
                                            <p class="item-count">
                                                <button class="btn btn-primary btn-sm"><?php echo $deleted_orders; ?></button>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6">
                                <a href="backoffice_deleted_means">
                                    <div class="card card-default">
                                        <div class="card-body text-center p-24px">
                                            <div class="image mb-3">
                                                <img src="../public/backoffice_assets/img/debit-card_2.png" class="img-fluid rounded-circle" alt="Avatar Image">
                                            </div>
                                            <h5 class="card-title text-dark">Payment Means</h5>
                                            <p class="item-count">
                                                <button class="btn btn-primary btn-sm"><?php echo $deleted_payment_means; ?></button>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6">
                                <a href="backoffice_deleted_payments">
                                    <div class="card card-default">
                                        <div class="card-body text-center p-24px">
                                            <div class="image mb-3">
                                                <img src="../public/backoffice_assets/img/debit-card.png" class="img-fluid rounded-circle" alt="Avatar Image">
                                            </div>
                                            <h5 class="card-title text-dark">Payments</h5>
                                            <p class="item-count">
                                                <button class="btn btn-primary btn-sm"><?php echo $deleted_payments; ?></button>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                </div> <!-- End Content Wrapper -->

                <!-- Footer -->
                <?php require_once('../app/partials/backoffice_footer.php'); ?>

            </div> <!-- End Page Wrapper -->
        </div> <!-- End Wrapper -->

        <?php require_once('../app/partials/backoffice_scripts.php'); ?>
</body>

</html>