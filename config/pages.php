<?php

$commonFields = include(base_path('config/common_fields.php'));



return [

    'userdetails' => [
        'model' => App\Models\UserDetail::class,
        'title' => 'Profil',
        'relationship' => ['user'],
        'form' => [
            'fields' => [
                'name' => $commonFields['name'],
                'address' => $commonFields['address'],
                'phone' => $commonFields['phone'],
            ],
        ],
        'show' => [
            'cards' => [
                'fields' => [
                    'name' => $commonFields['name'],
                    'address' => $commonFields['address'],
                    'phone' => $commonFields['phone'],
                ],
            ],
        ],
    ],

];
