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
    $mail->Subject = 'Two Factor Authentication Enabled';
    $mail->Body = '
    <table style="table-layout: fixed; vertical-align: top; min-width: 320px; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #d2e7f5; width: 100%;user-select: none;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#d2e7f5">
        <tbody>
            <tr style="vertical-align: top;" valign="top">
                <td style="word-break: break-word; vertical-align: top;" valign="top">
                    <table width="100%" cellspacing="0" cellpadding="0" border="0">
                        <tbody>
                            <tr>
                                <td style="background-color:#d2e7f5" align="center">

                                    <div style="background-color: transparent;">
                                        <div style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: #fff;">
                                            <div style="border-collapse: collapse; display: table; width: 100%; background-color: transparent;">
                                                <table style="background-color:transparent;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center">
                                                                <table style="width:680px" cellspacing="0" cellpadding="0" border="0">
                                                                    <tbody>
                                                                        <tr style="background-color:transparent">
                                                                            <td style="background-color:transparent;width:226px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" width="226" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;">
                                                                                                <div style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 224px; width: 226px;">
                                                                                                    <div style="width: 100% !important;">
                                                                                                        <div style="border: 0px solid transparent; padding: 5px 0px 5px 0px;">
                                                                                                            <table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                                <tbody>
                                                                                                                    <tr style="vertical-align: top;" valign="top">
                                                                                                                        <td style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding: 0px;" valign="top">
                                                                                                                            <table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                                                                                <tbody>
                                                                                                                                    <tr style="vertical-align: top;" valign="top">
                                                                                                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" height="0">&nbsp;</td>
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
                                                                            
                                                                            <td style="background-color:transparent;width:226px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" width="226" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;">
                                                                                                <div style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 224px; width: 226px;">
                                                                                                    <div style="width: 100% !important;">
                                                                                                        <div style="border: 0px solid transparent; padding: 5px 0px 5px 0px;">
                                                                                                            <table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                                <tbody>
                                                                                                                    <tr style="vertical-align: top;" valign="top">
                                                                                                                        <td style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding: 0px;" valign="top">
                                                                                                                            <table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                                                                                <tbody>
                                                                                                                                    <tr style="vertical-align: top;" valign="top">
                                                                                                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" height="0">&nbsp;</td>
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
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>

                                    <div style="background-color: transparent;">
                                        <div style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: white;">
                                            <div style="border-collapse: collapse; display: table; width: 100%; background-color: transparent;">
                                                <table style="background-color:transparent;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center">
                                                                <table style="width:680px" cellspacing="0" cellpadding="0" border="0">
                                                                    <tbody>
                                                                        <tr style="background-color:transparent">
                                                                            <td style="background-color:transparent;width:680px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" width="680" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;">
                                                                                                <div style="min-width: 320px; max-width: 680px; display: table-cell; vertical-align: top; width: 680px;">
                                                                                                    <div style="width: 100% !important;">
                                                                                                        <div style="border: 0px solid transparent; padding: 5px 0px 5px 0px;">
                                                                                                            <div style="padding-right: 0px; padding-left: 0px;" align="center">
                                                                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                                    <tbody>
                                                                                                                        <tr style="line-height:0px">
                                                                                                                            <td style="padding-right: 0px;padding-left: 0px;" align="center"><img style="text-decoration: none; -ms-interpolation-mode: bicubic; height: auto; border: 0; width: 40%; max-width: 612px; display: block;" title="bear looking at password" alt="bear looking at password" src="https://cdn-icons-png.flaticon.com/512/3176/3176384.png" width="612" border="0" align="middle"> </td>
                                                                                                                        </tr>
                                                                                                                    </tbody>
                                                                                                                </table>
                                                                                                            </div>
                                                                                                            <table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                                <tbody>
                                                                                                                    <tr style="vertical-align: top;" valign="top">
                                                                                                                        <td style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding: 0px;" valign="top">
                                                                                                                            <table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 5px; width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                                                                                <tbody>
                                                                                                                                    <tr style="vertical-align: top;" valign="top">
                                                                                                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" height="5">&nbsp;</td>
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
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="background-color: transparent;">
                                        <div style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: #fff;">
                                            <div style="border-collapse: collapse; display: table; width: 100%; background-color: transparent;">
                                                <table style="background-color:transparent;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center">
                                                                <table style="width:680px" cellspacing="0" cellpadding="0" border="0">
                                                                    <tbody>
                                                                        <tr style="background-color:transparent">
                                                                            <td style="background-color:transparent;width:113px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" width="113" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;">
                                                                                                <div style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 112px; width: 113px;">
                                                                                                    <div style="width: 100% !important;">
                                                                                                        <div style="border: 0px solid transparent; padding: 5px 0px 5px 0px;">
                                                                                                            <table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                                <tbody>
                                                                                                                    <tr style="vertical-align: top;" valign="top">
                                                                                                                        <td style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding: 0px;" valign="top">
                                                                                                                            <table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                                                                                <tbody>
                                                                                                                                    <tr style="vertical-align: top;" valign="top">
                                                                                                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" height="0">&nbsp;</td>
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
                                                                            <td style="background-color:transparent;width:453px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" width="453" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;">
                                                                                                <div style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 448px; width: 453px;">
                                                                                                    <div style="width: 100% !important;">
                                                                                                        <div style="border: 0px solid transparent; padding: 5px 0px 5px 0px;">
                                                                                                            <table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%" cellspacing="0" cellpadding="0">
                                                                                                                <tbody>
                                                                                                                    <tr style="vertical-align: top;" valign="top">
                                                                                                                        <td style="word-break: break-word; vertical-align: top; text-align: center; width: 100%; padding: 0px;" width="100%" valign="top" align="center">
                                                                                                                            <h1 style="color: #03191e; direction: ltr; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 40px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;"><strong>Two Factor </strong></h1>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                            <table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt;" width="100%" cellspacing="0" cellpadding="0">
                                                                                                                <tbody>
                                                                                                                    <tr style="vertical-align: top;" valign="top">
                                                                                                                        <td style="word-break: break-word; vertical-align: top; text-align: center; width: 100%; padding: 0px 0px 10px 0px;" width="100%" valign="top" align="center">
                                                                                                                            <h1 style="color: #03191e; direction: ltr; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; font-size: 40px; font-weight: normal; letter-spacing: normal; line-height: 120%; text-align: center; margin-top: 0; margin-bottom: 0;"><strong>Authentication Enabled</strong></h1>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                            <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                                <tbody>
                                                                                                                    <tr>
                                                                                                                        <td style="padding-right: 10px; padding-left: 20px; padding-top: 10px; padding-bottom: 10px; font-family: Arial, sans-serif">
                                                                                                                            <div style="color: #848484; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; line-height: 1.8; padding: 10px 10px 10px 20px;">
                                                                                                                                <div style="line-height: 1.8; font-size: 12px; color: #848484; font-family: Arial, Helvetica Neue, Helvetica, sans-serif; mso-line-height-alt: 22px;">
                                                                                                                                    <p style="margin: 0; font-size: 14px; line-height: 1.8; word-break: break-word; text-align: center; mso-line-height-alt: 25px; margin-top: 0; margin-bottom: 0;">
                                                                                                                                        <span style="font-size: 14px;">
                                                                                                                                            Hello, You have turned on two-factor authentication. A One Time Password code will be emailed to you every time you log in. 
                                                                                                                                            This code will be required for each login.
                                                                                                                                        </span>
                                                                                                                                    </p>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                        </td>
                                                                                                                    </tr>
                                                                                                                </tbody>
                                                                                                            </table>
                                                                                                            <table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                                <tbody>
                                                                                                                    <tr style="vertical-align: top;" valign="top">
                                                                                                                        <td style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding: 5px;" valign="top">
                                                                                                                            <table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 0px; width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                                                                                <tbody>
                                                                                                                                    <tr style="vertical-align: top;" valign="top">
                                                                                                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" height="0">&nbsp;</td>
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
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div style="background-color: transparent;">
                                        <div style="min-width: 320px; max-width: 680px; overflow-wrap: break-word; word-wrap: break-word; word-break: break-word; margin: 0 auto; background-color: transparent;">
                                            <div style="border-collapse: collapse; display: table; width: 100%; background-color: transparent;">
                                                <table style="background-color:transparent;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                    <tbody>
                                                        <tr>
                                                            <td align="center">
                                                                <table style="width:680px" cellspacing="0" cellpadding="0" border="0">
                                                                    <tbody>
                                                                        <tr style="background-color:transparent">
                                                                            <td style="background-color:transparent;width:113px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" width="113" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;">
                                                                                                <div style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 112px; width: 113px;">
                                                                                                    <div style="width: 100% !important;">
                                                                                                        <div style="border: 0px solid transparent; padding: 5px 0px 5px 0px;">
                                                                                                            <table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                                <tbody>
                                                                                                                    <tr style="vertical-align: top;" valign="top">
                                                                                                                        <td style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding: 10px;" valign="top">
                                                                                                                            <table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 5px; width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                                                                                <tbody>
                                                                                                                                    <tr style="vertical-align: top;" valign="top">
                                                                                                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" height="5">&nbsp;</td>
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
                                                                            <td style="background-color:transparent;width:453px; border-top: 0px solid transparent; border-left: 0px solid transparent; border-bottom: 0px solid transparent; border-right: 0px solid transparent;" width="453" valign="top" align="center">
                                                                                <table width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                    <tbody>
                                                                                        <tr>
                                                                                            <td style="padding-right: 0px; padding-left: 0px; padding-top:5px; padding-bottom:5px;">
                                                                                                <div style="display: table-cell; vertical-align: top; max-width: 320px; min-width: 448px; width: 453px;">
                                                                                                    <div style="width: 100% !important;">
                                                                                                        <div style="border: 0px solid transparent; padding: 5px 0px 5px 0px;">
                                                                                                            <table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                                                                <tbody>
                                                                                                                    <tr style="vertical-align: top;" valign="top">
                                                                                                                        <td style="word-break: break-word; vertical-align: top; min-width: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; padding: 10px;" valign="top">
                                                                                                                            <table style="table-layout: fixed; vertical-align: top; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; border-top: 0px solid transparent; height: 5px; width: 100%;" width="100%" cellspacing="0" cellpadding="0" border="0" align="center">
                                                                                                                                <tbody>
                                                                                                                                    <tr style="vertical-align: top;" valign="top">
                                                                                                                                        <td style="word-break: break-word; vertical-align: top; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%;" valign="top" height="5">&nbsp;</td>
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
