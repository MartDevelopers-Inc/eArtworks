<?php
/*
 *   Crafted On Mon Aug 22 2022
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

/* Load Composer PHPMAILER */
/* require_once('../vendor/PHPMailer/src/SMTP.php');
require_once('../vendor/PHPMailer/src/PHPMailer.php');
require_once('../vendor/PHPMailer/src/Exception.php'); */

include('../vendor/autoload.php');

/* Confirm Links */
if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
    $uri = 'https://';
} else {
    $uri = 'http://';
}
$uri .= $_SERVER['HTTP_HOST'];
$reset_url = $uri . '/eArtworks/ui/confirm_password?token=' . $user_password_reset_token;


/* Init PHP Mailer */
$ret = "SELECT * FROM mailer_settings";
$stmt = $mysqli->prepare($ret);
$stmt->execute(); //ok
$res = $stmt->get_result();
while ($sys = $res->fetch_object()) {
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    $mail->setFrom($sys->mail_from_email);
    $mail->addAddress($user_email);
    $mail->FromName = $sys->mail_from_name;
    $mail->isHTML(true);
    $mail->IsSMTP();
    $mail->SMTPSecure = 'ssl';
    $mail->Host = $sys->mail_host;
    $mail->SMTPAuth = true;
    $mail->Port = $sys->mail_port;
    $mail->Username = $sys->mail_username;
    $mail->Password = $sys->mail_password;
    $mail->Subject = 'Password Reset';
    $mail->Body = '
    <table
        style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #ffffff; width: 100%; user-select: none;"
        width="100%" cellspacing="0" cellpadding="0" bgcolor="#FFFFFF">
        <tbody>
            <tr style="vertical-align: top;" valign="top">
                <td style="word-break: break-word; vertical-align: top;" valign="top">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tbody>
                            <tr>
                                <td align="center">
                                    <div style="background-color: #ff4f5a;">
                                        <div
                                            style="min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: transparent;">
                                            <div
                                                style="border-collapse: collapse; display: table; width: 100%; background-color: transparent;">
                                                <table style="background-color: #132437;" width="100%" cellspacing="0"
                                                    cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center">
                                                                <table style="width: 600px;" cellspacing="0" cellpadding="0"
                                                                    border="0">
                                                                    <tbody>
                                                                        <tr style="background-color: transparent;">
                                                                            <td style="background-color: transparent; width: 600px; border: 0px solid transparent;"
                                                                                width="600" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0"
                                                                                    cellpadding="0" border="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="padding: 0px;">
                                                                                                <div
                                                                                                    style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
                                                                                                    <div
                                                                                                        style="width: 100% !important;">
                                                                                                        
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="background-color: #ff4f5a;">
                                        <div
                                            style="min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: #ffffff;">
                                            <div
                                                style="border-collapse: collapse; display: table; width: 100%; background-color: #ffffff;">
                                                <table style="background-color: #132437;" width="100%" cellspacing="0"
                                                    cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center">
                                                                <table style="width: 600px;" cellspacing="0" cellpadding="0"
                                                                    border="0">
                                                                    <tbody>
                                                                        <tr style="background-color: #ffffff;">
                                                                            <td style="background-color: #ffffff; width: 600px; border: 0px solid transparent;"
                                                                                width="600" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0"
                                                                                    cellpadding="0" border="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td
                                                                                                style="padding: 50px 10px 10px;">
                                                                                                <div
                                                                                                    style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
                                                                                                    <div
                                                                                                        style="width: 100% !important;">
                                                                                                        <div
                                                                                                            style="border: 0px solid transparent; padding: 0px 0px 10px 0px;">
                                                                                                            <div style="padding-right: 20px; padding-left: 20px;"
                                                                                                                align="center">
                                                                                                                <table
                                                                                                                    width="100%"
                                                                                                                    cellspacing="0"
                                                                                                                    cellpadding="0"
                                                                                                                    border="0">
                                                                                                                    <tbody>
                                                                                                                        <tr
                                                                                                                            style="line-height: 0px;">
                                                                                                                            <td style="padding-right: 20px; padding-left: 20px;"
                                                                                                                                align="center">
                                                                                                                                <div
                                                                                                                                    style="font-size: 1px; line-height: 5px;">
                                                                                                                                    &nbsp;
                                                                                                                                </div>
                                                                                                                                <img style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 50%; max-width: 541px; display: block;"
                                                                                                                                    src="https://cdn-icons-png.flaticon.com/512/6212/6212672.png"
                                                                                                                                    alt=""
                                                                                                                                    width="541"
                                                                                                                                    border="0"
                                                                                                                                    align="middle">
                                                                                                                                <div
                                                                                                                                    style="font-size: 1px; line-height: 5px;">
                                                                                                                                    &nbsp;
                                                                                                                                </div>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        style="background-position: top left; background-repeat: no-repeat; background-color: #333;">
                                        <div
                                            style="min-width: 320px; max-width: 600px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: #ffffff;">
                                            <div
                                                style="border-collapse: collapse; display: table; width: 100%; background-color: #ffffff;">
                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center">
                                                                <table style="width: 600px;" cellspacing="0" cellpadding="0"
                                                                    border="0">
                                                                    <tbody>
                                                                        <tr style="background-color: #ffffff;">
                                                                            <td style="background-color: #ffffff; width: 600px; border: 0px solid transparent;"
                                                                                width="600" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0"
                                                                                    cellpadding="0" border="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="padding: 0px;">
                                                                                                <div
                                                                                                    style="min-width: 320px; max-width: 600px; display: table-cell; vertical-align: top; width: 600px;">
                                                                                                    <div
                                                                                                        style="width: 100% !important;">
                                                                                                        <div
                                                                                                            style="border: 0px solid transparent; padding: 0px;">
                                                                                                            <table
                                                                                                                style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                                                                width="100%"
                                                                                                                cellspacing="0"
                                                                                                                cellpadding="0">
                                                                                                                <tbody>
                                                                                                                    <tr style="vertical-align: top;"
                                                                                                                        valign="top">
                                                                                                                        <td style="word-break: break-word; vertical-align: top; text-align: center; width: 100%; padding: 25px 0px 5px 0px;"
                                                                                                                            width="100%"
                                                                                                                            valign="top"
                                                                                                                            align="center">
                                                                                                                            <h1
                                                                                                                                style="color: #555555; direction: ltr; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 30px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;padding: 0 50px;">
                                                                                                                                <strong>
                                                                                                                                    Forgot your password?                                                                                                
                                                                                                                                </strong>
                                                                                                                            </h1>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                            <table
                                                                                                                width="100%"
                                                                                                                cellspacing="0"
                                                                                                                cellpadding="0"
                                                                                                                border="0">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td
                                                                                                                            style="font-family: Arial, sans-serif;">
                                                                                                                            <div
                                                                                                                                style="color: #737487; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; line-height: 1.8; padding: 20px 15px 20px 15px;">
                                                                                                                                <div
                                                                                                                                    style="font-size: 14px; line-height: 1.8; color: #737487; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 25px;">
                                                                                                                                    <p
                                                                                                                                        style="margin: 0; font-size: 18px; line-height: 1.8; word-break: break-word; text-align: center; mso-line-height-alt: 32px; margin-top: 0; margin-bottom: 0;">
                                                                                                                                        <span
                                                                                                                                            style="font-size: 18px;">Please
                                                                                                                                            We received a request to reset your password. Do not worry,
                                                                                                                                        </span>
                                                                                                                                    </p>
                                                                                                                                    <p
                                                                                                                                        style="margin: 0; font-size: 18px; line-height: 1.8; word-break: break-word; text-align: center; mso-line-height-alt: 32px; margin-top: 0; margin-bottom: 0;">
                                                                                                                                        <span style="font-size: 18px;">
                                                                                                                                            We are here to help you.
                                                                                                                                        </span>
                                                                                                                                    </p>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                            <div
                                                                                                                align="center">
                                                                                                                <table
                                                                                                                    style="border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;"
                                                                                                                    width="100%"
                                                                                                                    cellspacing="0"
                                                                                                                    cellpadding="0"
                                                                                                                    border="0">
                                                                                                                    <tbody>
                                                                                                                        <tr>
                                                                                                                            <td style="padding: 20px 15px 40px 15px;"
                                                                                                                                align="center">
                                                                                                                                <center
                                                                                                                                    style="font-family: Arial, sans-serif; font-size: 16px;">
                                                                                                                                    <div
                                                                                                                                        style="text-decoration: none; display: inline-block; color: #ffffff; background-color: #ff4f5a; border-radius: 4px; -webkit-border-radius: 4px; -moz-border-radius: 4px; width: auto; padding-top: 10px; padding-bottom: 10px; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; text-align: center; mso-border-alt: none; word-break: keep-all; cursor: pointer;">
                                                                                                                                        <a href="' . $reset_url . '" style="color: #ffffff;">
                                                                                                                                        <span
                                                                                                                                            style="padding-left: 60px; padding-right: 60px; font-size: 16px; display: inline-block; letter-spacing: undefined;"><span
                                                                                                                                                style="font-weight: 600; font-size: 16px; line-height: 2; word-break: break-word; mso-line-height-alt: 32px;">
                                                                                                                                                Reset Password
                                                                                                                                            </span>
                                                                                                                                        </span>
                                                                                                                                        </a>
                                                                                                                                    </div>
                                                                                                                                </center>
                                                                                                                            </td>
                                                                                                                        </tr>
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                </div>
                                                                                            </td>
                                                                                        </tr>
                                                                                    </tbody>
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    ';
}
