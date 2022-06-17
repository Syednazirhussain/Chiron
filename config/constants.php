<?php
return [
    'rates' => [
        'sales_tax' => env('sales_tax',13),
        'extra_charge' => env('extra_charge',0.30),
        'stripe_fee' => env('stripe_fee',2.7),
    ],
    'STORAGE' => 'storage/',
    'TRAINER_IMAGES'    => 'uploads/trainer/images',
    'TRAINER_DOCS'      => 'uploads/trainer/docs',
    'TRAINER_PROFILE'   => 'uploads/trainer/profile',
    'TRAINEE_IMAGES'    => 'uploads/trainee/images',
    'TRAINEE_PROFILE'   => 'uploads/trainee/profile',
    'ADMIN_PROFILE'     => 'uploads/admin/profile',

];
