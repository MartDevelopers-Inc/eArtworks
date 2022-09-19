<?php
/*
 *   Crafted On Mon Sep 19 2022
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
session_start();
require_once('../app/settings/config.php');
require_once('../app/settings/codeGen.php');
require_once('../app/settings/checklogin.php');
checklogin();

/* Global Variables */
require_once('../vendor/autoload.php');

use Dompdf\Dompdf;

$dompdf = new Dompdf();

$order_code = mysqli_real_escape_string($mysqli, $_GET['view']);
$order_sql = mysqli_query(
    $mysqli,
    "SELECT * FROM orders o  
    INNER JOIN products p ON p.product_id = o.order_product_id
    INNER JOIN users u ON u.user_id = o.order_user_id
    INNER JOIN categories c ON c.category_id = p.product_category_id
    WHERE u.user_delete_status = '0' 
    AND c.category_delete_status = '0'
    AND p.product_delete_status = '0'
    AND o.order_delete_status = '0' 
    AND o.order_code = '{$order_code}'
    GROUP BY o.order_code"
);
if (mysqli_num_rows($order_sql) > 0) {
    while ($order = mysqli_fetch_array($order_sql)) {
        /* Dump To PDF */
        $html = '
        <style type="text/css">
            table {
                font-size: 12px;
                padding: 4px;
            }

            

            th {
                text-align: left;
                padding: 4pt;
            }

            td {
                padding: 5pt;
            }

            #b_border {
                border-bottom: dashed thin;
            }

            legend {
                color: #0b77b7;
                font-size: 1.2em;
            }

            #error_msg {
                text-align: left;
                font-size: 11px;
                color: red;
            }

            .header {
                margin-bottom: 20px;
                width: 100%;
                text-align: left;
                position: absolute;
                top: 0px;
            }

            .footer {
                width: 100%;
                text-align: center;
                position: fixed;
                bottom: 5px;
            }

            #no_border_table {
                border: none;
            }

            #bold_row {
                font-weight: bold;
            }

            #amount {
                text-align: right;
                font-weight: bold;
            }

            .pagenum:before {
                content: counter(page);
            }

            /* Thick red border */
            hr.red {
                border: 1px solid red;
            }
            .list_header{
                font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
            }
        </style>
        <div class="list_header" align="center">
            <h3>
                eArtworks <br> Delivery Note For Order # ' . $order_code . '
            </h3>
        </div>
        <div class="list_header" align="left">
            <hr style="width:100%" , color=black>
            <h5>
                Consignee: ' . $order['user_first_name'] . ' ' . $order['user_last_name'] . ' <br>
                Order Date: ' . date('M d Y', strtotime($order['order_date'])) . ' <br>
                Delivery Address: ' . $order['user_default_address'] . '
            </h5>
        </div>
        <table border="1" cellspacing="0" width="98%" style="font-size:9pt">
            <thead>
                <tr>
                    <th style="width:10%">No</th>
                    <th style="width:100%">SKU</th>
                    <th style="width:100%">Product Name</th>
                    <th style="width:30%">Quantity</th>
                </tr>
            </thead>
        <tbody>
        ';
        $ret = "SELECT * FROM orders o  
            INNER JOIN products p ON p.product_id = o.order_product_id
            INNER JOIN users u ON u.user_id = o.order_user_id
            INNER JOIN categories c ON c.category_id = p.product_category_id
            WHERE u.user_delete_status = '0' 
            AND c.category_delete_status = '0'
            AND p.product_delete_status = '0'
            AND o.order_delete_status = '0'
            AND o.order_code = '{$order_code}'";
        $stmt = $mysqli->prepare($ret);
        $stmt->execute(); //ok
        $res = $stmt->get_result();
        $cnt = 1;
        while ($items = $res->fetch_object()) {
            $html .=
                '
                <tr>
                    <td>' . $cnt . '</td>
                    <td>' . $items->product_sku_code . '</td>
                    <td>' . $items->product_name . '</td>
                    <td>' . $items->order_qty . '</td>
                </tr>
            ';
            $cnt = $cnt + 1;
        }
        $html .= '
            </tbody>
        </table>
        <br>
        <div align="left">
            <p>
                This is not a purchase invoice. It is the seller`s obligation to issue and deliver an invoice to 
                the client. It is the duty of the seller to establish if the price of the things sold is subject to VAT,
                custom charges, and other taxes. It is also the seller`s duty to pay any applicable VAT, custom duties,
                fees, or other taxes.
            </p>
        </div>
    ';
        $dompdf->load_html($html);
        $dompdf->set_paper('A4');
        $dompdf->set_option('isHtml5ParserEnabled', true);
        $dompdf->render();
        $dompdf->stream('Order Number' . $order_code . ' Delivery Note', array("Attachment" => 1));
        $options = $dompdf->getOptions();
        $options->setDefaultFont('');
        $dompdf->setOptions($options);
    }
}
