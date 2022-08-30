<?php
/*
* Crafted On Mon Aug 29 2022
*
*
* https://bit.ly/MartMbithi
* martdevelopers254@gmail.com
*
*
* The MartDevelopers End User License Agreement
* Copyright (c) 2022 MartDevelopers
*
*
* 1. GRANT OF LICENSE
* MartDevelopers hereby grants to you (an individual) the revocable, personal, non-exclusive, and nontransferable right to
* install and activate this system on two separated computers solely for your personal and non-commercial use,
* unless you have purchased a commercial license from MartDevelopers. Sharing this Software with other individuals,
* or allowing other individuals to view the contents of this Software, is in violation of this license.
* You may not make the Software available on a network, or in any way provide the Software to multiple users
* unless you have first purchased at least a multi-user license from MartDevelopers.
*
* 2. COPYRIGHT
* The Software is owned by MartDevelopers and protected by copyright law and international copyright treaties.
* You may not remove or conceal any proprietary notices, labels or marks from the Software.
*
*
* 3. RESTRICTIONS ON USE
* You may not, and you may not permit others to
* (a) reverse engineer, decompile, decode, decrypt, disassemble, or in any way derive source code from, the Software;
* (b) modify, distribute, or create derivative works of the Software;
* (c) copy (other than one back-up copy), distribute, publicly display, transmit, sell, rent, lease or
* otherwise exploit the Software.
*
*
* 4. TERM
* This License is effective until terminated.
* You may terminate it at any time by destroying the Software, together with all copies thereof.
* This License will also terminate if you fail to comply with any term or condition of this Agreement.
* Upon such termination, you agree to destroy the Software, together with all copies thereof.
*
*
* 5. NO OTHER WARRANTIES.
* MARTDEVELOPERS DOES NOT WARRANT THAT THE SOFTWARE IS ERROR FREE.
* MARTDEVELOPERS SOFTWARE DISCLAIMS ALL OTHER WARRANTIES WITH RESPECT TO THE SOFTWARE,
* EITHER EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO IMPLIED WARRANTIES OF MERCHANTABILITY,
* FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT OF THIRD PARTY RIGHTS.
* SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OF IMPLIED WARRANTIES OR LIMITATIONS
* ON HOW LONG AN IMPLIED WARRANTY MAY LAST, OR THE EXCLUSION OR LIMITATION OF
* INCIDENTAL OR CONSEQUENTIAL DAMAGES,
* SO THE ABOVE LIMITATIONS OR EXCLUSIONS MAY NOT APPLY TO YOU.
* THIS WARRANTY GIVES YOU SPECIFIC LEGAL RIGHTS AND YOU MAY ALSO
* HAVE OTHER RIGHTS WHICH VARY FROM JURISDICTION TO JURISDICTION.
*
*
* 6. SEVERABILITY
* In the event of invalidity of any provision of this license, the parties agree that such invalidity shall not
* affect the validity of the remaining portions of this license.
*
*
* 7. NO LIABILITY FOR CONSEQUENTIAL DAMAGES IN NO EVENT SHALL MARTDEVELOPERS OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY
* CONSEQUENTIAL, SPECIAL, INCIDENTAL OR INDIRECT DAMAGES OF ANY KIND ARISING OUT OF THE DELIVERY, PERFORMANCE OR
* USE OF THE SOFTWARE, EVEN IF MARTDEVELOPERS HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES
* IN NO EVENT WILL MARTDEVELOPERS LIABILITY FOR ANY CLAIM, WHETHER IN CONTRACT
* TORT OR ANY OTHER THEORY OF LIABILITY, EXCEED THE LICENSE FEE PAID BY YOU, IF ANY.
*
*/

/* ---------------------------- Categories Helpers -------------------------------------------------------- */

/* Add Category */
if (isset($_POST['Register_New_Category'])) {
    $category_code  = 'ART-' . substr(str_shuffle("QWERTYUIOPLKJHGFDSAZXCVBNM1234567890"), 1, 4);
    $category_name = mysqli_real_escape_string($mysqli, $_POST['category_name']);
    $category_details = mysqli_real_escape_string($mysqli, $_POST['category_details']);

    /* Prevent Double Entries */
    $sql = "SELECT * FROM categories  WHERE category_name ='{$category_name}'  ";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        if ($category_name == $row['category_name']) {
            $err = 'Category Name  Already Exists';
        }
    } else {
        /* Persist */
        $sql = "INSERT INTO categories (category_code, category_name, category_details)
        VALUES('{$category_code}', '{$category_name}', '{$category_details}')";

        if (mysqli_query($mysqli, $sql)) {
            $success = "Category added";
        } else {
            $err = "Failed, try again";
        }
    }
}

/* Update Category */
if (isset($_POST['Update_Product_Category'])) {
    $category_id = mysqli_real_escape_string($mysqli, $_POST['category_id']);
    $category_name = mysqli_real_escape_string($mysqli, $_POST['category_name']);
    $category_details = mysqli_real_escape_string($mysqli, $_POST['category_details']);

    /* Persist */
    $sql = "UPDATE categories SET category_name = '{$category_name}', category_details = '{$category_details}' WHERE category_id = '{$category_id}'";
    if (mysqli_query($mysqli, $sql)) {
        $success = "Category updated";
    } else {
        $err = "Failed, try again";
    }
}


/* Delete Category */
if (isset($_POST['Delete_Product_Category'])) {
    $category_id = mysqli_real_escape_string($mysqli, $_POST['category_id']);
    $category_delete_status = mysqli_real_escape_string($mysqli, '1');

    /* Persist*/
    $sql = "UPDATE categories SET category_delete_status = '{$category_delete_status}' WHERE category_id = '{$category_id}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Product category moved to trash";
    } else {
        $err = "Failed, try again later";
    }
}



/* ----------------------------- Product Helpers ------------------------------------------------ */
/* Add Product */

/* Update Product */

/* Delete Product */