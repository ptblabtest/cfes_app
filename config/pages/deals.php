<?php

return [
    'model' => App\Models\Deal::class,
    'title' => 'Calon Transaksi',
    'parent' => 'deal_id',
    'relationship' => ['lead', 'customer', 'creator', 'salesActivities', 'documents'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'tables' => [
            'fields' => [
                'lead_id' => $commonFields['lead_id'],
                'customer_id' => $commonFields['customer_id'],
                'potential_revenue' => $commonFields['potential_revenue'],
                'expected_close_date' => $commonFields['expected_close_date'],
                'status' => [
                    'label' => 'Status', 'type' => 'text'
                ],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
    'form' => [
        'sections' => [
            [
                'titleform' => 'Pilih Prospek',
                'fields' => [
                    'lead_id' => $commonFields['lead_id'],
                ],
            ],
            [
                'titleform' => 'Detail Kesepakatan',
                'fields' => [
                    'customer_id' => $commonFields['customer_id'],
                    'potential_revenue' => $commonFields['potential_revenue'],
                    'expected_close_date' => $commonFields['expected_close_date'],
                    'description' => $commonFields['description'],
                ],
            ],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'lead_id' => $commonFields['lead_id'],
                'customer_id' => $commonFields['customer_id'],
                'potential_revenue' => $commonFields['potential_revenue'],
                'expected_close_date' => $commonFields['expected_close_date'],
                'description' => $commonFields['description'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
    'relation_show' => [
        'salesactivities' => [
            'model' => App\Models\SalesActivity::class,
            'title' => 'Aktivitas Penjualan',
            'entity' => 'salesactivities',
            'query' => true,
            'relationship' => ['deals', 'creator'],
            'create' => [
                'url' => '/salesactivities/create',
            ],
            'fields' => [
                'sales_type' => $commonFields['sales_type'],
                'notes' => $commonFields['notes'],
                'date' => $commonFields['date'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
        'expenses' => [
            'model' => App\Models\Expense::class,
            'title' => 'Biaya Sales',
            'entity' => 'expenses',
            'relationship' => ['accountitem', 'creator'],
            'query' => true,
            'isPolymorphic' => true,
            'model_id_field' => 'model_id',
            'model_type_field' => 'model_type',
            'create' => [
                'url' => '/expenses/create',
            ],
            'fields' => [
                'account_item_id' => $commonFields['account_item_id'],
                'description' => $commonFields['description'],
                'amount' => [
                    'label' => 'Jumlah Biaya',
                    'type' => 'currency',
                    'validation' => 'nullable|numeric',
                ],
                'date' => $commonFields['date'],
                'advance_id' => $commonFields['advance_id'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
        'documents' => [
            'model' => App\Models\Document::class,
            'title' => 'Dokumen',
            'entity' => 'documents',
            'relationship' => ['creator'],
            'query' => true,
            'isPolymorphic' => true,
            'model_id_field' => 'model_id',
            'model_type_field' => 'model_type',
            'create' => [
                'url' => '/documents/create',
            ],
            'fields' => [
                'title' => [
                    'label' => 'Judul Dokumen',
                    'type' => 'text',
                ],
                'doc_type' => $commonFields['doc_type'],
                'description' => $commonFields['description'],
                'file' => $commonFields['file'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
];
