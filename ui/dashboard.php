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
admin_check_login();
require_once('../app/helpers/analytics.php');
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
                                    <span class="font-weight-bold">Hi Administrator.</span> <span class="d-block text-muted">Here is the glance of whats happening today.</span>
                                </p>
                                <div class="ml-auto">
                                    <!-- .dropdown -->
                                    <div class="dropdown">
                                        <button class="btn btn-outline-primary"><span>Today, <?php echo date('d M Y'); ?></span></button>
                                    </div><!-- /.dropdown -->
                                </div>
                            </div>
                        </header><!-- /.page-title-bar -->
                        <!-- .page-section -->
                        <div class="page-section">
                            <!-- .section-block -->
                            <div class="section-block">
                                <!-- metric row -->
                                <div class="metric-row">
                                    <div class="col-lg-12">
                                        <div class="metric-row metric-flush">
                                            <!-- metric column -->
                                            <div class="col">
                                                <!-- .metric -->
                                                <a href="artists" class="metric metric-bordered align-items-center">
                                                    <h2 class="metric-label"> Artists </h2>
                                                    <p class="metric-value h3">
                                                        <sub><i class="fas fa-users"></i></sub> <span class="value"><?php echo $artist; ?></span>
                                                    </p>
                                                </a> <!-- /.metric -->
                                            </div><!-- /metric column -->
                                            <!-- metric column -->
                                            <div class="col">
                                                <!-- .metric -->
                                                <a href="customers" class="metric metric-bordered align-items-center">
                                                    <h2 class="metric-label"> Customers </h2>
                                                    <p class="metric-value h3">
                                                        <sub><i class="fas fa-user"></i></sub> <span class="value"><?php echo $customers; ?></span>
                                                    </p>
                                                </a> <!-- /.metric -->
                                            </div><!-- /metric column -->
                                            <!-- metric column -->
                                            <div class="col">
                                                <!-- .metric -->
                                                <a href="designs_and_arts" class="metric metric-bordered align-items-center">
                                                    <h2 class="metric-label"> Artworks & Paitings </h2>
                                                    <p class="metric-value h3">
                                                        <sub><i class="fas fa-paint-brush"></i></sub> <span class="value"><?php echo $artwork; ?></span>
                                                    </p>
                                                </a> <!-- /.metric -->
                                            </div><!-- /metric column -->
                                            <div class="col">
                                                <!-- .metric -->
                                                <a href="payments" class="metric metric-bordered align-items-center">
                                                    <h2 class="metric-label"> Revenue / Income </h2>
                                                    <p class="metric-value h3">
                                                        <sub><i class="fas fa-hand-holding-usd"></i></sub> <span class="value">Ksh <?php echo number_format($payment, 2); ?></span>
                                                    </p>
                                                </a> <!-- /.metric -->
                                            </div><!-- /metric column -->
                                        </div>
                                    </div><!-- metric column -->

                                </div><!-- /metric row -->
                            </div><!-- /.section-block -->
                            <!-- grid row -->
                            <div class="row">
                                <!-- grid column -->
                                <div class="col-12 col-lg-12 col-xl-12">
                                    <!-- .card -->
                                    <div class="card card-fluid">
                                        <!-- .card-body -->
                                        <div class="card-body">
                                            <h3 class="card-title mb-4"> Recent Purchases </h3>
                                            <table class="table table-bordered text-truncate" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                    <tr>
                                                        <th>Purchase Details</th>
                                                        <th>Customer Details</th>
                                                        <th>Artist Details</th>
                                                        <th>Art/ Painting Details</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $ret = "SELECT * FROM requests r 
                                                    INNER JOIN artwork a ON a.artwork_id = r.request_artwork_id
                                                    INNER JOIN artist ar ON ar.artist_id = a.artwork_artist_id
                                                    INNER JOIN users u ON u.user_id = r.request_user_id";
                                                    $stmt = $mysqli->prepare($ret);
                                                    $stmt->execute(); //ok
                                                    $res = $stmt->get_result();
                                                    while ($purchases = $res->fetch_object()) {
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <b>Date: </b> <?php echo date('d M Y g:ia', strtotime($purchases->request_date . $purchases->request_time)); ?><br>
                                                                <b>Location: </b> <?php echo $purchases->request_location; ?><br>
                                                                <b>Status: </b> <?php echo $purchases->request_status; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $purchases->user_name; ?><br>
                                                                <b>Email: </b><?php echo $purchases->user_phone_number; ?><br>
                                                                <b>Contacts:</b> <?php echo $purchases->user_email; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $purchases->artist_name; ?><br>
                                                                <b>Email: </b> <?php echo $purchases->artist_email; ?><br>
                                                                <b>Address: </b> <?php echo $purchases->artist_location; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $purchases->artwork_reg; ?><br>
                                                                <b>Type: </b> <?php echo $purchases->artwork_type; ?><br>
                                                                <b>Price: </b> Ksh <?php echo number_format($purchases->artwork_price, 2); ?>
                                                            </td>
                                                        </tr>
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