<?php

return [
    'model' => App\Models\Account::class,
    'title' => 'Chart of Accounts (COA)',
    'relationship' => ['accountItems'],
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
                'debit' => [
                    'label' => 'Debit', 'type' => 'text'
                ],
                'credit' => $commonFields['credit'],
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
                'debit' => [
                    'label' => 'Debit', 'type' => 'text'
                ],
                'credit' => $commonFields['credit'],
                'is_active' => $commonFields['is_active'],
            ],
        ],
    ],
];
