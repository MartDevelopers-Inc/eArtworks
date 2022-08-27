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
//require_once('../app/helpers/bulk_import.php');
require_once('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

/* Handle Bulk Staff Imports */

if (isset($_POST['Bulk_Import_Staffs'])) {
    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];
    /* Avoid Names Duplication And Replacement */
    $temp_user_file = explode('.', $_FILES['file']['name']);
    $new_user_file = 'BULK_IMPORT_USERS' . (round(microtime(true)) . '.' . end($temp_user_file));

    /* Is File Extension Allowed */
    if (in_array($_FILES["file"]["type"], $allowedFileType)) {
        $targetPath = "../public/uploads/users/xls_files/" . $new_user_file;
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);
        
        $Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();


        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);


        for ($i = 1; $i <= $sheetCount; $i++) {

            $user_first_name  = "";
            if (isset($spreadSheetAry[$i][0])) {
                $user_first_name  = mysqli_real_escape_string($mysqli, $spreadSheetAry[$i][0]);
            }

            $user_last_name  = "";
            if (isset($spreadSheetAry[$i][1])) {
                $user_last_name  = mysqli_real_escape_string($mysqli, $spreadSheetAry[$i][1]);
            }

            $user_email   = "";
            if (isset($spreadSheetAry[$i][2])) {
                $user_email   = mysqli_real_escape_string($mysqli, $spreadSheetAry[$i][2]);
            }

            $user_dob   = "";
            if (isset($spreadSheetAry[$i][3])) {
                $user_dob   = mysqli_real_escape_string($mysqli, $spreadSheetAry[$i][3]);
            }

            $user_phone_number   = "";
            if (isset($spreadSheetAry[$i][4])) {
                $user_phone_number   = mysqli_real_escape_string($mysqli, $spreadSheetAry[$i][4]);
            }

            $user_default_address   = "";
            if (isset($spreadSheetAry[$i][5])) {
                $user_default_address   = mysqli_real_escape_string($mysqli, $spreadSheetAry[$i][5]);
            }

            /* Hidden Values That Cannot Be Posted Via XLS */
            $user_password  = mysqli_real_escape_string($mysqli, 'Demo123@'); /* ALL PASSWORDS ARE SET TO DEFAULT SYSTEM PASSWORD */
            $user_access_level = mysqli_real_escape_string($mysqli, 'Staff');


            /* Prevent Double Entries -  This may or not be triggered but the duplicate value will be skipped */
            $sql = "SELECT * FROM users  WHERE user_email ='{$user_email}'  ";
            $res = mysqli_query($mysqli, $sql);
            if (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                if ($user_email == $row['user_email']  || $user_phone_number == $row['user_phone_number']) {
                    $err = 'User With This Email : ' . $user_email . ' Or This  ' . $user_phone_number . 'Phone Number Already Exists';
                }
            } else {
                if (!empty($user_email) || !empty($user_first_name) || !empty($user_phone_number)) {
                    /* Persist Bulk Imports If No Duplicates */
                    $insert_sql = "INSERT INTO users (user_first_name, user_last_name, user_email, user_dob, user_phone_number, user_default_address, user_access_level)
                    VALUES('{$user_first_name}', '{$user_last_name}', '{$user_email}', '{$user_dob}', '{$user_phone_number}', '{$user_default_address}', '{$user_access_level}')";

                    /* Prepare */
                    if (mysqli_query($mysqli, $insert_sql) && unlink($targetPath)) {
                        $success = "Users data imported successfully";
                    } else {
                        $err = "Failed, please try again";
                    }
                }
            }
        }
    } else {
        $info = "Invalid File Type. Upload Excel File.";
    }
}
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
                            <h1>Bulk Import Staffs</h1>
                            <p class="breadcrumbs">
                                <span>
                                    <a href="dashboard">Home</a>
                                </span>
                                <span>
                                    <i class="mdi mdi-chevron-right"></i>
                                    <a href="">Staffs</a>
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
                                <a class="text-success" href="../public/uploads/templates/users.xlsx">Download</a>
                                A Template File
                            </p>
                            <br><br>
                            <form method="post" enctype="multipart/form-data" role="form">
                                <div class="row">
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
                                    <button type="submit" name="Bulk_Import_Staffs" class="btn btn-primary">Upload File</button>
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