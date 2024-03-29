<?php

return [
    'model' => App\Models\AccountItem::class,
    'title' => 'Item Akun',
    'relationship' => ['account'],
    'index' => [
        'tables' => [
            'fields' => [
                'name' => [
                    'label' => 'Nama Item', 'type' => 'text'
                ],
                'account_id' => $commonFields['account_id'],
                'credit' => [
                    'label' => 'Credit', 'type' => 'text'
                ],
            ],
        ],
    ],
    'form' => [
        'fields' => [
            'name' => [
                'label' => 'Nama Item', 'type' => 'text'
            ],
            'account_id' => $commonFields['account_id'],
            'description' => $commonFields['description'],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'name' => [
                    'label' => 'Nama Item', 'type' => 'text'
                ],
                'account_id' => $commonFields['account_id'],
                'description' => $commonFields['description'],
            ],
        ],
    ],
];
