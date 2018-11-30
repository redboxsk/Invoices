<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Currency
    |--------------------------------------------------------------------------
    |
    | This value is the default currency that is going to be used in invoices.
    | You can change it on each invoice individually.
    */

    'currency' => 'EUR',

    /*
    |--------------------------------------------------------------------------
    | Default Decimal Precision
    |--------------------------------------------------------------------------
    |
    | This value is the default decimal precision that is going to be used
    | to perform all the calculations.
    */

    'decimals' => 2,

    /*
    |--------------------------------------------------------------------------
    | Default Tax
    |--------------------------------------------------------------------------
    |
    | This value is the default tax that is going to be used in invoices.
    | You can change it on each invoice individually.
    */

    'tax' => 0,

    /*
    |--------------------------------------------------------------------------
    | Default Invoice Logo
    |--------------------------------------------------------------------------
    |
    | This value is the default invoice logo that is going to be used in invoices.
    | You can change it on each invoice individually.
    */

    'logo' => 'http://i.imgur.com/t9G3rFM.png',

    /*
    |--------------------------------------------------------------------------
    | Default Invoice Logo Height
    |--------------------------------------------------------------------------
    |
    | This value is the default invoice logo height that is going to be used in invoices.
    | You can change it on each invoice individually.
    */

    'logo_height' => 60,

    /*
    |--------------------------------------------------------------------------
    | Default Invoice Buissness Details
    |--------------------------------------------------------------------------
    |
    | This value is going to be the default attribute displayed in
    | the customer model.
    */

    'business_details' => [
        'name'    => 'My Company',
        'street'  => 'Street 1',
        'zip'     => '08241',
        'city'    => 'Barcelona',
        'country' => 'Spain',
        'ico'     => '12345678',
        'dic'     => '1234567890',
        'ic_dph'  => 'SK1234567890',
        'note'    => '',
    ],

    /*
    |--------------------------------------------------------------------------
    | Default Invoice Payment Details
    |--------------------------------------------------------------------------
    |
    | This value is going to be the default attribute displayed in
    | the customer model.
    */

    'payment_details' => [
        'iban'  => 'Iban',
        'swift' => 'Swift',
        'ks'    => '0008',
    ],

];
