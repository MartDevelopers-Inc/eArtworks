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
    <aside class="app-aside app-aside-expand-md app-aside-light">
        <!-- .aside-content -->
        <div class="aside-content">
            <?php
            $admin_id = mysqli_real_escape_string($mysqli, $_SESSION['login_admin_id']);
            $ret = "SELECT * FROM admin WHERE admin_id = '{$admin_id}' ";
            $stmt = $mysqli->prepare($ret);
            $stmt->execute(); //ok
            $res = $stmt->get_result();
            while ($users = $res->fetch_object()) {
            ?>
                <!-- .aside-header -->
                <header class="aside-header d-block d-md-none">
                    <!-- .btn-account -->
                    <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside">
                        <span class="user-avatar user-avatar-lg">
                            <img src="../assets/upload/no-profile.png" alt=""></span>
                        <span class="account-icon">
                            <span class="fa fa-caret-down fa-lg"></span></span>
                        <span class="account-summary">
                            <span class="account-name"><?php echo $users->admin_name; ?></span>
                            <span class="account-description"><?php echo $_SESSION['login_rank']; ?></span></span>
                    </button> <!-- /.btn-account -->
                    <!-- .dropdown-aside -->
                    <div id="dropdown-aside" class="dropdown-aside collapse">
                        <!-- dropdown-items -->
                        <div class="pb-3">
                            <a class="dropdown-item" href="admin_profile">
                                <span class="dropdown-icon oi oi-person"></span>
                                Profile</a>
                            <a class="dropdown-item" href="logout">
                                <span class="dropdown-icon oi oi-account-logout"></span>
                                Logout</a>
                        </div><!-- /dropdown-items -->
                    </div><!-- /.dropdown-aside -->
                </header><!-- /.aside-header -->
            <?php
            } ?>
            <!-- .aside-menu -->
            <div class="aside-menu overflow-hidden">
                <!-- .stacked-menu -->
                <nav id="stacked-menu" class="stacked-menu">
                    <!-- .menu -->
                    <ul class="menu">
                        <!-- .menu-item -->
                        <li class="menu-item">
                            <a href="dashboard" class="menu-link"><span class="menu-icon fas fa-home"></span> <span class="menu-text">Dashboard</span></a>
                        </li><!-- /.menu-item -->
                        <!-- .menu-item -->
                        <li class="menu-item has-child">
                            <a href="#" class="menu-link"><span class="menu-icon fas fa-users"></span> <span class="menu-text">Users</span></a> <!-- child menu -->
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="administrators" class="menu-link">Administrators</a>
                                </li>
                                <li class="menu-item">
                                    <a href="artists" class="menu-link">Artists</a>
                                </li>
                                <li class="menu-item">
                                    <a href="customers" class="menu-link">Customers</a>
                                </li>
                            </ul><!-- /child menu -->
                        </li><!-- /.menu-item -->
                        <li class="menu-item">
                            <a href="art_categories" class="menu-link"><span class="menu-icon fas fa-list"></span> <span class="menu-text">Art Categories</span></a>
                        </li><!-- /.menu-item -->
                        <li class="menu-item">
                            <a href="designs_and_arts" class="menu-link"><span class="menu-icon fas fa-paint-brush"></span> <span class="menu-text">Designs & Arts</span></a>
                        </li><!-- /.menu-item -->
                        <li class="menu-item">
                            <a href="purchases" class="menu-link"><span class="menu-icon fas fa-shopping-cart"></span> <span class="menu-text">Purchases</span></a>
                        </li><!-- /.menu-item -->
                        <li class="menu-item">
                            <a href="payments" class="menu-link"><span class="menu-icon fas fa-hand-holding-usd"></span> <span class="menu-text">Payments</span></a>
                        </li><!-- /.menu-item -->
                        <li class="menu-header">Reports</li>
                        <li class="menu-item has-child">
                            <a href="#" class="menu-link"><span class="menu-icon fas fa-copy"></span> <span class="menu-text">All Reports</span></a> <!-- child menu -->
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="report_administrators" class="menu-link">Administrators</a>
                                </li>
                                <li class="menu-item">
                                    <a href="report_artists" class="menu-link">Artists</a>
                                </li>
                                <li class="menu-item">
                                    <a href="report_customers" class="menu-link">Customers</a>
                                </li>
                                <li class="menu-item">
                                    <a href="report_artworks" class="menu-link">Arts & Paintings</a>
                                </li>
                                <li class="menu-item">
                                    <a href="report_purchases" class="menu-link">Purchases</a>
                                </li>
                                <li class="menu-item">
                                    <a href="report_payments" class="menu-link">Payments</a>
                                </li>
                            </ul><!-- /child menu -->
                        </li><!-- /.menu-item -->
                    </ul><!-- /.menu -->
                </nav><!-- /.stacked-menu -->
            </div><!-- /.aside-menu -->
            <!-- Skin changer -->
            <footer class="aside-footer border-top p-2">
                <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span class="d-compact-menu-none">Night mode</span> <i class="fas fa-moon ml-1"></i></button>
            </footer><!-- /Skin changer -->
        </div><!-- /.aside-content -->
    </aside>
<?php
} else if ($login_rank == 'Artist') { ?>
    <aside class="app-aside app-aside-expand-md app-aside-light">
        <!-- .aside-content -->
        <div class="aside-content">
            <?php
            $artist_id = mysqli_real_escape_string($mysqli, $_SESSION['login_artist_id']);
            $ret = "SELECT * FROM artist WHERE artist_id = '{$artist_id}' ";
            $stmt = $mysqli->prepare($ret);
            $stmt->execute(); //ok
            $res = $stmt->get_result();
            while ($users = $res->fetch_object()) {
                global $artist_id;
            ?>
                <!-- .aside-header -->
                <header class="aside-header d-block d-md-none">
                    <!-- .btn-account -->
                    <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside">
                        <span class="user-avatar user-avatar-lg">
                            <img src="../assets/upload/artists/<?php echo $users->artist_image; ?>" alt=""></span>
                        <span class="account-icon">
                            <span class="fa fa-caret-down fa-lg"></span></span>
                        <span class="account-summary">
                            <span class="account-name"><?php echo $users->artist_name; ?></span>
                            <span class="account-description"><?php echo $_SESSION['login_rank']; ?></span></span>
                    </button> <!-- /.btn-account -->
                    <!-- .dropdown-aside -->
                    <div id="dropdown-aside" class="dropdown-aside collapse">
                        <!-- dropdown-items -->
                        <div class="pb-3">
                            <a class="dropdown-item" href="artist_profile">
                                <span class="dropdown-icon oi oi-person"></span>
                                Profile</a>
                            <a class="dropdown-item" href="logout">
                                <span class="dropdown-icon oi oi-account-logout"></span>
                                Logout</a>
                        </div><!-- /dropdown-items -->
                    </div><!-- /.dropdown-aside -->
                </header><!-- /.aside-header -->
            <?php
            } ?>
            <!-- .aside-menu -->
            <div class="aside-menu overflow-hidden">
                <!-- .stacked-menu -->
                <nav id="stacked-menu" class="stacked-menu">
                    <!-- .menu -->
                    <ul class="menu">
                        <!-- .menu-item -->
                        <li class="menu-item">
                            <a href="artist_dashboard" class="menu-link"><span class="menu-icon fas fa-home"></span> <span class="menu-text">Dashboard</span></a>
                        </li><!-- /.menu-item -->
                        <li class="menu-item">
                            <a href="artist_designs_and_arts" class="menu-link"><span class="menu-icon fas fa-paint-brush"></span> <span class="menu-text">Designs & Arts</span></a>
                        </li><!-- /.menu-item -->
                        <li class="menu-item">
                            <a href="artist_purchases" class="menu-link"><span class="menu-icon fas fa-shopping-cart"></span> <span class="menu-text">Purchases</span></a>
                        </li><!-- /.menu-item -->
                        <li class="menu-item">
                            <a href="artist_payments" class="menu-link"><span class="menu-icon fas fa-hand-holding-usd"></span> <span class="menu-text">Payments</span></a>
                        </li><!-- /.menu-item -->
                        <li class="menu-header">Reports</li>
                        <li class="menu-item has-child">
                            <a href="#" class="menu-link"><span class="menu-icon fas fa-copy"></span> <span class="menu-text">All Reports</span></a> <!-- child menu -->
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="artist_report_artworks" class="menu-link">Arts & Paintings</a>
                                </li>
                                <li class="menu-item">
                                    <a href="artist_report_purchases" class="menu-link">Purchases</a>
                                </li>
                                <li class="menu-item">
                                    <a href="artist_report_payments" class="menu-link">Payments</a>
                                </li>
                            </ul><!-- /child menu -->
                        </li><!-- /.menu-item -->
                    </ul><!-- /.menu -->
                </nav><!-- /.stacked-menu -->
            </div><!-- /.aside-menu -->
            <!-- Skin changer -->
            <footer class="aside-footer border-top p-2">
                <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span class="d-compact-menu-none">Night mode</span> <i class="fas fa-moon ml-1"></i></button>
            </footer><!-- /Skin changer -->
        </div><!-- /.aside-content -->
    </aside>
<?php } else { ?>
    <aside class="app-aside app-aside-expand-md app-aside-light">
        <!-- .aside-content -->
        <div class="aside-content">
            <?php
            $user_id = mysqli_real_escape_string($mysqli, $_SESSION['login_user_id']);
            $ret = "SELECT * FROM users WHERE user_id = '{$user_id}' ";
            $stmt = $mysqli->prepare($ret);
            $stmt->execute(); //ok
            $res = $stmt->get_result();
            while ($users = $res->fetch_object()) {
                global $user_id;

            ?>
                <!-- .aside-header -->
                <header class="aside-header d-block d-md-none">
                    <!-- .btn-account -->
                    <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside">
                        <span class="user-avatar user-avatar-lg">
                            <img src="../assets/upload/no-profile.png" alt=""></span>
                        <span class="account-icon">
                            <span class="fa fa-caret-down fa-lg"></span></span>
                        <span class="account-summary">
                            <span class="account-name"><?php echo $users->user_name; ?></span>
                            <span class="account-description"><?php echo $_SESSION['login_rank']; ?></span></span>
                    </button> <!-- /.btn-account -->
                    <!-- .dropdown-aside -->
                    <div id="dropdown-aside" class="dropdown-aside collapse">
                        <!-- dropdown-items -->
                        <div class="pb-3">
                            <a class="dropdown-item" href="user_profile">
                                <span class="dropdown-icon oi oi-person"></span>
                                Profile</a>
                            <a class="dropdown-item" href="logout">
                                <span class="dropdown-icon oi oi-account-logout"></span>
                                Logout</a>
                        </div><!-- /dropdown-items -->
                    </div><!-- /.dropdown-aside -->
                </header><!-- /.aside-header -->
            <?php
            } ?>
            <!-- .aside-menu -->
            <div class="aside-menu overflow-hidden">
                <!-- .stacked-menu -->
                <nav id="stacked-menu" class="stacked-menu">
                    <!-- .menu -->
                    <ul class="menu">
                        <!-- .menu-item -->
                        <li class="menu-item">
                            <a href="user_dashboard" class="menu-link"><span class="menu-icon fas fa-home"></span> <span class="menu-text">Dashboard</span></a>
                        </li><!-- /.menu-item -->
                        <li class="menu-item">
                            <a href="user_designs_and_arts" class="menu-link"><span class="menu-icon fas fa-paint-brush"></span> <span class="menu-text">Designs & Arts</span></a>
                        </li><!-- /.menu-item -->
                        <li class="menu-item">
                            <a href="user_purchases" class="menu-link"><span class="menu-icon fas fa-shopping-cart"></span> <span class="menu-text">Purchases</span></a>
                        </li><!-- /.menu-item -->
                        <li class="menu-item">
                            <a href="user_payments" class="menu-link"><span class="menu-icon fas fa-hand-holding-usd"></span> <span class="menu-text">Payments</span></a>
                        </li><!-- /.menu-item -->
                        <li class="menu-header">Reports</li>
                        <li class="menu-item has-child">
                            <a href="#" class="menu-link"><span class="menu-icon fas fa-copy"></span> <span class="menu-text">All Reports</span></a> <!-- child menu -->
                            <ul class="menu">
                                <li class="menu-item">
                                    <a href="user_report_purchases" class="menu-link">Purchases</a>
                                </li>
                                <li class="menu-item">
                                    <a href="user_report_payments" class="menu-link">Payments</a>
                                </li>
                            </ul><!-- /child menu -->
                        </li><!-- /.menu-item -->
                    </ul><!-- /.menu -->
                </nav><!-- /.stacked-menu -->
            </div><!-- /.aside-menu -->
            <!-- Skin changer -->
            <footer class="aside-footer border-top p-2">
                <button class="btn btn-light btn-block text-primary" data-toggle="skin"><span class="d-compact-menu-none">Night mode</span> <i class="fas fa-moon ml-1"></i></button>
            </footer><!-- /Skin changer -->
        </div><!-- /.aside-content -->
    </aside>
<?php } ?>