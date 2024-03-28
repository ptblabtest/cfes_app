<?php

return [
    'model' => App\Models\Operational::class,
    'title' => 'Operasional',
    'relationship' => ['creator', 'documents'],
    'index' => [
        'tables' => [
            'fields' => [
                'id' => $commonFields['id'],
                // 'ops_reg_no' => $commonFields['ops_reg_no'],
                'project_type' => $commonFields['project_type'],
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
            'project_type' => $commonFields['project_type'],
            'notes' => $commonFields['notes'],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                // 'ops_reg_no' => $commonFields['ops_reg_no'],
                'project_type' => $commonFields['project_type'],
                'notes' => $commonFields['notes'],
                'start_date' => $commonFields['start_date'],
                'end_date' => $commonFields['end_date'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
    'relation_show' => [
        'expenses' =>  include('relations/expenses.php'),
        'documents' => include('relations/documents.php'),
    ],
];
