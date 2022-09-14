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
                            <h1>Thirdparty APIs</h1>
                            <p class="breadcrumbs">
                                <span><a href="dashboard">Home</a></span>
                                <span><i class="mdi mdi-chevron-right"></i></span><a href="backoffice_manage_categories">System Settings</a>
                                <span><i class="mdi mdi-chevron-right"></i></span>Third Party APIs
                            </p>
                        </div>
                        <div>
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUser">
                                Register New API
                            </button>
                        </div>
                    </div>

                    <!-- Add User Modal  -->
                    <div class="modal fade modal-add-contact" id="addUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                            <div class="modal-content">
                                <form method="POST" enctype="multipart/form-data">
                                    <div class="modal-header px-4">
                                        <h5 class="modal-title" id="exampleModalCenterTitle">Register New ThirdParty API</h5>
                                    </div>

                                    <div class="modal-body px-4">
                                        <div class="row mb-2">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="firstName">API Name</label>
                                                    <input type="text" required class="form-control" name="api_name">
                                                </div>
                                            </div>
                                            <div class="form-group col-lg-12">
                                                <label for="email">API Token (Consumer Secret)</label>
                                                <textarea class="form-control" rows="2" name="api_token"></textarea>
                                            </div>
                                            <div class="form-group col-lg-">
                                                <label for="email">API Identification (Consumer Key)</label>
                                                <textarea class="form-control" rows="2" name="api_identification"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="modal-footer px-4">
                                        <button type="button" class="btn btn-secondary btn-pill" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="Add_API" class="btn btn-primary btn-pill">Register New API</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="product-brand p-24px">
                        <div class="row mb-m-24px">
                            <?php
                            /* Pop All Registered API`S */
                            $api_sql = mysqli_query($mysqli, "SELECT * FROM thirdparty_apis ");
                            if (mysqli_num_rows($api_sql) > 0) {
                                while ($apis = mysqli_fetch_array($api_sql)) {
                            ?>

                                    <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6">
                                        <div class="card card-default">
                                            <div class="card-body text-center p-24px">
                                                <div class="image mb-3">
                                                    <img src="../public/backoffice_assets/img/api.png" class="img-fluid rounded-circle" alt="Avatar Image">
                                                </div>
                                                <h5 class="card-title text-dark"><?php echo $apis['api_name']; ?></h5>
                                                <p class="item-count">
                                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#edit_<?php echo $apis['api_id']; ?>">Edit</button>
                                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#delete_<?php echo $apis['api_id']; ?>">Delete</button>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                    /* API Managment Modals */
                                    include('../app/modals/api_modals.php');
                                }
                            } else { ?>
                                <div class="col-xxl-2 col-xl-3 col-lg-4 col-md-6">
                                    <div class="card card-default">
                                        <div class="card-body text-center p-24px">
                                            <div class="image mb-3">
                                                <img src="../public/backoffice_assets/img/error.png" class="img-fluid rounded-circle" alt="Avatar Image">
                                            </div>

                                            <h5 class="card-title text-dark">No Registered APIs Found</h5>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
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