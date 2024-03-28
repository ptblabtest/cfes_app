<?php

return [
    'model' => App\Models\Product::class,
    'title' => 'Program',
    'relationship' => [],
    'index' => [
        'tables' => [
            'fields' => [
                'id' => $commonFields['id'],
                'name' => [
                    'label' => 'Nama Program', 'type' => 'text'
                ],
                'description' => [
                    'label' => 'Deskripsi', 'type' => 'text'
                ],
                'is_active' => [
                    'label' => 'Aktif', 'type' => 'boolean'
                ],
            ],
        ],
    ],
    'form' => [
        'fields' => [
            'name' => [
                'label' => 'Nama Program', 'type' => 'text'
            ],
            'description' => [
                'label' => 'Deskripsi', 'type' => 'text'
            ],
            'is_active' => [
                'label' => 'Aktif', 'type' => 'boolean'
            ],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'name' => [
                    'label' => 'Nama Program', 'type' => 'text'
                ],
                'description' => [
                    'label' => 'Deskripsi', 'type' => 'text'
                ],
                'is_active' => [
                    'label' => 'Aktif', 'type' => 'boolean'
                ],
            ],
        ],
    ],
];
