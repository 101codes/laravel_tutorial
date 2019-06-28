<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
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

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
        'webhook' => [
            'secret' => env('STRIPE_WEBHOOK_SECRET'),
            'tolerance' => env('STRIPE_WEBHOOK_TOLERANCE', 300),
        ],
    ],
    'github' => [
        'client_id' => '461ad401411af6c87374',
        'client_secret' => '012788aa3d4ca3fc1c72479f9ad18ca982332b07',
        'redirect' => '/auth/github/callback'
    ],
    'linkedin' => [
        'client_id' => '81hvn5j7hsx6a8',
        'client_secret' => 'oBzGx4Btvy0WkdrU',
        'redirect' => '/auth/linkedin/callback'
    ],
    'facebook' => [
        'client_id' => '1666738820036079',
        'client_secret' => 'a4b52b824ae0ed715ffbf07679eb964a',
        'redirect' => '/auth/facebook/callback',
    ],
];
