<?php

return
    [
        'model' => App\Models\Client::class,
        'title' => 'List Klien',
        'view' => [
            'index' => 'Display/Index/Index',
            'form' => 'Display/Form/Form',
        ],
        'index' => [
            'grids' => [
                'fields' => [
                    'name' => $commonFields['name'],
                    'address' => $commonFields['address'],
                    'phone' => $commonFields['phone'],
                    'cp_name' => $commonFields['cp_name'],
                    'cp_email' => $commonFields['cp_email'],
                    'cp_phone' => $commonFields['cp_phone'],
                    'image' => $commonFields['image'],
                ],
            ],
        ],
        'form' => [
            'fields' => [
                'name' => $commonFields['name'],
                'address' => $commonFields['address'],
                'phone' => $commonFields['phone'],
                'cp_name' => $commonFields['cp_name'],
                'cp_email' => $commonFields['cp_email'],
                'cp_phone' => $commonFields['cp_phone'],
                'image' => $commonFields['image'],
            ],
        ],
    ];
