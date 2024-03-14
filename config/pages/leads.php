<?php

return
    [
        'model' => App\Models\Lead::class,
        'title' => 'Prospek',
        'parent' => 'lead_id',
        'relationship' => ['creator'],
        'view' => [
            'index' => 'Display/Index/Index',
            'form' => 'Display/Form/Form',
            'show' => 'Display/Show/Show',
        ],
        'index' => [
            'tables' => [
                'fields' => [
                    'name' => [
                        'label' => 'Nama Prospek',
                        'type' => 'text',
                        'validation' => 'nullable|string',
                    ],
                    'email' => $commonFields['email'],
                    'phone' => $commonFields['phone'],
                    'interest' => $commonFields['interest'],
                    'source' => $commonFields['source'],
                    'created_by' => $commonFields['created_by'],
                ],
            ],
        ],
        'form' => [
            'sections' => [
                [
                    'titleform' => 'Kontak',
                    'subtitleform' => 'Masukkan informasi kontak dari prospek',
                    'fields' => [
                        'name' => [
                            'label' => 'Nama Prospek',
                            'type' => 'text',
                            'validation' => 'nullable|string',
                        ],
                        'email' => $commonFields['email'],
                        'phone' => $commonFields['phone'],
                    ],
                ],
                [
                    'titleform' => 'Deskripsi',
                    'subtitleform' => 'Detailkan informasi mengenai minat dan bagaimana prospek mengetahui tentang layanan atau produk perusahaan',
                    'fields' => [
                        'interest' => $commonFields['interest'],
                        'source' => $commonFields['source'],
                    ],
                ],
            ],
        ],
        'show' => [
            'cards' => [
                'fields' => [
                    'name' => [
                        'label' => 'Nama Prospek',
                        'type' => 'text',
                        'validation' => 'nullable|string',
                    ],
                    'email' => $commonFields['email'],
                    'phone' => $commonFields['phone'],
                    'interest' => $commonFields['interest'],
                    'source' => $commonFields['source'],
                    'created_by' => $commonFields['created_by'],
                ],
            ],
        ],
        'relation_show' => [
            'deals' => [
                'model' => App\Models\Deal::class,
                'title' => 'Calon Transaksi',
                'entity' => 'deals',
                'relationship' => ['creator', 'lead', 'customer'],
                'query' => true,
                'create' => [
                    'url' => '/deals/create',
                ],
                'fields' => [
                    'customer_id' => $commonFields['customer_id'],
                    'potential_revenue' => $commonFields['potential_revenue'],
                    'expected_close_date' => $commonFields['expected_close_date'],
                    'description' => $commonFields['description'],
                    'created_by' => $commonFields['created_by'],
                ],
            ],
        ],
    ];
