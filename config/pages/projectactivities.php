<?php

return [
    'model' => App\Models\ProjectActivity::class,
    'title' => 'Kegiatan Project',
    'relationship' => ['project', 'creator'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'tables' => [
            'fields' => [
                'project_id' => $commonFields['project_id'],
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
            'project_id' => $commonFields['project_id'],
            'start_date' => $commonFields['start_date'],
            'end_date' => $commonFields['end_date'],
            'project_type' => $commonFields['project_type'],
            'notes' => $commonFields['notes'],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'project_id' => $commonFields['project_id'],
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
