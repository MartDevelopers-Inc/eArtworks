<?php

/**
 * Send WhatsApp template message directly by calling HTTP endpoint.
 *
 * For your convenience, environment variables are already pre-populated with your account data
 * like authentication, base URL and phone number.
 *
 * Send WhatsApp API reference: https://www.infobip.com/docs/api#channels/whatsapp/send-whatsapp-template-message
 *
 * Please find detailed information in the readme file.
 */

require '../../vendor/autoload.php';

use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;

$client = new Client([
    'base_uri' => "https://89y4k1.api.infobip.com/",
    'headers' => [
        'Authorization' => "App 2015dca8a64813666b47902dd6567af9-12ae6a93-ddb3-4af8-b01f-c82bab88a71c",
        'Content-Type' => 'application/json',
        'Accept' => 'application/json',
    ]
]);

$response = $client->request(
    'POST',
    'whatsapp/1/message/template',
    [
        RequestOptions::JSON => [
            'messages' => [
                [
                    'from' => '447860099299',
                    'to' => "254740847563",
                    'content' => [
                        'templateName' => 'registration_success',
                        'templateData' => [
                            'body' => [
                                'placeholders' => ['sender', 'message', 'delivered', 'testing']
                            ],
                            'header' => [
                                'type' => 'IMAGE',
                                'mediaUrl' => 'https://api.infobip.com/ott/1/media/infobipLogo',
                            ],
                            'buttons' => [
                                ['type' => 'QUICK_REPLY', 'parameter' => 'yes-payload'],
                                ['type' => 'QUICK_REPLY', 'parameter' => 'no-payload'],
                                ['type' => 'QUICK_REPLY', 'parameter' => 'later-payload']
                            ]
                        ],
                        'language' => 'en',
                    ],
                ]
            ]
        ],
    ]
);

echo("HTTP code: " . $response->getStatusCode() . PHP_EOL);
echo("Response body: " . $response->getBody()->getContents() . PHP_EOL);
