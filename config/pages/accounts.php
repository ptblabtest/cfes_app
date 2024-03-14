<?php

return [
    'model' => App\Models\Account::class,
    'title' => 'Chart of Accounts (COA)',
    'relationship' => [],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'tables' => [
            'fields' => [
                'account_number' => $commonFields['account_number'],
                'name' => [
                    'label' => 'Nama Akun', 'type' => 'text'
                ],
                'type' => [
                    'label' => 'Tipe Akun', 'type' => 'text'
                ],
                'is_active' => $commonFields['is_active'],
            ],
        ],
    ],
    'form' => [
        'fields' => [
            'account_number' => $commonFields['account_number'],
            'name' => [
                'label' => 'Nama Akun', 'type' => 'text'
            ],
            'type' => [
                'label' => 'Tipe Akun', 'type' => 'text'
            ],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'account_number' => $commonFields['account_number'],
                'name' => [
                    'label' => 'Nama Akun', 'type' => 'text'
                ],
                'type' => [
                    'label' => 'Tipe Akun', 'type' => 'text'
                ],
                'is_active' => $commonFields['is_active'],
            ],
        ],
    ],
];
