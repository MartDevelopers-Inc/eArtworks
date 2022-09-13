<?php
/*
 *   Crafted On Mon Sep 05 2022
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


/* Add Orders */
if (isset($_POST['Add_Order'])) {
    $order_user_id = mysqli_real_escape_string($mysqli, $_POST['order_user_id']);
    $order_product_id = mysqli_real_escape_string($mysqli, $_POST['order_product_id']);
    $order_code = mysqli_real_escape_string($mysqli, $a . $b);
    $order_qty = mysqli_real_escape_string($mysqli, $_POST['order_qty']);
    $order_date = mysqli_real_escape_string($mysqli, date('d M Y'));
    $order_status  = mysqli_real_escape_string($mysqli, $_POST['order_status']);
    $order_payment_status = mysqli_real_escape_string($mysqli, 'Pending');
    $order_estimated_delivery_date = mysqli_real_escape_string($mysqli, $_POST['order_estimated_delivery_date']);

    $product_sql = mysqli_query(
        $mysqli,
        "SELECT * FROM products WHERE product_delete_status = '0' AND product_id = '{$order_product_id}'"
    );
    if (mysqli_num_rows($product_sql) > 0) {
        while ($product = mysqli_fetch_array($product_sql)) {
            /* Get Product Price Based On Product ID Posted From The Form */
            $order_cost = mysqli_real_escape_string($mysqli, ($product['product_price'] * $order_qty));
            /* Deduct Products From Stock */
            $new_product_qty = $product['product_qty_in_stock'] - $order_qty;

            /* Update Product Stock */
            $update_sql = "UPDATE products SET product_qty_in_stock ='{$new_product_qty}' WHERE product_id = '{$order_product_id}'";

            /* Persist */
            $sql = "INSERT INTO orders (order_user_id, order_product_id, order_code, order_date, order_cost, order_status, order_qty,  order_payment_status, order_estimated_delivery_date) VALUES(
            '{$order_user_id}', '{$order_product_id}', '{$order_code}', '{$order_date}', '{$order_cost}', '{$order_status}', '{$order_qty}', '{$order_payment_status}', '{$order_estimated_delivery_date}')";

            if (mysqli_query($mysqli, $sql) && mysqli_query($mysqli, $update_sql)) {
                $success = "Order $order_code Added";
            } else {
                $err = "Failed, try again";
            }
        }
    }
}

/* Update Orders */
if (isset($_POST['Update_Order'])) {
    $order_code = mysqli_real_escape_string($mysqli, $_POST['order_code']);
    $order_cost  = mysqli_real_escape_string($mysqli, $_POST['order_cost']);
    $order_estimated_delivery_date = mysqli_real_escape_string($mysqli, $_POST['order_estimated_delivery_date']);

    /* Persist */
    $sql = "UPDATE orders SET order_cost = '{$order_cost}',  order_estimated_delivery_date = '{$order_estimated_delivery_date}'
    WHERE order_code ='{$order_code}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Order Updated";
    } else {
        $err = "Failed, try again";
    }
}

/* Update Order Status */
if (isset($_POST['Update_Order_Status'])) {
    $order_code = mysqli_real_escape_string($mysqli, $_POST['order_code']);
    $order_status = mysqli_real_escape_string($mysqli, $_POST['order_status']);

    /* Persist */
    $sql  = "UPDATE orders SET order_status = '{$order_status}' WHERE order_code = '{$order_code}'";
    if (mysqli_query($mysqli, $sql)) {
        $success = "Order status updated";
    } else {
        $err = "Failed, try gain";
    }
}

/* Delete Order */
if (isset($_POST['Delete_Order'])) {
    $order_code = mysqli_real_escape_string($mysqli, $_POST['order_code']);
    $order_delete_status = mysqli_real_escape_string($mysqli, '1');

    /* Persist */
    $sql = "UPDATE orders SET order_delete_status = '{$order_delete_status}' WHERE order_code = '{$order_code}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Order moved to recycle bin";
    } else {
        $err = "Failed, please try again";
    }
}

/* Add Payment */
if (isset($_POST['Mark_Order_As_Paid'])) {
    /* Add Extra Payment Methods Handlers Here */
    $payment_order_code = mysqli_real_escape_string($mysqli, $_POST['payment_order_code']);
    $payment_amount = mysqli_real_escape_string($mysqli, $_POST['payment_amount']);
    $payment_means_id = mysqli_real_escape_string($mysqli, $_POST['payment_means_id']);
    $payment_ref_code = mysqli_real_escape_string($mysqli, $_POST['payment_ref_code']);

    /* Persist */
    $sql = "INSERT INTO payments (payment_order_code, payment_means_id, payment_amount, payment_ref_code) 
    VALUES('{$payment_order_code}', '{$payment_means_id}', '{$payment_amount}', '$payment_ref_code')";
    $order_sql = "UPDATE orders SET order_payment_status = 'Paid' WHERE order_code = '{$payment_order_code}'";

    if (mysqli_query($mysqli, $sql)  && mysqli_query($mysqli, $order_sql)) {
        $success = "Payment reference $payment_ref_code confirmed";
    } else {
        $err = "Failed, please try again";
    }
}




/* Delete Payment*/
if (isset($_POST['Delete_Payment'])) {
    $payment_id = mysqli_real_escape_string($mysqli, $_POST['payment_id']);
    $order_code = mysqli_real_escape_string($mysqli, $_POST['order_code']);

    /* Persist */
    $sql = "UPDATE payments SET payment_delete_status = '1' WHERE payment_id = '{$payment_id}'";
    $order_sql = "UPDATE orders SET order_payment_status = 'Pending' WHERE order_code = '{$order_code}'";

    if (mysqli_query($mysqli, $sql) && mysqli_query($mysqli, $order_sql)) {
        $success = "Payment moved to recycle bin";
    } else {
        $err = "Failed, please try again";
    }
}
