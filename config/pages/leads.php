<?php

return [
    'model' => App\Models\Lead::class,
    'title' => 'Calon Client',
    'parent' => 'lead_id',
    'relationship' => ['creator', 'product'],
    'index' => [
        'tables' => [
            'fields' => [
                'id' => $commonFields['id'],
                'name' => [
                    'label' => 'Nama Calon Client',
                    'type' => 'text',
                    'validation' => 'nullable|string',
                ],
                'email' => $commonFields['email'],
                'product_id' => $commonFields['product_id'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
    'form' => [
        'sections' => [
            [
                'titleform' => 'Kontak',
                'subtitleform' => 'Masukkan informasi kontak dari calon client',
                'fields' => [
                    'name' => [
                        'label' => 'Nama Calon Client',
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
                    'product_id' => $commonFields['product_id'],
                    'source' => $commonFields['source'],
                ],
            ],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'name' => [
                    'label' => 'Nama Calon Client',
                    'type' => 'text',
                    'validation' => 'nullable|string',
                ],
                'email' => $commonFields['email'],
                'phone' => $commonFields['phone'],
                'product_id' => $commonFields['product_id'],
                'source' => $commonFields['source'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
    'relation_show' => [
        'deals' => include('relations/deals.php'),
        'documents' => include('relations/documents.php'),
    ],
];
