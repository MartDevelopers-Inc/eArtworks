<?php
/*
 *   Crafted On Sun Jul 17 2022
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

$login_rank = mysqli_real_escape_string($mysqli, $_SESSION['login_rank']);

if ($login_rank == 'Administrator') {
    /* Artsist */
    $query = "SELECT COUNT(*)  FROM artist";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($artist);
    $stmt->fetch();
    $stmt->close();

    /* Customers */
    $query = "SELECT COUNT(*)  FROM users";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($customers);
    $stmt->fetch();
    $stmt->close();

    /* Arts And Designs */
    $query = "SELECT COUNT(*)  FROM artwork";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($artwork);
    $stmt->fetch();
    $stmt->close();

    /* Payments */
    $query = "SELECT SUM(payment_amount)  FROM payment";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($payment);
    $stmt->fetch();
    $stmt->close();
} else if ($login_rank == 'Artist') {
    $login_artist_id = mysqli_real_escape_string($mysqli, $_SESSION['login_artist_id']);
    /* Artist Analytics */
    $query = "SELECT COUNT(*)  FROM artwork WHERE artwork_artist_id = '{$login_artist_id}'";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($artwork);
    $stmt->fetch();
    $stmt->close();

    /* Payments */
    $query = "SELECT SUM(payment_amount)  FROM payment p
    INNER JOIN requests r ON r.request_id = p.payment_request_id
    INNER JOIN artwork a ON a.artwork_id = r.request_artwork_id
    WHERE a.artwork_artist_id = '{$login_artist_id}'";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($payment);
    $stmt->fetch();
    $stmt->close();
} else {
    /* Customer Analytics */
    $login_user_id = mysqli_real_escape_string($mysqli, $_SESSION['login_user_id']);


    /* Unpaid Purchases */
    $query = "SELECT COUNT(*)  FROM requests 
    WHERE request_user_id = '{$login_user_id}' AND request_status = 'Unpaid'";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($unpaid);
    $stmt->fetch();
    $stmt->close();

    /* Total Purchases */
    $query = "SELECT COUNT(*)  FROM requests 
    WHERE request_user_id = '{$login_user_id}'";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($purchases);
    $stmt->fetch();
    $stmt->close();


    /* Expenditure */
    $query = "SELECT SUM(payment_amount)  FROM payment p
    INNER JOIN requests r ON r.request_id = p.payment_request_id
    WHERE r.request_user_id = '{$login_user_id}'";
    $stmt = $mysqli->prepare($query);
    $stmt->execute();
    $stmt->bind_result($payment);
    $stmt->fetch();
    $stmt->close();
}
