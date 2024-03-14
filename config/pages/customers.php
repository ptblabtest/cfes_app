<?php

return
    [
        'model' => App\Models\Customer::class,
        'title' => 'Customer',
        'view' => [
            'index' => 'Display/Index/Index',
            'form' => 'Display/Form/Form',
            'show' => 'Display/Show/Show',
        ],
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
