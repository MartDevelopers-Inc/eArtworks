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
