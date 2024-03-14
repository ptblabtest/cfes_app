<?php

return [
    'model' => App\Models\Product::class,
    'title' => 'Produk',
    'relationship' => [],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'tables' => [
            'fields' => [
                'name' => [
                    'label' => 'Nama Produk', 'type' => 'text'
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
                'label' => 'Nama Produk', 'type' => 'text'
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
                    'label' => 'Nama Produk', 'type' => 'text'
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
