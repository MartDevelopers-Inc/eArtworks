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


/* Add Category */
if (isset($_POST['Add_Category'])) {
    $category_reg = mysqli_real_escape_string($mysqli, $_POST['category_reg']);
    $category_name = mysqli_real_escape_string($mysqli, $_POST['category_name']);
    $category_desc = mysqli_real_escape_string($mysqli, $_POST['category_desc']);

    /* Persist */
    $sql = "INSERT INTO category (category_reg, category_name, category_desc) VALUES('{$category_reg}', '{$category_name}', '{$category_desc}')";

    /* Prepare */
    if (mysqli_query($mysqli, $sql)) {
        $success = "Category added";
    } else {
        $err = "Failed, try again";
    }
}

/* Update Category */
if (isset($_POST['Update_Category'])) {
    $category_reg = mysqli_real_escape_string($mysqli, $_POST['category_reg']);
    $category_name = mysqli_real_escape_string($mysqli, $_POST['category_name']);
    $category_desc = mysqli_real_escape_string($mysqli, $_POST['category_desc']);
    $category_id = mysqli_real_escape_string($mysqli, $_POST['category_id']);

    /* Persist */
    $sql = "UPDATE category  SET category_reg = '{$category_reg}', category_name = '{$category_name}', category_desc = '{$category_desc}' WHERE category_id = '{$category_id}'";
    /* Prepare */
    if (mysqli_query($mysqli, $sql)) {
        $success = "Category updated";
    } else {
        $err = "Failed, try again";
    }
}

/* Delete Category */
if (isset($_POST['Delete_Category'])) {
    $category_id = mysqli_real_escape_string($mysqli, $_POST['category_id']);

    /* Persist */
    $sql = "DELETE FROM category WHERE category_id = '{$category_id}'";

    /* Prepare */
    if (mysqli_query($mysqli, $sql)) {
        $success = "Category deleted";
    } else {
        $err = "Failed, please try again";
    }
}

/* Add Art */
if (isset($_POST['Add_Art'])) {
    $artwork_reg  = mysqli_real_escape_string($mysqli, $_POST['artwork_reg']);
    $artwork_type = mysqli_real_escape_string($mysqli, $_POST['artwork_type']);
    $artwork_price = mysqli_real_escape_string($mysqli, $_POST['artwork_price']);
    $artwork_desc = mysqli_real_escape_string($mysqli, $_POST['artwork_desc']);
    $artwork_cat_id = mysqli_real_escape_string($mysqli, $_POST['artwork_cat_id']);
    $artwork_artist_id = mysqli_real_escape_string($mysqli, $_POST['artwork_artist_id']);

    /* Persist */
    $sql = "INSERT INTO artwork (artwork_reg, artwork_type, artwork_price, artwork_desc, artwork_cat_id, artwork_artist_id)
    VALUES('{$artwork_reg}', '{$artwork_type}', '{$artwork_price}', '{$artwork_desc}', '{$artwork_cat_id}', '{$artwork_artist_id}')";

    /* Prepare */
    if (mysqli_query($mysqli, $sql)) {
        $success = "Artwork added";
    } else {
        $err = "Failed, try again";
    }
}

/* Update Art */
if (isset($_POST['Update_Art'])) {
    $artwork_reg  = mysqli_real_escape_string($mysqli, $_POST['artwork_reg']);
    $artwork_type = mysqli_real_escape_string($mysqli, $_POST['artwork_type']);
    $artwork_price = mysqli_real_escape_string($mysqli, $_POST['artwork_price']);
    $artwork_desc = mysqli_real_escape_string($mysqli, $_POST['artwork_desc']);
    $artwork_id = mysqli_real_escape_string($mysqli, $_POST['artwork_id']);
    /* Persist */
    $sql = "UPDATE artwork SET artwork_reg = '{$artwork_reg}', artwork_type = '{$artwork_type}', artwork_price = '{$artwork_price}', 
    artwork_desc = '{$artwork_desc}' WHERE artwork_id = '{$artwork_id}'";

    /* Prepare */
    if (mysqli_query($mysqli, $sql)) {
        $success = "Artwork updated";
    } else {
        $err = "Failed, try again";
    }
}


/* Delete Art */
if (isset($_POST['Delete_Art'])) {
    $artwork_id = mysqli_real_escape_string($mysqli, $_POST['artwork_id']);
    /* Persist */
    $sql = "DELETE FROM artwork  WHERE artwork_id = '{$artwork_id}'";

    /* Prepare */
    if (mysqli_query($mysqli, $sql)) {
        $success = "Artwork deleted";
    } else {
        $err = "Failed, try again";
    }
}


/* Add Purchase */
if (isset($_POST['Purchase_Artwork'])) {
    $request_artwork_id = mysqli_real_escape_string($mysqli, $_POST['request_artwork_id']);
    $request_user_id = mysqli_real_escape_string($mysqli, $_POST['request_user_id']);
    $request_date  = mysqli_real_escape_string($mysqli, $_POST['request_date']);
    $request_time   = mysqli_real_escape_string($mysqli, $_POST['request_time']);
    $request_location  = mysqli_real_escape_string($mysqli, $_POST['request_location']);


    /* Persist */
    $sql = "INSERT INTO requests (request_artwork_id, request_user_id, request_date, request_time, request_location)
    VALUES('{$request_artwork_id}', '{$request_user_id}', '{$request_date}', '{$request_time}', '{$request_location}')";

    /* Prepare */
    if (mysqli_query($mysqli, $sql)) {
        $success = "Artwork purchased, procced to payment";
    } else {
        $err = "Failed!, try again";
    }
}

/* Update Purchase  */
if (isset($_POST['Update_Purchase'])) {
    $request_date  = mysqli_real_escape_string($mysqli, $_POST['request_date']);
    $request_time   = mysqli_real_escape_string($mysqli, $_POST['request_time']);
    $request_location  = mysqli_real_escape_string($mysqli, $_POST['request_location']);
    $request_id = mysqli_real_escape_string($mysqli, $_POST['request_id']);

    /* Persist */
    $sql = "UPDATE requests SET request_date = '{$request_date}', request_time = '{$request_time}', request_location = '{$request_location}'
    WHERE request_id = '{$request_id}'";

    /* Prepare */
    if (mysqli_query($mysqli, $sql)) {
        $success = "Purchase updated";
    } else {
        $err = "Failed, try again later";
    }
}

/* Delete Purchase */
if (isset($_POST['Delete_Purchase'])) {
    $request_id = mysqli_real_escape_string($mysqli, $_POST['request_id']);

    /* Persist */
    $sql = "DELETE FROM requests WHERE request_id = '{$request_id}'";

    /* Prepare */
    if (mysqli_query($mysqli, $sql)) {
        $success = "Purchase deleted";
    } else {
        $err = "Failed, try again later";
    }
}

/* Add Payment */
if (isset($_POST['Add_Payment'])) {
    $payment_mode = mysqli_real_escape_string($mysqli, $_POST['payment_mode']);
    $payment_amount = mysqli_real_escape_string($mysqli, $_POST['payment_amount']);
    $payment_trans_code = mysqli_real_escape_string($mysqli, $_POST['payment_trans_code']);
    $payment_request_id = mysqli_real_escape_string($mysqli, $_POST['payment_request_id']);

    /* Persist */
    $sql = "INSERT INTO payment (payment_mode, payment_amount, payment_trans_code, payment_request_id)
    VALUES('{$payment_mode}', '{$payment_amount}', '{$payment_trans_code}', '{$payment_request_id}')";

    $status_sql = "UPDATE requests SET request_status = 'Paid' WHERE request_id = '{$payment_request_id}'";

    /* Prepare */
    if (mysqli_query($mysqli, $sql) && mysqli_query($mysqli, $status_sql)) {
        $success = "Payment Ref: $payment_trans_code Confirmed";
    } else {
        $err = "Failed, try again later";
    }
}
