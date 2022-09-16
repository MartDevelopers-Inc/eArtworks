<?php
/*
 *   Crafted On Tue Sep 13 2022
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


/* Manage Mailer Settings */
if (isset($_POST['Update_Mailer'])) {
    $mailer_id = mysqli_real_escape_string($mysqli, $_POST['mailer_id']);
    $mail_host = mysqli_real_escape_string($mysqli, $_POST['mail_host']);
    $mail_port = mysqli_real_escape_string($mysqli, $_POST['mail_port']);
    $mail_protocol = mysqli_real_escape_string($mysqli, $_POST['mail_protocol']);
    $mail_username = mysqli_real_escape_string($mysqli, $_POST['mail_username']);
    $mail_password = mysqli_real_escape_string($mysqli, $_POST['mail_password']);
    $mail_from_name = mysqli_real_escape_string($mysqli, $_POST['mail_from_name']);
    $mail_from_email = mysqli_real_escape_string($mysqli, $_POST['mail_from_email']);

    /* Persist */
    $sql = "UPDATE mailer_settings SET mail_host = '{$mail_host}', mail_port = '{$mail_port}', mail_protocol = '{$mail_protocol}', mail_username = '{$mail_username}',
    mail_password = '{$mail_password}', mail_from_name = '{$mail_from_name}', mail_from_email = '{$mail_from_email}'  WHERE mailer_id = '{$mailer_id}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "STMP mailer confgurations updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Add thirdparty API  */
if (isset($_POST['Add_API'])) {
    $api_name = mysqli_real_escape_string($mysqli, $_POST['api_name']);
    $api_identification = mysqli_real_escape_string($mysqli, $_POST['api_identification']);
    $api_token = mysqli_real_escape_string($mysqli, $_POST['api_token']);

    /* Persist */
    $sql = "INSERT INTO thirdparty_apis (api_name, api_identification, api_token) VALUES('{$api_name}', '{$api_identification}', '{$api_token}')";

    if (mysqli_query($mysqli, $sql)) {
        $success = "$api_name added to API lists";
    } else {
        $err = "Failed, please try again";
    }
}

/* Update API */
if (isset($_POST['Update_API'])) {
    $api_id = mysqli_real_escape_string($mysqli, $_POST['api_id']);
    $api_name = mysqli_real_escape_string($mysqli, $_POST['api_name']);
    $api_identification = mysqli_real_escape_string($mysqli, $_POST['api_identification']);
    $api_token = mysqli_real_escape_string($mysqli, $_POST['api_token']);

    /* Persist */
    $sql  = "UPDATE thirdparty_apis SET api_name = '{$api_name}', api_identification = '{$api_identification}', api_token = '{$api_token}' 
    WHERE api_id = '{$api_id}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "$api_name updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete API */
if (isset($_POST['Delete_API'])) {
    $api_id = mysqli_real_escape_string($mysqli, $_POST['api_id']);

    /* Persist */
    $sql  = "DELETE FROM thirdparty_apis WHERE api_id = '{$api_id}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "API deleted";
    } else {
        $err = "Failed, please try again";
    }
}

/* Add Payment Methods */
if (isset($_POST['Add_Payment_Means'])) {
    $means_code = mysqli_real_escape_string($mysqli, $_POST['means_code']);
    $means_name = mysqli_real_escape_string($mysqli, $_POST['means_name']);

    /* Persist */
    $sql = "INSERT INTO payment_means (means_code, means_name) VALUES('{$means_code}', '{$means_name}')";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Payment method added";
    } else {
        $err = "Failed, please try again";
    }
}


/* Update Payment Methods */
if (isset($_POST['Update_Payment_Means'])) {
    $means_id = mysqli_real_escape_string($mysqli, $_POST['means_id']);
    $means_code = mysqli_real_escape_string($mysqli, $_POST['means_code']);
    $means_name = mysqli_real_escape_string($mysqli, $_POST['means_name']);

    /* Persist */
    $sql = "UPDATE payment_means SET means_code = '{$means_code}', means_name = '{$means_name}' WHERE means_id = '{$means_id}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Payment method updated";
    } else {
        $err = "Failed, please try again";
    }
}


/* Delete Payment Methods */
if (isset($_POST['Delete_Payment_Means'])) {
    $means_id = mysqli_real_escape_string($mysqli, $_POST['means_id']);

    /* Persist */
    $sql = "UPDATE payment_means SET means_delete_status = '1' WHERE means_id = '{$means_id}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Payment means moved to recycle bin";
    } else {
        $err = "Failed, please try again";
    }
}


/* Purge Everything */
if (isset($_POST['Purge_Everything'])) {
    /* Purge Everything */
    $categories_purge = "DELETE FROM categories WHERE category_delete_status = '1'";
    $orders_purge = "DELETE FROM orders WHERE order_delete_status= '1'";
    $payments_purge = "DELETE FROM payments WHERE payment_delete_status = '1'";
    $payment_means_purge = "DELETE FROM payment_means WHERE means_delete_status  = '1'";
    $products_purge = "DELETE FROM products WHERE product_delete_status = '1'";
    $users_purge = "DELETE FROM users WHERE user_delete_status  = '1'";

    /* Persist */
    if (
        mysqli_query($mysqli, $categories_purge) &&
        mysqli_query($mysqli, $orders_purge) &&
        mysqli_query($mysqli, $payments_purge) &&
        mysqli_query($mysqli, $payment_means_purge) &&
        mysqli_query($mysqli, $products_purge) &&
        mysqli_query($mysqli, $users_purge)
    ) {
        $success  = "Contents in recycle bin purged";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Categories */
if (isset($_POST['Delete_Categories'])) {
    $category_id = mysqli_real_escape_string($mysqli, $_POST['category_id']);

    /* Persist */
    if (mysqli_query(
        $mysqli,
        "DELETE FROM categories WHERE category_id = '{$category_id}'"
    )) {
        $success = "Category deleted";
    } else {
        $err  = "Failed, please try again";
    }
}


/* Restore Categories */
if (isset($_POST['Restore_Categories'])) {
    $category_id   = mysqli_real_escape_string($mysqli, $_POST['category_id']);

    /* Persist */
    if (mysqli_query(
        $mysqli,
        "UPDATE categories SET category_delete_status = '0' WHERE category_id = '{$category_id}'"
    )) {
        $success = "Category restored";
    } else {
        $err  = "Failed, please try again";
    }
}

/* Delete Order */
if (isset($_POST['Delete_Order'])) {
    $order_code = mysqli_real_escape_string($mysqli, $_POST['order_code']);

    /* Persist */
    if (mysqli_query(
        $mysqli,
        "DELETE FROM  orders WHERE order_code = '{$order_code}'"
    )) {
        $success = "Order deleted";
    } else {
        $err =  "Failed, please try again";
    }
}

/* Restore Orders */
if (isset($_POST['Restore_Orders'])) {
    $order_code = mysqli_real_escape_string($mysqli, $_POST['order_code']);

    /* Persist */
    if (mysqli_query(
        $mysqli,
        "UPDATE orders SET order_delete_status = '0' WHERE order_code = '{$order_code}'"
    )) {
        $success = "Order restored";
    } else {
        $err =  "Failed, please try again";
    }
}


/* Delete Payments */
if (isset($_POST['Delete_Payment'])) {
    $payment_id = mysqli_real_escape_string($mysqli, $_POST['payment_id']);

    /* Persist */
    if (mysqli_query(
        $mysqli,
        "DELETE FROM payments WHERE payment_id = '{$payment_id}'"
    )) {
        $success = "Payment deleted";
    } else {
        $err = "Failed, please try again";
    }
}

/* Restore Payments */
if (isset($_POST['Restore_Payment'])) {
    $payment_id = mysqli_real_escape_string($mysqli, $_POST['payment_id']);

    /* Persist */
    if (mysqli_query(
        $mysqli,
        "UPDATE payments SET payment_delete_status = '0' WHERE payment_id = '{$payment_id}'"
    )) {
        $success = "Payment restored";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Payment Means */
if (isset($_POST['Delete_Payment_Means_From_Trash'])) {
    $means_id = mysqli_real_escape_string($mysqli, $_POST['means_id']);

    /* Persist */
    if (mysqli_query(
        $mysqli,
        "DELETE FROM payment_means  WHERE means_id = '{$means_id}'"
    )) {
        $success = "Payment means deleted";
    } else {
        $err = "Failed, pelase try again";
    }
}


/* Restore Payments Methods */
if (isset($_POST['Restore_Payment_Methods'])) {
    $means_id = mysqli_real_escape_string($mysqli, $_POST['means_id']);

    /* Persist */
    if (mysqli_query(
        $mysqli,
        "UPDATE payment_means SET means_delete_status = '0' WHERE means_id = '{$means_id}'"
    )) {
        $success = "Payment means restored";
    } else {
        $err = "Failed, pelase try again";
    }
}

/* Delete Product */
if (isset($_POST['Delete_Product'])) {
    $product_id = mysqli_real_escape_string($mysqli, $_POST['product_id']);

    /* Persist */
    if (mysqli_query(
        $mysqli,
        "DELETE FROM products WHERE product_id = '{$product_id}'"
    )) {
        $success = "Product deleted";
    } else {
        $err = "Failed, please try again";
    }
}

/* Restore Products */
if (isset($_POST['Restore_Products'])) {
    $product_id  = mysqli_real_escape_string($mysqli, $_POST['product_id']);

    /* Persist */
    if (mysqli_query(
        $mysqli,
        "UPDATE products SET product_delete_status = '0' WHERE product_id = '{$product_id}'"
    )) {
        $success = "Product restored";
    } else {
        $err = "Failed, please try again";
    }
}

/* Delete Staffs */
if (isset($_POST['Delete_Staff_Account'])) {
    $user_id = mysqli_real_escape_string($mysqli, $_POST['user_id']);

    /* Persist */
    if (mysqli_query(
        $mysqli,
        "DELETE FROM users WHERE user_id ='{$user_id}'"
    )) {
        $success = "Account deleted";
    } else {
        $err = "Failed, please try again";
    }
}

/* Restore Staffs */
if (isset($_POST['Restore_Staff_Account'])) {
    $user_id = mysqli_real_escape_string($mysqli, $_POST['user_id']);

    /* Persist */
    if (mysqli_query(
        $mysqli,
        "UPDATE users SET user_delete_status = '0' WHERE user_id = '{$user_id}'"
    )) {
        $success = "Account restored";
    } else {
        $err = "Failed, please try again";
    }
}

/* Analytics Of Items In Recycle Bin */

/* 1. Deleted Staffs */
$query = "SELECT COUNT(*)  FROM users WHERE user_access_level = 'Staff' AND  user_delete_status = '1'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($deleted_staffs);
$stmt->fetch();
$stmt->close();

/* 2. Deleted Customers */
$query = "SELECT COUNT(*)  FROM users WHERE user_access_level = 'Customer' AND  user_delete_status = '1'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($deleted_customers);
$stmt->fetch();
$stmt->close();


/* 3. Deleted Product Categories */
$query = "SELECT COUNT(*)  FROM categories WHERE category_delete_status = '1'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($deleted_categories);
$stmt->fetch();
$stmt->close();


/* 4. Deleted Products */
$query = "SELECT COUNT(*)  FROM products WHERE product_delete_status = '1'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($deleted_products);
$stmt->fetch();
$stmt->close();

/* 5. Deleted Orders */
$query = "SELECT COUNT(*)  FROM orders WHERE order_delete_status = '1'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($deleted_orders);
$stmt->fetch();
$stmt->close();

/* 6. Deleted Payment Means */
$query = "SELECT COUNT(*)  FROM payment_means WHERE means_delete_status = '1'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($deleted_payment_means);
$stmt->fetch();
$stmt->close();

/* 7. Deleted Payments */
$query = "SELECT COUNT(*)  FROM payments WHERE payment_delete_status = '1'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($deleted_payments);
$stmt->fetch();
$stmt->close();
