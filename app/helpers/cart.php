<?php
/*
 *   Crafted On Wed Sep 07 2022
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


$db_handle = new DBController();
if (!empty($_GET["action"])) {
    switch ($_GET["action"]) {
        case "add":
            /* Add Items To Cart */
            if (!empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM products WHERE product_id='" . $_GET["product_id"] . "'");
                $itemArray = array(
                    $productByCode[0]["product_sku_code"] => array(
                        'product_name' => $productByCode[0]["product_name"],
                        'product_sku_code' => $productByCode[0]["product_sku_code"],
                        'quantity' => $_POST["quantity"],
                        'product_price' => ($productByCode[0]["product_price"]),
                        'product_id' => $productByCode[0]["product_id"],
                        'product_image' => $productByCode[0]["product_image"],
                    )
                );
                $success = "Item added to cart";

                if (!empty($_SESSION["cart_item"])) {
                    if (in_array($productByCode[0]["product_sku_code"], array_keys($_SESSION["cart_item"]))) {
                        foreach ($_SESSION["cart_item"] as $k => $v) {
                            if ($productByCode[0]["product_sku_code"] == $k) {
                                if (empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $success = "Item added to cart";
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"], $itemArray);
                    }
                } else {
                    $success = "Item added to cart";
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;


        case "remove":
            /* Remove Items From Cart */
            if (!empty($_SESSION["cart_item"])) {
                foreach ($_SESSION["cart_item"] as $k => $v) {
                    if ($_GET["product_sku_code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if (empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
                $success = "Item removed from cart";
            }
            break;
        case "empty":
            /* Empty Cart */
            $success = "Cart cleared";
            unset($_SESSION["cart_item"]);
            break;
    }
}

/* Process Cart Data */
if (isset($_POST['Process_Cart'])) {
    $cart_products = $_SESSION['cart_item'];
    $order_estimated_delivery_date = mysqli_real_escape_string($mysqli, $_POST['order_estimated_delivery_date']);
    $order_user_id = mysqli_real_escape_string($mysqli, $_POST['order_user_id']);
    $order_code = mysqli_real_escape_string($mysqli, $a . $b);
    $order_date = mysqli_real_escape_string($mysqli, date('Y-m-d'));
    $order_status = mysqli_real_escape_string($mysqli, $_POST['order_status']);
    $order_payment_status = mysqli_real_escape_string($mysqli, 'Pending');
    $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);



    /* Populate Items In the Cart Array  */
    foreach ($cart_products as $cart_products) {
        $order_qty = $cart_products['quantity'];
        $order_product_id = $cart_products['product_id'];
        /* Get Existing Product Details  */
        $sql = "SELECT * FROM  products  WHERE product_id = '{$order_product_id}'";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $products = mysqli_fetch_assoc($res);

            /* Update Products Count */
            $new_product_qty = $products['product_qty_in_stock'] - $order_qty;
            /* Get Overall Order Cost */
            $total_order_cost = $products['product_price'] * $order_qty;

            /* Persist */
            $update_sql = "UPDATE products SET product_qty_in_stock = '{$new_product_qty}' WHERE product_id = '{$order_product_id}'";
            $order_sql = "INSERT INTO orders (order_user_id, order_product_id,  order_code, order_date, order_qty, order_cost, order_status, order_payment_status, order_estimated_delivery_date)
            VALUES('{$order_user_id}', '{$order_product_id}', '{$order_code}', '{$order_date}', '{$order_qty}', '{$total_order_cost}', '{$order_status}', '{$order_payment_status}', '{$order_estimated_delivery_date}')";


            /* Order Status Mailer */
            include('../app/mailers/order_mailer.php');
            if (mysqli_query($mysqli, $order_sql) &&  mysqli_query($mysqli, $update_sql) && $mail->send()) {
                //$_SESSION['success'] = "Order $order_code submitted";
                header('Location: landing_track_order_details?view=' . $order_code);
                unset($_SESSION["cart_item"]);
                //exit  -This Code Is The One Which Killed My Session;
            } else {
                $err = "Failed, please try again";
            }
        }
    }
}
