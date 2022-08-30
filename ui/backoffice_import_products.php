<?php
/*
 *   Crafted On Fri Aug 26 2022
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
require_once('../app/helpers/bulk_import.php');
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
            <div class="ec-content-wrapper ec-vendor-wrapper">
                <div class="content">
                    <div class="breadcrumb-wrapper d-flex align-items-center justify-content-between">
                        <div>
                            <h1>Bulk Import Product Categories</h1>
                            <p class="breadcrumbs">
                                <span>
                                    <a href="dashboard">Home</a>
                                </span>
                                <span>
                                    <i class="mdi mdi-chevron-right"></i>
                                    <a href="">Categories</a>
                                </span>
                                <span>
                                    <i class="mdi mdi-chevron-right"></i>
                                </span> Bulk Import
                            </p>
                        </div>
                    </div>

                    <div class="card card-default p-4 ec-card-space">
                        <div class="card-body col-12">
                            <p class="text-center">
                                Allowed File Types: XLS, XLSX. Please,
                                <a class="text-success" href="../public/uploads/templates/categories.xlsx">Download</a>
                                A Template File
                            </p>
                            <br><br>
                            <form method="post" enctype="multipart/form-data" role="form">
                                <div class="row">
                                    <div class="form-group col-lg-8">
                                        <label for="email">Select Product Seller</label>
                                        <select type="text" required class="form-control basic_select" name="user_access_level">
                                            <?php
                                            $sellers_sql = mysqli_query($mysqli, "SELECT * FROM users WHERE user_delete_status = '0' 
                                            AND user_access_level = 'Customer' ORDER BY user_first_name ASC");
                                            if (mysqli_num_rows($sellers_sql) > 0) {
                                                while ($sellers = mysqli_fetch_array($sellers_sql)) {
                                            ?>
                                                    <option value="<?php echo $sellers['use_id']; ?>"><?php echo $sellers['user_first_name'] . ' ' . $sellers['user_last_name'] . '.  Phone Number: ' . $sellers['user_phone_number']; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-lg-4">
                                        <label for="email">Select Product Category</label>
                                        <select type="text" required class="form-control basic_select" name="user_access_level">
                                            <?php
                                            $categories_sql = mysqli_query($mysqli, "SELECT * FROM categories WHERE category_delete_status = '0' ORDER BY category_name ASC");
                                            if (mysqli_num_rows($categories_sql) > 0) {
                                                while ($product_categories = mysqli_fetch_array($categories_sql)) {
                                            ?>
                                                    <option value="<?php echo $product_categories['category_id']; ?>"><?php echo $product_categories['category_code'] . ' ' .  $product_categories['category_name']; ?></option>
                                            <?php }
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="exampleInputFile">Select File</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input required name="file" accept=".xls,.xlsx" type="file" class="custom-file-input">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="text-right">
                                    <button type="submit" name="Bulk_Import_Product_Categories" class="btn btn-primary">Upload File</button>
                                </div>
                                <br>
                            </form>
                        </div>
                    </div>

                </div> <!-- End Content -->
            </div> <!-- End Content Wrapper -->

            <!-- Footer -->
            <?php require_once('../app/partials/backoffice_footer.php'); ?>

        </div> <!-- End Page Wrapper -->
    </div> <!-- End Wrapper -->

    <!-- Common Javascript -->

</body>
<?php require_once('../app/partials/backoffice_scripts.php'); ?>


</html>