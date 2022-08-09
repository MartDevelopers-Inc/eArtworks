<?php
/*
 *   Crafted On Sat Aug 06 2022
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
require_once('../app/helpers/authentication.php');
require_once('../app/partials/head.php');
?>

<body>
    <!-- .auth -->
    <main class="auth auth-floated">
        <div id="announcement" class="auth-announcement" style="background-image: url(../assets/upload/background.jpg);">
            <div class="announcement-body">
            </div>
        </div>
        <!-- form -->
        <div class="auth-form">
            <div class="mb-4">
                <div class="mb-3">
                    <h1 class="h3">E-Painting And Design Shopping System </h1>
                </div>
                <h1 class="h3"> Sign Up </h1>
            </div>
            <div class="col-12 card">
                <div class="card-body">
                    <p class="">
                        Are you creative? Are you driven by control, enthusiasm, and an obsession with
                        providing your clients with paintings and designs of the highest caliber?
                    </p>
                    <div class="form-group mb-4">
                        <button data-toggle="modal" data-target="#sign_up_as_artist" class="btn btn-lg btn-primary btn-block" name="login">Sign Up As Artist</button>
                    </div>
                </div>
            </div>

            <div class="col-12 card">
                <div class="card-body">
                    <p class="">
                        Are you a customer who is passionate about and driven by high-quality artworks and designs? </p>
                    <div class="form-group mb-4">
                        <button data-toggle="modal" data-target="#sign_up_as_customer" class="btn btn-lg btn-primary btn-block">Create Account</button>
                    </div>
                </div>
            </div>
            <p class="text-left mb-4">
                Already Has Account? <a href="../">Sign In</a>
            </p><!-- .form-group -->
        </div><!-- /.auth-form -->

        <!-- Customer Modal -->
        <div class="modal fade" id="sign_up_as_customer">
            <div class="modal-dialog modal-dialog-centered  modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-primary">Sign Up As Customer - Fill All Fields</h4>
                        <button type="button" class="close" data-dismiss="modal">
                            <span>&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label>Full Names</label>
                                    <input type="text" name="user_name" required class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Mobile Phone Number</label>
                                    <input type="text" name="user_phone_number" required class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Email Address</label>
                                    <input type="email" name="user_email" required class="form-control">
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
                                <button name="Sign_Up_As_Customer" class="btn btn-primary" type="submit">
                                    Sign Up
                                </button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Modal -->
        <div class="modal fade" id="sign_up_as_artist">
            <div class="modal-dialog modal-dialog-centered  modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title text-primary">Sign Up As Artist - Fill All Fields</h4>
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
                                <button name="Sign_Up_As_Artist" class="btn btn-primary" type="submit">
                                    Sign Up
                                </button>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Artsist Modal -->
        <!-- End Modal -->
        <!-- .auth-announcement -->
    </main><!-- /.auth -->
    <!-- BEGIN BASE JS -->
    <?php require_once('../app/partials/scripts.php'); ?>
</body>


</html>