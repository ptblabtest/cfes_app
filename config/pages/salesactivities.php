<?php

return [
    'model' => App\Models\SalesActivity::class,
    'title' => 'Aktivitas Penjualan',
    'relationship' => ['deals', 'creator'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'tables' => [
            'fields' => [
                'deal_id' => $commonFields['deal_id'],
                'sales_type' => $commonFields['sales_type'],
                'notes' => $commonFields['notes'],
                'start_date' => $commonFields['start_date'],
                'end_date' => $commonFields['end_date'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
    'form' => [
        'fields' => [
            'deal_id' => $commonFields['deal_id'],
            'start_date' => $commonFields['start_date'],
            'end_date' => $commonFields['end_date'],
            'sales_type' => $commonFields['sales_type'],
            'notes' => $commonFields['notes'],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'deal_id' => $commonFields['deal_id'],
                'start_date' => $commonFields['start_date'],
                'end_date' => $commonFields['end_date'],
                'sales_type' => $commonFields['sales_type'],
                'notes' => $commonFields['notes'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
    'relation_show' => [
        'expenses' =>  include('relations/expenses.php'),
        'documents' => include('relations/documents.php'),
    ],
];
