<?php
/*
 *   Crafted On Thu Aug 25 2022
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


/* Customers */
$query = "SELECT COUNT(*)  FROM users WHERE user_access_level = 'Customer' AND user_delete_status = '0'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($customers);
$stmt->fetch();
$stmt->close();


/* Staffs */
$query = "SELECT COUNT(*)  FROM users WHERE (user_access_level = 'Staff' || user_access_level ='Administrator') AND user_delete_status = '0'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($staffs);
$stmt->fetch();
$stmt->close();

/* Products */
$query = "SELECT COUNT(*)  FROM products WHERE  product_delete_status = '0'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($products);
$stmt->fetch();
$stmt->close();

/* Overall Revenue */
$query = "SELECT SUM(payment_amount)  FROM payments WHERE  payment_delete_status = '0'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($payments);
$stmt->fetch();
$stmt->close();

/* Placed Orders */
$query = "SELECT COUNT(*)  FROM orders WHERE order_status = 'Placed Orders' AND  order_delete_status = '0'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($placed_orders);
$stmt->fetch();
$stmt->close();

/* Awaiting Fullfilment */
$query = "SELECT COUNT(*)  FROM orders WHERE order_status = 'Awaiting Fullfilment' AND  order_delete_status = '0'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($awaiting_fulfillment);
$stmt->fetch();
$stmt->close();


/* Shipped Orders */
$query = "SELECT COUNT(*)  FROM orders WHERE order_status = 'Shipped' AND  order_delete_status = '0'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($shipped);
$stmt->fetch();
$stmt->close();

/* Out For Delivery */
$query = "SELECT COUNT(*)  FROM orders WHERE order_status = 'Out For Delivery' AND  order_delete_status = '0'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($out_for_delivery);
$stmt->fetch();
$stmt->close();


/* Delivered Orders */
$query = "SELECT COUNT(*)  FROM orders WHERE order_status = 'Delivered' AND  order_delete_status = '0'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($delivered);
$stmt->fetch();
$stmt->close();

/* Returned Orders */
$query = "SELECT COUNT(*)  FROM orders WHERE order_status = 'Returned' AND  order_delete_status = '0'";
$stmt = $mysqli->prepare($query);
$stmt->execute();
$stmt->bind_result($returned);
$stmt->fetch();
$stmt->close();
