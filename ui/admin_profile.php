<?php
/*
 *   Crafted On Sun Aug 07 2022
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
require_once('../app/helpers/users.php');
admin_check_login();
require_once('../app/partials/head.php');
?>

<body>
    <!-- .app -->
    <div class="app">
        <!--[if lt IE 10]>
      <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
      <![endif]-->
        <!-- .app-header -->
        <?php require_once('../app/partials/header.php'); ?>
        <!-- .app-aside -->
        <?php require_once('../app/partials/aside.php');
        $admin_id = mysqli_real_escape_string($mysqli, $_SESSION['login_admin_id']);
        $ret = "SELECT * FROM admin a INNER JOIN login l ON l.login_admin_id = a.admin_id
        WHERE a.admin_id = '{$admin_id}' ";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute(); //ok
        $res = $stmt->get_result();
        while ($admin = $res->fetch_object()) {

        ?>
            <!-- .app-main -->
            <main class="app-main">
                <!-- .wrapper -->
                <div class="wrapper">
                    <!-- .page -->
                    <div class="page">
                        <!-- .page-cover -->
                        <header class="page-cover">
                            <div class="text-center">
                                <a href="" class="user-avatar user-avatar-xl">
                                    <img src="../assets/upload/no-profile.png" alt=""></a>
                                <h2 class="h4 mt-2 mb-0"> <?php echo $admin->admin_name; ?> </h2>
                                <p class="text-muted"><?php echo $_SESSION['login_rank']; ?></p>
                            </div><!-- .cover-controls -->
                        </header><!-- /.page-cover -->

                        <!-- .page-inner -->
                        <div class="page-inner">
                            <!-- .page-title-bar -->
                            <header class="page-title-bar">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">
                                            <a href="dashboard"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>Back Home</a>
                                        </li>
                                    </ol>
                                </nav>
                            </header><!-- /.page-title-bar -->
                            <!-- .page-section -->
                            <div class="page-section">
                                <!-- grid row -->
                                <div class="row">
                                    <!-- grid column -->
                                    <div class="col-lg-6">
                                        <!-- .card -->
                                        <div class="card card-fluid">
                                            <h6 class="card-header"> Update Account </h6><!-- .card-body -->
                                            <div class="card-body">
                                                <form method="post" enctype="multipart/form-data">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Full Names</label>
                                                            <input type="hidden" name="admin_id" value="<?php echo $admin->admin_id; ?>" required class="form-control">
                                                            <input type="text" name="admin_name" value="<?php echo $admin->admin_name; ?>" required class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Email Address</label>
                                                            <input type="email" name="admin_email" value="<?php echo $admin->admin_email; ?>" required class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Phone Number</label>
                                                            <input type="text" name="admin_mobile" value="<?php echo $admin->admin_mobile; ?>" required class="form-control">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="text-right">
                                                        <button name="Update_Admin_Account" class="btn btn-primary" type="submit">
                                                            Update Profile
                                                        </button>
                                                    </div>
                                                </form>
                                            </div><!-- /.card-body -->
                                        </div><!-- /.card -->
                                    </div>
                                    <!-- grid column -->
                                    <div class="col-lg-6">
                                        <!-- .card -->
                                        <div class="card card-fluid">
                                            <h6 class="card-header"> Update Login Information </h6><!-- .card-body -->
                                            <div class="card-body">
                                                <form method="post" enctype="multipart/form-data">
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label>Login Username</label>
                                                            <input type="hidden" name="login_admin_id" value="<?php echo $admin->admin_id; ?>" required class="form-control">
                                                            <input type="text" value="<?php echo $admin->login_username; ?>" name="login_username" required class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Login Password</label>
                                                            <input type="password" name="new_password" required class="form-control">
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label>Confirm Password</label>
                                                            <input type="password" name="confirm_password" required class="form-control">
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="text-right">
                                                        <button name="Update_Admin_Password" class="btn btn-primary" type="submit">
                                                            Update Login Details
                                                        </button>
                                                    </div>
                                                </form>
                                            </div><!-- /.card-body -->
                                        </div><!-- /.card -->
                                    </div>
                                </div><!-- /grid row -->
                            </div><!-- /.page-section -->
                        </div><!-- /.page-inner -->
                    </div><!-- /.page -->
                </div><!-- .app-footer -->
                <?php require_once('../app/partials/footer.php'); ?>
                <!-- /.wrapper -->
            </main><!-- /.app-main -->
        <?php } ?>
    </div><!-- /.app -->
    <?php require_once('../app/partials/scripts.php'); ?>
</body>


</html>