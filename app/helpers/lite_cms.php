<?php
/*
 *   Crafted On Sun Sep 18 2022
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

/* Terms And Conditions */
if (isset($_POST['Terms_And_Conditions'])) {
    $system_toc = mysqli_real_escape_string($mysqli, $_POST['system_toc']);

    /* Persist */
    $sql = "UPDATE system_litecms SET system_toc = '{$system_toc}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Terms and conditions updated";
    } else {
        $err = "Failed, try again";
    }
}

/* Faq */
if (isset($_POST['FAQ'])) {
    $system_faq = mysqli_real_escape_string($mysqli, $_POST['system_faq']);

    /* Persist */
    $sql = "UPDATE system_litecms SET system_faq = '{$system_faq}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Frequently asked questions updated";
    } else {
        $erR = "Failed, try again";
    }
}

/* Contact Us */
if (isset($_POST['Contact_Us'])) {
    $system_contact = mysqli_real_escape_string($mysqli,  $_POST['system_contact']);
    $system_email = mysqli_real_escape_string($mysqli, $_POST['system_email']);
    $system_address = mysqli_real_escape_string($mysqli, $_POST['system_address']);
    $system_facebook_url = mysqli_real_escape_string($mysqli, $_POST['system_facebook_url']);
    $system_twittwer_url = mysqli_real_escape_string($mysqli, $_POST['system_twittwer_url']);
    $system_instagram_url = mysqli_real_escape_string($mysqli, $_POST['system_instagram_url']);
    $system_linkedin_url = mysqli_real_escape_string($mysqli, $_POST['system_linkedin_url']);

    /* Persist */
    $sql = "UPDATE system_litecms SET system_contact = '{$system_contact}', system_email = '{$system_email}',  system_address = '{$system_address}',
    system_facebook_url = '{$system_facebook_url}', system_twittwer_url = '{$system_twittwer_url}', system_instagram_url = '{$system_instagram_url}',
    system_linkedin_url = '{$system_linkedin_url}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "Contact details updated";
    } else {
        $err = "Failed, please try again";
    }
}

/* About Us */
if (isset($_POST['About_Us'])) {
    $system_about = mysqli_real_escape_string($mysqli, $_POST['system_about']);

    /* Persist */
    $sql = "UPDATE system_litecms SET system_about = '{$system_about}'";

    if (mysqli_query($mysqli, $sql)) {
        $success = "About details updated";
    } else {
        $err = "Failed, please try again";
    }
}
