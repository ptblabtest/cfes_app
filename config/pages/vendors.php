<?php

return [
    'model' => App\Models\Vendor::class,
    'title' => 'Vendor',
    'index' => [
        'tables' => [
            'fields' => [
                'name' => [
                    'label' => 'Nama',
                    'type' => 'text',
                    'validation' => 'nullable|string',
                ],
                'address' => $commonFields['address'],
                'phone' => $commonFields['phone'],
                'email' => $commonFields['email'],
            ],
        ],
    ],
    'form' => [
        'fields' => [
            'name' => [
                'label' => 'Nama',
                'type' => 'text',
                'validation' => 'nullable|string',
            ],
            'address' => $commonFields['address'],
            'phone' => $commonFields['phone'],
            'email' => $commonFields['email'],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'name' => [
                    'label' => 'Nama',
                    'type' => 'text',
                    'validation' => 'nullable|string',
                ],
                'address' => $commonFields['address'],
                'phone' => $commonFields['phone'],
                'email' => $commonFields['email'],
            ],
        ],
    ],
];
