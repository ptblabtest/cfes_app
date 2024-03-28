<?php

return [
    'model' => App\Models\SalesActivity::class,
    'title' => 'Kegiatan Sales',
    'relationship' => ['deals', 'creator'],
    'index' => [
        'tables' => [
            'fields' => [
                'id' => $commonFields['id'],
               // 'salesact_reg_no' => $commonFields['salesact_reg_no'],
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
            'start_date' => $commonFields['start_date'],
            'end_date' => $commonFields['end_date'],
            'sales_type' => $commonFields['sales_type'],
            'notes' => $commonFields['notes'],
            'deal_id' => $commonFields['deal_id'],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                 // 'salesact_reg_no' => $commonFields['salesact_reg_no'],
                'sales_type' => $commonFields['sales_type'],
                'notes' => $commonFields['notes'],
                'start_date' => $commonFields['start_date'],
                'end_date' => $commonFields['end_date'],
                'deal_id' => $commonFields['deal_id'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
    'relation_show' => [
        'expenses' =>  include('relations/expenses.php'),
        'documents' => include('relations/documents.php'),
    ],
];
