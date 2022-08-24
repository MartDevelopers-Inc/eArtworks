<?php
/*
 *   Crafted On Wed Aug 24 2022
 *
 * 
 *   www.devlan.co.ke
 *   hello@devlan.co.ke
 *
 *
 *   The Devlan Solutions LTD End User License Agreement
 *   Copyright (c) 2022 Devlan Solutions LTD
 *
 *
 *   1. GRANT OF LICENSE 
 *   Devlan Solutions LTD hereby grants to you (an individual) the revocable, personal, non-exclusive, and nontransferable right to
 *   install and activate this system on two separated computers solely for your personal and non-commercial use,
 *   unless you have purchased a commercial license from Devlan Solutions LTD. Sharing this Software with other individuals, 
 *   or allowing other individuals to view the contents of this Software, is in violation of this license.
 *   You may not make the Software available on a network, or in any way provide the Software to multiple users
 *   unless you have first purchased at least a multi-user license from Devlan Solutions LTD.
 *
 *   2. COPYRIGHT 
 *   The Software is owned by Devlan Solutions LTD and protected by copyright law and international copyright treaties. 
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
 *   DEVLAN SOLUTIONS LTD  DOES NOT WARRANT THAT THE SOFTWARE IS ERROR FREE. 
 *   DEVLAN SOLUTIONS LTD SOFTWARE DISCLAIMS ALL OTHER WARRANTIES WITH RESPECT TO THE SOFTWARE, 
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
 *   7. NO LIABILITY FOR CONSEQUENTIAL DAMAGES IN NO EVENT SHALL DEVLAN SOLUTIONS LTD OR ITS SUPPLIERS BE LIABLE TO YOU FOR ANY
 *   CONSEQUENTIAL, SPECIAL, INCIDENTAL OR INDIRECT DAMAGES OF ANY KIND ARISING OUT OF THE DELIVERY, PERFORMANCE OR 
 *   USE OF THE SOFTWARE, EVEN IF DEVLAN SOLUTIONS LTD HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES
 *   IN NO EVENT WILL DEVLAN SOLUTIONS LTD  LIABILITY FOR ANY CLAIM, WHETHER IN CONTRACT 
 *   TORT OR ANY OTHER THEORY OF LIABILITY, EXCEED THE LICENSE FEE PAID BY YOU, IF ANY.
 *
 */


/* This Helper File Will Process SMS OTP Sending Codes */
include('../vendor/autoload.php');

use infobip\api\client\SendMultipleTextualSmsAdvanced;
use infobip\api\configuration\BasicAuthConfiguration;
use infobip\api\model\Destination;
use infobip\api\model\sms\mt\send\Message;
use infobip\api\model\sms\mt\send\textual\SMSAdvancedTextualRequest;



$username = "mbuvi.steve";
$password = "M@Y@T@NU";

$from = "40014";
$to = $user_phone_number;
$to = preg_replace("/\s+/", "", $to);
$arr = str_split($to);

$to = "254" . substr($to, -9);

$text_message = "Test SMS Success";
// Create configuration object that will tell the client how to authenticate API requests
// Additionally, note the use of http protocol in base path.
// That is for tutorial purposes only and should not be done in production.
// For production you can leave the baseUrl out and rely on the https based default value.
$configuration = new BasicAuthConfiguration($username, $password, 'http://api.infobip.com/');
// Create a client for sending sms texts by passing it the configuration object
$client = new SendMultipleTextualSmsAdvanced($configuration);

// Destination holds recipient's phone number along with id used to uniquely identify the message later on
$destination = new Destination();
$destination->setTo($to);
$destination->setMessageId($_POST['messageIdInput']);

// Message has text and the sender of the sms along with other metadata useful for tracking delivery
$message = new Message();
// One message can be sent to multiple destinations, that is why it takes an array of Destination objects
// In this example we send sms only to a single phone number so an array with only one destination is set
$message->setDestinations([$destination]);
$message->setFrom($from);
$message->setText($text_message);
$message->setNotifyUrl($_POST['notifyUrlInput']);
$message->setNotifyContentType($_POST['notifyContentTypeInput']);
$message->setCallbackData($_POST['callbackDataInput']);

// SMSAdvancedTextualRequest model is sent to the API client
$requestBody = new SMSAdvancedTextualRequest();
// One request can have multiple different text messages, in this example we only send one
$requestBody->setMessages([$message]);

try {
    // Executing request
    $apiResponse = $client->execute($requestBody);
} catch (Exception $apiCallException) {
    // Handling errors in request execution

    $errorMessage = $apiCallException->getMessage();
    $errorResponse = json_decode($apiCallException->getMessage());
    if (json_last_error() == JSON_ERROR_NONE) {
        $errorReason = $errorResponse->requestError->serviceException->text;
    } else {
        $errorReason = $errorMessage;
    }
    echo $errorReason;
}
