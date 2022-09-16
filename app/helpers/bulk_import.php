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

/* Load Composer Autoload */
require('../vendor/autoload.php');

use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

$Reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();


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
            $user_password  = sha1(md5(mysqli_real_escape_string($mysqli, 'Demo123@'))); /* ALL PASSWORDS ARE SET TO DEFAULT SYSTEM PASSWORD */
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
                    $insert_sql = "INSERT INTO users (user_first_name, user_last_name, user_email, user_dob, user_phone_number, user_password,  user_default_address, user_access_level)
                    VALUES('{$user_first_name}', '{$user_last_name}', '{$user_email}', '{$user_dob}', '{$user_phone_number}', '{$user_password}', '{$user_default_address}', '{$user_access_level}')";

                    /* Prepare */
                    if (mysqli_query($mysqli, $insert_sql)) {
                        $success = "Users data imported successfully";
                    } else {
                        $err = "Failed, please try again";
                    }
                }
            }
        }
        /* Delete This File */
        unlink($targetPath);
    } else {
        $info = "Invalid File Type. Upload Excel File.";
    }
}

/* Bulk Import Customers */
if (isset($_POST['Bulk_Import_Customers'])) {
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
            $user_password  = sha1(md5(mysqli_real_escape_string($mysqli, 'Demo123@'))); /* ALL PASSWORDS ARE SET TO DEFAULT SYSTEM PASSWORD */
            $user_access_level = mysqli_real_escape_string($mysqli, 'Customer');


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
                    $insert_sql = "INSERT INTO users (user_first_name, user_last_name, user_email, user_dob, user_phone_number, user_password,  user_default_address, user_access_level)
                    VALUES('{$user_first_name}', '{$user_last_name}', '{$user_email}', '{$user_dob}', '{$user_phone_number}', '{$user_password}', '{$user_default_address}', '{$user_access_level}')";

                    /* Prepare */
                    if (mysqli_query($mysqli, $insert_sql)) {
                        $success = "Customers data imported successfully";
                    } else {
                        $err = "Failed, please try again";
                    }
                }
            }
        }
        /* Delete This File */
        unlink($targetPath);
    } else {
        $info = "Invalid File Type. Upload Excel File.";
    }
}

/* Bulk Import Product Categories */
if (isset($_POST['Bulk_Import_Product_Categories'])) {
    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];
    /* Avoid Names Duplication And Replacement */
    $temp_file = explode('.', $_FILES['file']['name']);
    $new_category_file = 'BULK_IMPORT_CATEGORIES' . (round(microtime(true)) . '.' . end($temp_file));

    /* Is File Extension Allowed */
    if (in_array($_FILES["file"]["type"], $allowedFileType)) {
        $targetPath = "../public/uploads/products/xls_files/" . $new_category_file;
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);


        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);


        for ($i = 1; $i <= $sheetCount; $i++) {

            $category_name  = "";
            if (isset($spreadSheetAry[$i][0])) {
                $category_name  = mysqli_real_escape_string($mysqli, $spreadSheetAry[$i][0]);
            }

            $category_details  = "";
            if (isset($spreadSheetAry[$i][1])) {
                $category_details  = mysqli_real_escape_string($mysqli, $spreadSheetAry[$i][1]);
            }

            /* Hidden Values That Cannot Be Posted Via XLS */
            $category_code  = 'ART-' . substr(str_shuffle("QWERTYUIOPLKJHGFDSAZXCVBNM1234567890"), 1, 4);


            /* Prevent Double Entries -  This may or not be triggered but the duplicate value will be skipped */
            $sql = "SELECT * FROM categories  WHERE category_name ='{$category_name}'  ";
            $res = mysqli_query($mysqli, $sql);
            if (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                if ($category_name == $row['category_name']) {
                    $err = 'Category Name  Already Exists';
                }
            } else {
                if (!empty($category_name) || !empty($category_details) || !empty($category_code)) {
                    /* Persist Bulk Imports If No Duplicates */
                    $insert_sql = "INSERT INTO categories (category_code, category_name, category_details)
                    VALUES('{$category_code}', '{$category_name}', '{$category_details}')";

                    /* Prepare */
                    if (mysqli_query($mysqli, $insert_sql)) {
                        $success = "Product categories data imported successfully";
                    } else {
                        $err = "Failed, please try again";
                    }
                }
            }
        }
        /* Delete This File */
        unlink($targetPath);
    } else {
        $info = "Invalid File Type. Upload Excel File.";
    }
}

/* Bulk Import Products */
if (isset($_POST['Bulk_Import_Products'])) {
    $allowedFileType = [
        'application/vnd.ms-excel',
        'text/xls',
        'text/xlsx',
        'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
    ];
    /* Avoid Names Duplication And Replacement */
    $temp_file = explode('.', $_FILES['file']['name']);
    $new_product_file = 'BULK_IMPORT_PRODUCTS' . (round(microtime(true)) . '.' . end($temp_file));

    /* Is File Extension Allowed */
    if (in_array($_FILES["file"]["type"], $allowedFileType)) {
        $targetPath = "../public/uploads/products/xls_files/" . $new_product_file;
        move_uploaded_file($_FILES['file']['tmp_name'], $targetPath);


        $spreadSheet = $Reader->load($targetPath);
        $excelSheet = $spreadSheet->getActiveSheet();
        $spreadSheetAry = $excelSheet->toArray();
        $sheetCount = count($spreadSheetAry);


        for ($i = 1; $i <= $sheetCount; $i++) {

            $product_name  = "";
            if (isset($spreadSheetAry[$i][0])) {
                $product_name  = mysqli_real_escape_string($mysqli, $spreadSheetAry[$i][0]);
            }
            
            $product_qty_in_stock  = "";
            if (isset($spreadSheetAry[$i][1])) {
                $product_qty_in_stock  = mysqli_real_escape_string($mysqli, $spreadSheetAry[$i][1]);
            }

            $product_price  = "";
            if (isset($spreadSheetAry[$i][2])) {
                $product_price  = mysqli_real_escape_string($mysqli, $spreadSheetAry[$i][2]);
            }

            $product_details  = "";
            if (isset($spreadSheetAry[$i][3])) {
                $product_details  = mysqli_real_escape_string($mysqli, $spreadSheetAry[$i][3]);
            }

            /* Hidden Values That Cannot Be Posted Via XLS */
            $product_sku_code  = 'PRD-' . date('dmY') . '-' . substr(str_shuffle("QWERTYUIOPLKJHGFDSAZXCVBNM1234567890"), 1, 5);
            $product_category_id = mysqli_real_escape_string($mysqli, $_POST['product_category_id']);
            $product_seller_id = mysqli_real_escape_string($mysqli, $_POST['product_seller_id']);


            /* Prevent Double Entries -  This may or not be triggered but the duplicate value will be skipped */
            $sql = "SELECT * FROM products  WHERE product_sku_code ='{$product_sku_code}'  ";
            $res = mysqli_query($mysqli, $sql);
            if (mysqli_num_rows($res) > 0) {
                $row = mysqli_fetch_assoc($res);
                if ($product_sku_code == $row['product_sku_code']) {
                    $err = 'SKU code already exists';
                }
            } else {
                if (!empty($product_name) || !empty($product_details) || !empty($product_qty_in_stock) || !empty($product_price)) {
                    /* Persist Bulk Imports If No Duplicates */
                    $insert_sql = "INSERT INTO products (product_category_id, product_seller_id, product_sku_code, product_name, product_details, product_qty_in_stock, product_price)
                    VALUES('{$product_category_id}', '{$product_seller_id}', '{$product_sku_code}', '{$product_name}', '{$product_details}', '{$product_qty_in_stock}', '{$product_price}')";

                    /* Prepare */
                    if (mysqli_query($mysqli, $insert_sql)) {
                        $success = "Product data imported successfully";
                    } else {
                        $err = "Failed, please try again";
                    }
                }
            }
        }
        /* Delete This File */
        unlink($targetPath);
    } else {
        $info = "Invalid File Type. Upload Excel File.";
    }
}
