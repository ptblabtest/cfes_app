<?php

return [
    'model' => App\Models\Deal::class,
    'title' => 'Kesepakatan',
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
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
    'form' => [
        'sections' => [
            [
                'titleform' => 'Pilih Calon Client',
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
        'salesactivities' => include('relations/salesactivities.php'),
        'documents' => include('relations/documents.php'),
    ],
];
