<?php
/*
 *   Crafted On Sat Aug 06 2022
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



/* 📌 Login   */
if (isset($_POST['login'])) {
    $login_username = mysqli_real_escape_string($mysqli, $_POST['login_username']);
    $login_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['login_password'])));

    /* Persist*/
    $stmt = $mysqli->prepare("SELECT login_id, login_username, login_rank, 
    login_user_id, login_admin_id, login_artist_id , login_password FROM login
    WHERE login_username = '{$login_username}' AND login_password = '{$login_password}'");
    $stmt->execute();
    $stmt->bind_result(
        $login_id,
        $login_username,
        $login_rank,
        $login_user_id,
        $login_admin_id,
        $login_artist_id,
        $login_password
    );
    $rs = $stmt->fetch();
    /* Persist Sessions */
    $_SESSION['login_rank'] = $login_rank;
    $_SESSION['login_admin_id']  = $login_admin_id;
    $_SESSION['login_artist_id']  = $login_artist_id;
    $_SESSION['login_user_id']  = $login_user_id;
    /* Determiner Where To Redirect Based On Access Leveles */
    if ($rs && $login_rank == 'Administrator') {
        $_SESSION['success'] = "Logged In With Administrator Access Level";
        header('Location: dashboard');
        exit;
    } else if ($rs && $login_rank == 'Artist') {
        $_SESSION['success'] = 'Logged in as artist';
        header('Location: artist_dashboard');
        exit;
    } else if ($rs && $login_rank == 'User') {
        $_SESSION['success'] = 'Logged in as customer';
        header('Location: user_dashboard');
        exit;
    } else {
        $err = "Failed!, Incorrect Login Credentials";
    }
}

/* 📌 Register  Artist Account */
if (isset($_POST['Sign_Up_As_Artist'])) {
    $artist_name = mysqli_real_escape_string($mysqli, $_POST['artist_name']);
    $artist_email = mysqli_real_escape_string($mysqli, $_POST['artist_email']);
    $artist_desc = mysqli_real_escape_string($mysqli, $_POST['artist_desc']);
    $artist_location = mysqli_real_escape_string($mysqli, $_POST['artist_location']);
    $artist_image = mysqli_real_escape_string($mysqli, $_FILES['artist_image']['name']);
    /* Process Artist Image */
    $image = explode(".", $artist_image);
    /* Give New File Names */
    $encoded_artist_image = $a . $b . '.' . end($image);
    /* Move Uploaded Images */
    move_uploaded_file($_FILES["artist_image"]["tmp_name"], "../assets/upload/artists/" . $encoded_artist_image);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));
    $login_id = mysqli_real_escape_string($mysqli, $sys_gen_id);
    $login_rank = mysqli_real_escape_string($mysqli, 'Artist');
    $login_username = mysqli_real_escape_string($mysqli, $artist_email);

    /* Confirm Passwords */
    if ($new_password != $confirm_password) {
        $err = "Passwords does not match";
    } else {
        /* Avoid Duplications */
        $sql = "SELECT * FROM  artist  WHERE artist_email ='{$artist_email}' ";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if (
                $artist_email == $row['artist_email']
            ) {
                $err = 'Artist email already exists';
            }
        } else {
            /* Persist */
            $artist_sql = "INSERT INTO artist(artist_name, artist_email, artist_image, artist_desc, artist_location)
            VALUES('{$artist_name}', '{$artist_email}', '{$encoded_artist_image}', '{$artist_desc}', '{$artist_location}')";
            /* Get Artist Login Id */
            if (mysqli_query($mysqli, $artist_sql)) {
                $login_artist_id = $mysqli->insert_id;

                $auth_sql = "INSERT INTO login (login_id, login_username, login_password, login_rank, login_artist_id)
                VALUES('{$login_id}', '{$login_username}', '{$confirm_password}', '{$login_rank}', '{$login_artist_id}')";

                if (mysqli_query($mysqli, $auth_sql)) {
                    $_SESSION['success'] = 'Artist account created, proceed to login';
                    header('Location: ../');
                    exit;
                }
            } else {
                $err = "We are unable to create your account";
            }
        }
    }
}



/* 📌 Register  User Account */
if (isset($_POST['Sign_Up_As_Customer'])) {
    $user_name = mysqli_real_escape_string($mysqli, $_POST['user_name']);
    $user_phone_number = mysqli_real_escape_string($mysqli, $_POST['user_phone_number']);
    $user_email = mysqli_real_escape_string($mysqli, $_POST['user_email']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));
    $login_id = mysqli_real_escape_string($mysqli, $sys_gen_id);
    $login_rank = mysqli_real_escape_string($mysqli, 'User');
    $login_username = mysqli_real_escape_string($mysqli, $user_email);

    if ($new_password != $confirm_password) {
        $err = "Passwords does not match";
    } else {
        /* Avoid Duplications */
        $sql = "SELECT * FROM  users  WHERE user_email ='{$user_email}' || user_phone_number = '{$user_phone_number}' ";
        $res = mysqli_query($mysqli, $sql);
        if (mysqli_num_rows($res) > 0) {
            $row = mysqli_fetch_assoc($res);
            if (
                $user_phone_number == $row['user_phone_number'] ||
                $user_email == $row['user_email']
            ) {
                $err = 'Customer email or phone number already exists';
            }
        } else {
            /* Persist */
            $user_sql = "INSERT INTO users (user_name, user_email, user_phone_number)
            VALUES('{$user_name}', '{$user_email}', '{$user_phone_number}')";

            /* Get User Login Id */
            if (mysqli_query($mysqli, $user_sql)) {
                $login_user_id = $mysqli->insert_id;

                $auth_sql = "INSERT INTO login (login_id, login_username, login_password, login_rank, login_user_id)
                VALUES('{$login_id}', '{$login_username}', '{$confirm_password}', '{$login_rank}', '{$login_user_id}')";

                if (mysqli_query($mysqli, $auth_sql)) {
                    $_SESSION['success'] = 'Customer account created, proceed to login';
                    header('Location: ../');
                    exit;
                }
            } else {
                $err = "We are unable to create your account";
            }
        }
    }
}


/* 📌 Reset Password  */
if (isset($_POST['reset_password_step_1'])) {
    $login_username  = mysqli_real_escape_string($mysqli, $_POST['login_username']);
    /* Check If This Account Exists */
    $sql = "SELECT * FROM  login WHERE login_username = '{$login_username}'";
    $res = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($res) > 0) {
        /* Redirect User To Confirm Password */
        $_SESSION['success'] = 'Proceed To Confirm Password';
        $_SESSION['login_username'] = $login_username;
        header('Location: confirm_password');
        exit;
    } else {
        $err = "Email Address  Does Not Exist";
    }
}

/* 📌 Confirm Password  */
if (isset($_POST['reset_password_step_2'])) {
    $login_username = mysqli_real_escape_string($mysqli, $_SESSION['login_username']);
    $new_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['new_password'])));
    $confirm_password = sha1(md5(mysqli_real_escape_string($mysqli, $_POST['confirm_password'])));

    /* Check If Passwords Match */
    if ($new_password != $confirm_password) {
        $err = "Passwords Does Not Match";
    } else {
        /* Persist */
        $sql = "UPDATE login SET login_password = '{$confirm_password}' WHERE login_username = '{$login_username}'";
        $prepare = mysqli_query($mysqli, $sql);
        if ($prepare) {
            /* Redirect User To Confirm Password */
            $_SESSION['success'] = 'Password Reset Successfully, Proceed To Login';
            header('Location: login');
            exit;
        } else {
            $err = "Failed!, Please Try Again";
        }
    }
}
