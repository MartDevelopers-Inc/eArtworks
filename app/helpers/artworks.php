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
if (isset($_POST['Register_New_Product'])) {
    $product_category_id = mysqli_real_escape_string($mysqli, $_POST['product_category_id']);
    $product_seller_id = mysqli_real_escape_string($mysqli, $_POST['product_seller_id']);
    $product_sku_code = mysqli_real_escape_string($mysqli, $_POST['product_sku_code']);
    $product_name = mysqli_real_escape_string($mysqli, $_POST['product_name']);
    $product_details = mysqli_real_escape_string($mysqli, $_POST['product_details']);
    $product_qty_in_stock = mysqli_real_escape_string($mysqli, $_POST['product_qty_in_stock']);
    $product_price = mysqli_real_escape_string($mysqli, $_POST['product_price']);
    $product_available_from = date('Y-m-d g:ia', strtotime(mysqli_real_escape_string($mysqli, $_POST['product_available_from'])));

    /* Process Product Image */
    $temp_product_image = explode('.', $_FILES['product_image']['name']);
    $new_product_image = $product_sku_code . '-' . (round(microtime(true)) . '.' . end($temp_product_image));
    move_uploaded_file(
        $_FILES['product_image']['tmp_name'],
        '../public/uploads/products/' . $new_product_image
    );

    /* Persist */
    $sql = "INSERT INTO products (product_category_id, product_seller_id, product_sku_code, product_name, product_details, product_qty_in_stock, product_price, product_image, product_available_from)
    VALUES('{$product_category_id}', '{$product_seller_id}', '{$product_sku_code}', '{$product_name}', '{$product_details}', '{$product_qty_in_stock}', '{$product_price}', '{$new_product_image}', '{$product_available_from}')";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Product added";
    } else {
        $err = "Failed, please try again";
    }
}

/* Update Product */
if (isset($_POST['Update_Product'])) {
    $product_id = mysqli_real_escape_string($mysqli, $_POST['product_id']);
    $product_category_id = mysqli_real_escape_string($mysqli, $_POST['product_category_id']);
    $product_seller_id = mysqli_real_escape_string($mysqli, $_POST['product_seller_id']);
    $product_sku_code = mysqli_real_escape_string($mysqli, $_POST['product_sku_code']);
    $product_name = mysqli_real_escape_string($mysqli, $_POST['product_name']);
    $product_details = mysqli_real_escape_string($mysqli, $_POST['product_details']);
    $product_qty_in_stock = mysqli_real_escape_string($mysqli, $_POST['product_qty_in_stock']);
    $product_price = mysqli_real_escape_string($mysqli, $_POST['product_price']);
    $product_available_from = date('Y-m-d g:ia', strtotime(mysqli_real_escape_string($mysqli, $_POST['product_available_from'])));


    /* Check If Posted Update Has Image */
    if (!empty($_FILES['product_image']['name'])) {
        /* Process Product Image */
        $temp_product_image = explode('.', $_FILES['product_image']['name']);
        $new_product_image = $product_sku_code . '-' . (round(microtime(true)) . '.' . end($temp_product_image));
        move_uploaded_file(
            $_FILES['product_image']['tmp_name'],
            '../public/uploads/products/' . $new_product_image
        );

        /*Check If Product Had 
        Existing  Photo And If It
        Was There Delete It From Storage Then Replace With New One
        */
        $sql = "SELECT * FROM  products WHERE  product_id = '{$product_id}'";
        $res = mysqli_query($mysqli, $sql);
        $row = mysqli_fetch_assoc($res);
        if (!empty($row['product_image'])) {
            /* User Has Old Photo */
            $old_product_photo = $row['product_image'];
            $old_product_photo_location = '../public/uploads/products/' . $old_product_photo;
            /* Delete It */
            unlink($old_product_photo_location);
        }

        /* Persist */
        $sql = "UPDATE products SET product_category_id = '{$product_category_id}', product_seller_id = '{$product_seller_id}', product_sku_code= '{$product_sku_code}',
        product_name = '{$product_name}',product_details = '{$product_details}', product_qty_in_stock = '{$product_qty_in_stock}', product_price = '{$product_price}', product_image = '{$new_product_image}', product_available_from = '{$product_available_from}'
        WHERE product_id = '{$product_id}'";

        if (mysqli_query($mysqli, $sql)) {
            $success = "Product updated";
        } else {
            $err = "Failed, please try again";
        }
    } else {
        /* Persist Update Without affecting the image */
        $sql = "UPDATE products SET product_category_id = '{$product_category_id}', product_seller_id = '{$product_seller_id}', product_sku_code= '{$product_sku_code}',
        product_name = '{$product_name}',product_details = '{$product_details}', product_qty_in_stock = '{$product_qty_in_stock}', product_price = '{$product_price}', product_available_from = '{$product_available_from}'
        WHERE product_id = '{$product_id}'";

        if (mysqli_query($mysqli, $sql)) {
            $success = "Product updated";
        } else {
            $err = "Failed, please try again";
        }
    }
}

/* Delete Product */
if (isset($_POST['Delete_Product'])) {
    $product_id = mysqli_real_escape_string($mysqli, $_POST['product_id']);

    /* Persist */
    $sql = "UPDATE products SET product_delete_status = '1' WHERE product_id = '{$product_id}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Product moved to recycle bin";
    } else {
        $err = "Failed please try again";
    }
}
