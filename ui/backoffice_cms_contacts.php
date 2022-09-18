<?php
/*
 *   Crafted On Sun Sep 18 2022
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
require_once('../app/helpers/lite_cms.php');
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
                            <h1>About eArtworks</h1>
                            <p class="breadcrumbs">
                                <span><a href="dashboard">Home</a></span>
                                <span><i class="mdi mdi-chevron-right"></i></span><a href="backoffice_cms_about">LiteCms</a>
                                <span><i class="mdi mdi-chevron-right"></i></span>Manage About
                            </p>
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-12">
                            <div class="ec-vendor-list card card-default">
                                <div class="card-body">
                                    <?php
                                    $litecms_sql = mysqli_query($mysqli, "SELECT * FROM system_litecms");
                                    if (mysqli_num_rows($litecms_sql) > 0) {
                                        while ($contacts = mysqli_fetch_array($litecms_sql)) { ?>
                                            <form method="POST" enctype="multipart/form-data">
                                                <div class="modal-body px-4">
                                                    <div class="row mb-2">
                                                        <div class="form-group col-lg-6">
                                                            <label for="firstName">Contacts</label>
                                                            <input type="text" required class="form-control" name="system_contact" value="<?php echo $contacts['system_contact']; ?>">
                                                        </div>
                                                        <div class=" form-group col-lg-6">
                                                            <label for="firstName">Email Address</label>
                                                            <input type="text" required class="form-control" name="system_email" value="<?php echo $contacts['system_email']; ?>">
                                                        </div>
                                                        <div class="form-group col-lg-3">
                                                            <label for="firstName">Facebook Page</label>
                                                            <input type="text" required class="form-control" name="system_facebook_url" value="<?php echo $contacts['system_facebook_url']; ?>">
                                                        </div>
                                                        <div class="form-group col-lg-3">
                                                            <label for="firstName">Twitter Handle</label>
                                                            <input type="text" required class="form-control" name="system_twittwer_url" value="<?php echo $contacts['system_twittwer_url']; ?>">
                                                        </div>
                                                        <div class="form-group col-lg-3">
                                                            <label for="firstName">Instagram Handle</label>
                                                            <input type="text" required class="form-control" name="system_instagram_url" value="<?php echo $contacts['system_instagram_url']; ?>">
                                                        </div>
                                                        <div class=" form-group col-lg-3">
                                                            <label for="firstName">LinkedIn</label>
                                                            <input type="text" required class="form-control" name="system_linkedin_url" value="<?php echo $contacts['system_linkedin_url']; ?>">
                                                        </div>
                                                        <div class="form-group col-lg-12">
                                                            <label for="email">Address eArtworks</label>
                                                            <textarea class="form-control" required name="system_address"><?php echo $contacts['system_address']; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="modal-footer px-4">
                                                    <button type="submit" name="Contact_Us" class="btn btn-primary btn-pill">Save</button>
                                                </div>
                                            </form>
                                    <?php }
                                    } ?>
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