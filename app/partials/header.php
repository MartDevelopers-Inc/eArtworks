<?php
/*
 *   Crafted On Mon Aug 08 2022
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
$login_rank = mysqli_real_escape_string($mysqli, $_SESSION['login_rank']);

if ($login_rank == 'Administrator') {
?>
    <header class="app-header app-header-dark">
        <!-- .top-bar -->
        <div class="top-bar">
            <!-- .top-bar-brand -->
            <div class="top-bar-brand">
                <button class="hamburger hamburger-squeeze mr-2" type="button" data-toggle="aside-menu" aria-label="toggle aside menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle aside menu -->
                <a href="">
                    <h4>E-PaintStore</h4>
                </a>
            </div><!-- /.top-bar-brand -->
            <!-- .top-bar-list -->
            <div class="top-bar-list">
                <!-- .top-bar-item -->
                <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
                    <!-- toggle menu -->
                    <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle menu -->
                </div><!-- /.top-bar-item -->
                <!-- .top-bar-item -->
                <div class="top-bar-item top-bar-item-full">

                </div><!-- /.top-bar-item -->
                <!-- .top-bar-item -->
                <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
                    <!-- .nav -->
                    <ul class="header-nav nav">
                    </ul><!-- /.nav -->
                    <?php
                    $admin_id = mysqli_real_escape_string($mysqli, $_SESSION['login_admin_id']);
                    $ret = "SELECT * FROM admin WHERE admin_id = '{$admin_id}' ";
                    $stmt = $mysqli->prepare($ret);
                    $stmt->execute(); //ok
                    $res = $stmt->get_result();
                    while ($users = $res->fetch_object()) {
                    ?>
                        <!-- .btn-account -->
                        <div class="dropdown d-none d-md-flex">
                            <button class="btn-account" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="user-avatar user-avatar-md">
                                    <img src="../assets/upload/no-profile.png" alt=""></span>
                                <span class="account-summary pr-lg-4 d-none d-lg-block">
                                    <span class="account-name"><?php echo $users->admin_name; ?></span>
                                    <span class="account-description"><?php echo $_SESSION['login_rank']; ?>
                                    </span>
                                </span>
                            </button> <!-- .dropdown-menu -->
                            <div class="dropdown-menu">
                                <div class="dropdown-arrow d-lg-none" x-arrow=""></div>
                                <div class="dropdown-arrow ml-3 d-none d-lg-block"></div>

                                <a class="dropdown-item" href="admin_profile">
                                    <span class="dropdown-icon oi oi-person"></span>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="logout">
                                    <span class="dropdown-icon oi oi-account-logout"></span>
                                    Logout
                                </a>
                            </div><!-- /.dropdown-menu -->
                        </div><!-- /.btn-account -->
                    <?php
                    } ?>
                </div><!-- /.top-bar-item -->
            </div><!-- /.top-bar-list -->
        </div><!-- /.top-bar -->
    </header><!-- /.app-header -->
<?php
} else if ($login_rank == 'Artist') { ?>
    <header class="app-header app-header-dark">
        <!-- .top-bar -->
        <div class="top-bar">
            <!-- .top-bar-brand -->
            <div class="top-bar-brand">
                <button class="hamburger hamburger-squeeze mr-2" type="button" data-toggle="aside-menu" aria-label="toggle aside menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle aside menu -->
                <a href="">
                    <h4>E-PaintStore</h4>
                </a>
            </div><!-- /.top-bar-brand -->
            <!-- .top-bar-list -->
            <div class="top-bar-list">
                <!-- .top-bar-item -->
                <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
                    <!-- toggle menu -->
                    <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle menu -->
                </div><!-- /.top-bar-item -->
                <!-- .top-bar-item -->
                <div class="top-bar-item top-bar-item-full">

                </div><!-- /.top-bar-item -->
                <!-- .top-bar-item -->
                <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
                    <!-- .nav -->
                    <ul class="header-nav nav">
                    </ul><!-- /.nav -->
                    <?php
                    $artist_id = mysqli_real_escape_string($mysqli, $_SESSION['login_artist_id']);
                    $ret = "SELECT * FROM artist WHERE artist_id = '{$artist_id}' ";
                    $stmt = $mysqli->prepare($ret);
                    $stmt->execute(); //ok
                    $res = $stmt->get_result();
                    while ($users = $res->fetch_object()) {
                    ?>
                        <!-- .btn-account -->
                        <div class="dropdown d-none d-md-flex">
                            <button class="btn-account" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="user-avatar user-avatar-md">
                                    <img src="../assets/upload/artists/<?php echo $users->artist_image; ?>" alt=""></span>
                                <span class="account-summary pr-lg-4 d-none d-lg-block">
                                    <span class="account-name"><?php echo $users->artist_name; ?></span>
                                    <span class="account-description"><?php echo $_SESSION['login_rank']; ?>
                                    </span>
                                </span>
                            </button> <!-- .dropdown-menu -->
                            <div class="dropdown-menu">
                                <div class="dropdown-arrow d-lg-none" x-arrow=""></div>
                                <div class="dropdown-arrow ml-3 d-none d-lg-block"></div>

                                <a class="dropdown-item" href="artist_profile">
                                    <span class="dropdown-icon oi oi-person"></span>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="logout">
                                    <span class="dropdown-icon oi oi-account-logout"></span>
                                    Logout
                                </a>
                            </div><!-- /.dropdown-menu -->
                        </div><!-- /.btn-account -->
                    <?php
                    } ?>
                </div><!-- /.top-bar-item -->
            </div><!-- /.top-bar-list -->
        </div><!-- /.top-bar -->
    </header><!-- /.app-header -->
<?php } else { ?>
    <header class="app-header app-header-dark">
        <!-- .top-bar -->
        <div class="top-bar">
            <!-- .top-bar-brand -->
            <div class="top-bar-brand">
                <button class="hamburger hamburger-squeeze mr-2" type="button" data-toggle="aside-menu" aria-label="toggle aside menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle aside menu -->
                <a href="">
                    <h4>E-PaintStore</h4>
                </a>
            </div><!-- /.top-bar-brand -->
            <!-- .top-bar-list -->
            <div class="top-bar-list">
                <!-- .top-bar-item -->
                <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
                    <!-- toggle menu -->
                    <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle menu -->
                </div><!-- /.top-bar-item -->
                <!-- .top-bar-item -->
                <div class="top-bar-item top-bar-item-full">

                </div><!-- /.top-bar-item -->
                <!-- .top-bar-item -->
                <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
                    <!-- .nav -->
                    <ul class="header-nav nav">
                    </ul><!-- /.nav -->
                    <?php
                    $user_id = mysqli_real_escape_string($mysqli, $_SESSION['login_user_id']);
                    $ret = "SELECT * FROM users WHERE user_id = '{$user_id}' ";
                    $stmt = $mysqli->prepare($ret);
                    $stmt->execute(); //ok
                    $res = $stmt->get_result();
                    while ($users = $res->fetch_object()) {
                    ?>
                        <!-- .btn-account -->
                        <div class="dropdown d-none d-md-flex">
                            <button class="btn-account" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="user-avatar user-avatar-md">
                                    <img src="../assets/upload/no-profile.png" alt=""></span>
                                <span class="account-summary pr-lg-4 d-none d-lg-block">
                                    <span class="account-name"><?php echo $users->user_name; ?></span>
                                    <span class="account-description"><?php echo $_SESSION['login_rank']; ?>
                                    </span>
                                </span>
                            </button> <!-- .dropdown-menu -->
                            <div class="dropdown-menu">
                                <div class="dropdown-arrow d-lg-none" x-arrow=""></div>
                                <div class="dropdown-arrow ml-3 d-none d-lg-block"></div>

                                <a class="dropdown-item" href="user_profile">
                                    <span class="dropdown-icon oi oi-person"></span>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="logout">
                                    <span class="dropdown-icon oi oi-account-logout"></span>
                                    Logout
                                </a>
                            </div><!-- /.dropdown-menu -->
                        </div><!-- /.btn-account -->
                    <?php
                    } ?>
                </div><!-- /.top-bar-item -->
            </div><!-- /.top-bar-list -->
        </div><!-- /.top-bar -->
    </header><!-- /.app-header -->
<?php } ?>