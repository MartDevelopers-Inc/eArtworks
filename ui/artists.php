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
require_once('../app/settings/codeGen.php');
require_once('../app/settings/checklogin.php');
admin_check_login();
require_once('../app/helpers/users.php');
require_once('../app/partials/head.php');
?>

<body>
    <!-- .app -->
    <div class="app">
        <!-- .app-header -->
        <?php require_once('../app/partials/header.php'); ?>
        <!-- .app-aside -->
        <?php require_once('../app/partials/aside.php'); ?>
        <!-- .app-main -->
        <main class="app-main">
            <!-- .wrapper -->
            <div class="wrapper">
                <!-- .page -->
                <div class="page">
                    <!-- .page-inner -->
                    <div class="page-inner">
                        <!-- .page-title-bar -->
                        <header class="page-title-bar">
                            <div class="d-flex flex-column flex-md-row">
                                <p class="lead">
                                    <span class="font-weight-bold">
                                        Artists
                                    </span>
                                </p>
                                <div class="ml-auto">
                                    <!-- .dropdown -->
                                    <div class="dropdown">
                                        <button type="button" data-toggle="modal" data-target="#add_modal" class="btn btn-outline-primary"><span>Register New Artists</button>
                                    </div><!-- /.dropdown -->
                                </div>
                            </div>
                        </header><!-- /.page-title-bar -->

                        <!-- Add Admin Modal -->
                        <div class="modal fade" id="add_modal">
                            <div class="modal-dialog modal-dialog-centered  modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Register New Artist - Fill All Required Fields </h4>
                                        <button type="button" class="close" data-dismiss="modal">
                                            <span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form method="post" enctype="multipart/form-data">
                                            <div class="form-row">
                                                <div class="form-group col-md-12">
                                                    <label>Full Names</label>
                                                    <input type="text" name="artist_name" required class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Email Address</label>
                                                    <input type="email" name="artist_email" required class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Address</label>
                                                    <input type="text" name="artist_location" required class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Login Password</label>
                                                    <input type="password" name="new_password" required class="form-control">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label>Confirm Password</label>
                                                    <input type="password" name="confirm_password" required class="form-control">
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Passport Sized Profile Image</label>
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" required name="artist_image" accept=".png, .jpeg, .jpg" class="custom-file-input" id="exampleInputFile">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Biography <small class="text-danger">(A brief description about yourself)</small></label>
                                                    <textarea name="artist_desc" rows="3" required class="form-control"></textarea>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="text-right">
                                                <button name="Add_Artist" class="btn btn-primary" type="submit">
                                                    Add Artist
                                                </button>
                                            </div>
                                            <br>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Modal -->
                        <!-- .page-section -->
                        <div class="page-section">
                            <!-- grid row -->
                            <div class="row">
                                <!-- grid column -->
                                <div class="col-12 col-lg-12 col-xl-12">
                                    <!-- .card -->
                                    <div class="card card-fluid">
                                        <!-- .card-body -->
                                        <div class="card-body">
                                            <table class="table table-bordered text-truncate" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Full Names</th>
                                                        <th>Email</th>
                                                        <th>Address</th>
                                                        <th>Bio</th>
                                                        <th>Manage</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $ret = "SELECT * FROM artist";
                                                    $stmt = $mysqli->prepare($ret);
                                                    $stmt->execute(); //ok
                                                    $res = $stmt->get_result();
                                                    while ($artist = $res->fetch_object()) {
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <img class="img-thumbnail" src="../assets/upload/artists/<?php echo $artist->artist_image; ?>">
                                                            </td>
                                                            <td>
                                                                <?php echo $artist->artist_name; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $artist->artist_email; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $artist->artist_location; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $artist->artist_desc; ?>
                                                            </td>
                                                            <td>
                                                                <a data-toggle="modal" href="#update_<?php echo $artist->artist_id; ?>" class="badge  badge-pill badge-warning"><em class="fas fa-user-edit"></em> Edit</a>
                                                                <a data-toggle="modal" href="#delete_<?php echo $artist->artist_id; ?>" class="badge  badge-pill badge-danger"><em class="fas fa-trash"></em> Delete</a>
                                                            </td>
                                                        </tr>
                                                        <!-- Update Modal -->
                                                        <div class="modal fade" id="update_<?php echo $artist->artist_id; ?>">
                                                            <div class="modal-dialog modal-dialog-centered  modal-lg">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Update Artist Details - Fill All Required Fields </h4>
                                                                        <button type="button" class="close" data-dismiss="modal">
                                                                            <span>&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form method="post" enctype="multipart/form-data">
                                                                            <div class="form-row">
                                                                                <div class="form-group col-md-12">
                                                                                    <label>Full Names</label>
                                                                                    <input type="hidden" name="artist_id" value="<?php echo $artist->artist_id; ?>" required class="form-control">
                                                                                    <input type="text" name="artist_name" value="<?php echo $artist->artist_name; ?>" required class="form-control">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label>Email Address</label>
                                                                                    <input type="email" name="artist_email" value="<?php echo $artist->artist_email; ?>" required class="form-control">
                                                                                </div>
                                                                                <div class="form-group col-md-6">
                                                                                    <label>Address</label>
                                                                                    <input type="text" name="artist_location" value="<?php echo $artist->artist_location; ?>" required class="form-control">
                                                                                </div>
                                                                                <div class="form-group col-md-12">
                                                                                    <label>Biography <small class="text-danger">(A brief description about yourself)</small></label>
                                                                                    <textarea name="artist_desc" rows="5" required class="form-control"><?php echo $artist->artist_desc; ?></textarea>
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="text-right">
                                                                                <button name="Update_Artist" class="btn btn-primary" type="submit">
                                                                                    Update Artist
                                                                                </button>
                                                                            </div>
                                                                            <br>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Modal -->

                                                        <!-- Delete Modal -->
                                                        <div class="modal fade" id="delete_<?php echo $artist->artist_id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="exampleModalLabel">CONFIRM DELETE</h5>
                                                                        <button type="button" class="close" data-dismiss="modal">
                                                                            <span>&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <form method="POST">
                                                                        <div class="modal-body text-center ">
                                                                            <h4 class="text-danger">
                                                                                Delete <?php echo  $artist->artist_name; ?> Account?
                                                                            </h4>
                                                                            <br>
                                                                            <!-- Hide This -->
                                                                            <input type="hidden" name="artist_id" value="<?php echo $artist->artist_id; ?>">
                                                                            <button type="button" class="text-center btn btn-outline-primary" data-dismiss="modal"> No</button>
                                                                            <button type="submit" class="text-center btn btn-outline-danger" name="Delete_Artist"> Yes Delete</button>
                                                                            <hr>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- End Modal -->
                                                    <?php
                                                    } ?>
                                                </tbody>
                                            </table>
                                        </div><!-- /.card-body -->
                                    </div><!-- /.card -->
                                </div><!-- /grid column -->
                            </div><!-- /grid row -->
                        </div><!-- /.page-section -->
                    </div><!-- /.page-inner -->
                </div><!-- /.page -->
            </div><!-- .app-footer -->
            <?php require_once('../app/partials/footer.php'); ?>
            <!-- /.wrapper -->
        </main><!-- /.app-main -->
    </div><!-- /.app -->
    <?php require_once('../app/partials/scripts.php'); ?>
</body>


</html>