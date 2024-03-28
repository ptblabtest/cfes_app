<?php

return [
    'model' => App\Models\Deal::class,
    'title' => 'Kesepakatan',
    'parent' => 'deal_id',
    'relationship' => ['lead', 'customer', 'creator', 'salesActivities', 'documents'],
    'index' => [
        'tables' => [
            'fields' => [
                'id' => $commonFields['id'],
                'sales_reg_no' => $commonFields['sales_reg_no'],
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
                'titleform' => 'Detail Kesepakatan',
                'fields' => [
                    'customer_id' => $commonFields['customer_id'],
                    'potential_revenue' => $commonFields['potential_revenue'],
                    'expected_close_date' => $commonFields['expected_close_date'],
                    'description' => $commonFields['description'],
                ],
            ],
            [
                'titleform' => 'Pilih Calon Client',
                'fields' => [
                    'lead_id' => $commonFields['lead_id'],
                ],
            ],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'sales_reg_no' => $commonFields['sales_reg_no'],
                'customer_id' => $commonFields['customer_id'],
                'potential_revenue' => $commonFields['potential_revenue'],
                'expected_close_date' => $commonFields['expected_close_date'],
                'description' => $commonFields['description'],
                'lead_id' => $commonFields['lead_id'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
    'relation_show' => [
        'salesactivities' => include('relations/salesactivities.php'),
        'documents' => include('relations/documents.php'),
    ],
];
