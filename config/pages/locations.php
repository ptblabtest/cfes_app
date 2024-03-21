<?php

return [
    'model' => App\Models\Location::class,
    'title' => 'Lokasi',
    'relationship' => [],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'tables' => [
            'fields' => [
                'forest_name' => [
                    'label' => 'Nama Hutan', 'type' => 'text'
                ],
                'village_name' => [
                    'label' => 'Nama Desa', 'type' => 'text'
                ],
                'city_name' => [
                    'label' => 'Nama Kota', 'type' => 'text'
                ],
                'province_name' => [
                    'label' => 'Nama Provinsi', 'type' => 'text'
                ],
                'forest_category' => [
                    'label' => 'Kategori Hutan', 'type' => 'text'
                ],
            ],
        ],
    ],
    'form' => [
        'fields' => [
            'forest_name' => [
                'label' => 'Nama Hutan', 'type' => 'text'
            ],
            'village_name' => [
                'label' => 'Nama Desa', 'type' => 'text'
            ],
            'address' => [
                'label' => 'Alamat', 'type' => 'text'
            ],
            'city_name' => [
                'label' => 'Nama Kota', 'type' => 'text'
            ],
            'province_name' => [
                'label' => 'Nama Provinsi', 'type' => 'text'
            ],
            'forest_category' => [
                'label' => 'Kategori Hutan', 'type' => 'text'
            ],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'forest_name' => [
                    'label' => 'Nama Hutan', 'type' => 'text'
                ],
                'village_name' => [
                    'label' => 'Nama Desa', 'type' => 'text'
                ],
                'address' => [
                    'label' => 'Alamat', 'type' => 'text'
                ],
                'city_name' => [
                    'label' => 'Nama Kota', 'type' => 'text'
                ],
                'province_name' => [
                    'label' => 'Nama Provinsi', 'type' => 'text'
                ],
                'forest_category' => [
                    'label' => 'Kategori Hutan', 'type' => 'text'
                ],
            ],
        ],
    ],
    
];
