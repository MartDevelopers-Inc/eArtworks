<?php
/*
 *   Crafted On Mon Sep 12 2022
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
/* Add Payment */
if (isset($_POST['Add_Payment'])) {
    /* Add Extra Payment Methods Handlers Here */
    $payment_method_name = mysqli_real_escape_string($mysqli, $_POST['payment_method_name']);
    $payment_order_code = mysqli_real_escape_string($mysqli, $_POST['payment_order_code']);
    $payment_means_id = mysqli_real_escape_string($mysqli, $_POST['payment_means_id']);
    $payment_amount = mysqli_real_escape_string($mysqli, $_POST['payment_amount']);
    $payment_ref_code = mysqli_real_escape_string($mysqli, $_POST['payment_ref_code']);
    $order_payment_status = mysqli_real_escape_string($mysqli, 'Paid');
    $user_email = mysqli_real_escape_string($mysqli, $_SESSION['user_email']);
    $user_contacts = mysqli_real_escape_string($mysqli, $_POST['user_contacts']);
    $user_name = mysqli_real_escape_string($mysqli, $_POST['user_name']);
    /* Handle Cash On Delivery Payment Method */
    if ($payment_method_name == 'Cash') {

        /* Persist */
        $sql = "INSERT INTO payments (payment_order_code, payment_means_id, payment_amount, payment_ref_code) 
        VALUES('{$payment_order_code}', '{$payment_means_id}', '{$payment_amount}', '$payment_ref_code')";

        $order_status = "UPDATE orders SET order_payment_status = '{$order_payment_status}' WHERE order_code = '{$payment_order_code}'";

        if (mysqli_query($mysqli, $sql) && mysqli_query($mysqli, $order_status)) {
            $success = "Payment reference $payment_ref_code confirmed";
        } else {
            $err = "Failed, please try again";
        }
    } else if ($payment_method_name == 'Mpesa') {
        /* Redirect To Mpesa Payment Page With Given Details */
        header('Location: landing_pay_order?view=' . $payment_order_code . '&amount=' . $payment_amount);
        exit;
    } else if ($payment_method_name == 'Debit / Credit Card') {
        /* Process Flutterwave Payment API */
        $request = [
            'tx_ref' => time(), /* Just Timestamp Every Transaction */
            'amount' => $payment_amount,
            'currency' => 'KES',
            'payment_options' => 'card',
            /* Update This URL To Match Your Needs */
            'redirect_url' => 'http://127.0.0.1/eArtworks/ui/payment_response?order=' . $payment_order_code . '&means=' . $payment_means_id,
            'customer' => [
                'email' => $user_email,
                'name' => $user_name,
            ],
            'meta' => [
                'price' => $payment_amount
            ],
            'customizations' => [
                'title' => 'Order ' . ' ' . $payment_order_code . ' Payment',
                'description' => $user_name . 'Order Payment'
            ]
        ];

        /* Call Flutterwave Endpoint */
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.flutterwave.com/v3/payments',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => json_encode($request),
            CURLOPT_HTTPHEADER => array(
                'Authorization: Bearer ' . $flutterwave_keys, /* To Do : Never hard code this bearer */
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $res = json_decode($response);
        if ($res->status == 'success') {
            $link = $res->data->link;
            header('Location: ' . $link);
        } else {
            $err =  'We can not process your payment';
        }
    } else {
        $err = "Payment means is not supported yet";
    }
}

/* Confirm Payment Done Via Mpesa */
if (isset($_POST['Confirm_Mpesa_Payment'])) {
    header("Content-Type:application/json");

    /*Call function with these configurations*/
    $env = "sandbox";
    $shortcode = '600988';
    $key = ""; //Put your key here
    $secret = "";  //Put your secret here
    $initiatorName = "testapi";
    $initiatorPassword = "Safaricom978!";
    $results_url = ""; //Endpoint to receive results Body
    $timeout_url = "https://mydomain.com/TransactionStatus/queue/"; //Endpoint to to go to on timeout
    /*End  configurations*/

    /*Ensure transaction code is entered*/
    if (!isset($_POST["confirm_payment_code"])) {
        $err =  "Please enter code";
        exit();
    }
    /*End transaction code validation*/

    $transactionID =  strtoupper(mysqli_real_escape_string($mysqli, $_POST['confirm_payment_code']));

    //$transactionID = "OEI2AK4Q16";
    $command = "TransactionStatusQuery";
    $remarks = "Transaction Status Query";
    $occasion = "Transaction Status Query";
    $callback = null;


    $access_token = ($env == "live") ? "https://api.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials" : "https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials";
    $credentials = base64_encode($key . ':' . $secret);

    $ch = curl_init($access_token);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Authorization: Basic " . $credentials]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);

    $result = json_decode($response);

    //echo $result->{'access_token'};

    $token = isset($result->{'access_token'}) ? $result->{'access_token'} : "N/A";

    $publicKey = file_get_contents(__DIR__ . "/mpesa_public_cert.cer");
    $isvalid = openssl_public_encrypt($initiatorPassword, $encrypted, $publicKey, OPENSSL_PKCS1_PADDING);
    $password = base64_encode($encrypted);

    //echo $token;

    $curl_post_data = array(
        "Initiator" => $initiatorName,
        "SecurityCredential" => $password,
        "CommandID" => $command,
        "TransactionID" => $transactionID,
        "PartyA" => $shortcode,
        "IdentifierType" => $type,
        "ResultURL" => $results_url,
        "QueueTimeOutURL" => $timeout_url,
        "Remarks" => $remarks,
        "Occasion" => $occasion,
    );

    $data_string = json_encode($curl_post_data);

    //echo $data_string;

    $endpoint = ($env == "live") ? "https://api.safaricom.co.ke/mpesa/transactionstatus/v1/query" : "https://sandbox.safaricom.co.ke/mpesa/transactionstatus/v1/query";

    $ch2 = curl_init($endpoint);
    curl_setopt($ch2, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $token,
        'Content-Type: application/json'
    ]);
    curl_setopt($ch2, CURLOPT_POST, 1);
    curl_setopt($ch2, CURLOPT_POSTFIELDS, $data_string);
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
    $response     = curl_exec($ch2);
    curl_close($ch2);

    //echo "Authorization: ". $response;

    $result = json_decode($response);

    $verified = $result->{'ResponseCode'};
    if ($verified === "0") {
        $success =  "Transaction verified as TRUE";
    } else {
        $er =  "Transaction doesnt exist";
    }
}
