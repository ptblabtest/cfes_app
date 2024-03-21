<?php

return [
    'model' => App\Models\Operational::class,
    'title' => 'Operasional',
    'relationship' => ['creator', 'documents'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'tables' => [
            'fields' => [
                'start_date' => $commonFields['start_date'],
                'end_date' => $commonFields['end_date'],
                'project_type' => $commonFields['project_type'],
                'notes' => $commonFields['notes'],
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
                'start_date' => $commonFields['start_date'],
                'end_date' => $commonFields['end_date'],
                'project_type' => $commonFields['project_type'],
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
