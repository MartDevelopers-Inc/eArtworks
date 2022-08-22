<?php
/*
 *   Crafted On Sat Aug 20 2022
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
require_once('../app/helpers/users.php');
require_once('../app/settings/codeGen.php');
require_once('../app/partials/landing_head.php');
/* Get Details Of Logged In User */
$user_id = mysqli_real_escape_string($mysqli, $_SESSION['user_id']);
$user_sql = mysqli_query($mysqli, "SELECT * FROM users WHERE user_id = '{$user_id}'");
if (mysqli_num_rows($user_sql) > 0) {
    while ($customer = mysqli_fetch_array($user_sql)) {
        /* Check If User Has Enabled 2FA */
        if ($customer['user_2fa_status'] == '0') {
            $two_fa_status = "Enable Two Factor Authentication";
        } else {
            $two_fa_status = "Disable Two Factor Authentication";
        }
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
                                    <h2 class="ec-breadcrumb-title">Authentication Settings</h2>
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <!-- ec-breadcrumb-list start -->
                                    <ul class="ec-breadcrumb-list">
                                        <li class="ec-breadcrumb-item"><a href="../">Home</a></li>
                                        <li class="ec-breadcrumb-item active">Auth Settings</li>
                                    </ul>
                                    <!-- ec-breadcrumb-list end -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Ec breadcrumb end -->
            <?php
            if ($customer['user_email_status'] == 'Pending') {
                /* Show This Banner If User Has Not Verified Their Email Address */
            ?>
                <div class="footer-offer">
                    <div class="container">
                        <div class="row">
                            <div class="text-center footer-off-msg">
                                <span>Kindly Verify Your Email In Order To Enjoy Our Daily Updates And Offers.</span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            <!-- User profile section -->
            <section class="ec-page-content ec-vendor-uploads ec-user-account section-space-p">
                <div class="container">
                    <div class="row">
                        <!-- Sidebar Area Start -->
                        <?php require_once('../app/partials/landing_profile_sidebar.php'); ?>
                        <div class="ec-shop-rightside col-lg-9 col-md-12">
                            <div class="ec-vendor-dashboard-card ec-vendor-setting-card">
                                <div class="ec-vendor-card-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="ec-vendor-block-profile">
                                                <div class="ec-vendor-block-img space-bottom-30">
                                                    <div class="ec-vendor-block-bg">
                                                        <a href="#" class="btn btn-lg btn-primary" data-link-action="editmodal" title="Edit Detail" data-bs-toggle="modal" data-bs-target="#edit_modal"><?php echo $two_fa_status; ?></a>
                                                    </div>
                                                    <div class="ec-vendor-block-detail">
                                                        <?php
                                                        /* Load Default Image If User Has No Profile Photo */
                                                        if ($customer['user_profile_picture'] == '') { ?>
                                                            <img class="v-img" src="../public/uploads/users/no-profile.png" alt="Customer image">
                                                        <?php } else { ?>
                                                            <img class="v-img" src="../public/uploads/users/<?php echo $customer['user_profile_picture']; ?>" alt="Customer image">
                                                        <?php } ?>
                                                        <h5 class="name"><?php echo $customer['user_first_name'] . ' ' . $customer['user_last_name']; ?></h5>
                                                        <p class="text-success">( Loyal Customer Since <?php echo date('d M Y g:ia', strtotime($customer['user_date_joined'])); ?> )</p>
                                                    </div>
                                                    <p>Hello <span><?php echo $customer['user_first_name'] . ' ' . $customer['user_last_name']; ?></span></p>
                                                    <p>You can manage and change your account authentication information, enable or disable two factor authentication.</p>
                                                </div>
                                                <h5>Change Password</h5>

                                                <div class="row">
                                                    <form class="row g-3" method="POST" enctype="multipart/form-data">
                                                        <div class="col-md-12 space-t-15">
                                                            <label class="form-label">Old Password</label>
                                                            <input type="password" name="old_password" required class="form-control">
                                                        </div>
                                                        <div class="col-md-12 space-t-15">
                                                            <label class="form-label">New Password</label>
                                                            <input type="password" name="new_password" required class="form-control">
                                                        </div>
                                                        <div class="col-md-12 space-t-15">
                                                            <label class="form-label">Confirm Password</label>
                                                            <input type="password" name="confirm_password" required class="form-control">
                                                        </div>
                                                        <div class="col-md-12 space-t-15 text-right">
                                                            <br>
                                                            <br>
                                                            <button type="submit" name="Update_Customer_Password" class="btn btn-primary">Update</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End User profile section -->

            <!-- Footer Start -->
            <?php require_once('../app/partials/landing_footer.php'); ?>
            <!-- Footer Area End -->

            <!-- Modal -->
            <?php require_once('../app/modals/landing_two_factor_modal.php'); ?>
            <!-- Modal end -->

            <?php require_once('../app/partials/landing_scripts.php'); ?>

        </body>

        </html>
    <?php
    }
} else {
    /* LOad 404 Page */
    include('error_404.php'); ?>
<?php } ?>