<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */



    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],


            /// Login with ....
            'facebook' => [
                'client_id' => '1256410504869767',
                'client_secret' => 'a216523038a68d8283ff981b1ab57b41',
                'redirect' => 'http://127.0.0.1:8000/dang-nhap/facebook/callback',
            ],
        
            'google' => [
                'client_id' => '547793212031-kma7unna57an7f6272v973tnk7efu7r5.apps.googleusercontent.com',
                'client_secret' => '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',
                'redirect' => 'http://127.0.0.1:8000/dang-nhap/google/callback',
            ],

];
