<?php

return [
    'model' => App\Models\ProjectActivity::class,
    'title' => 'Kegiatan Project',
    'relationship' => ['project', 'creator'],
    'index' => [
        'tables' => [
            'fields' => [
                'id' => $commonFields['id'],
                // 'project_reg_no' => $commonFields['project_reg_no'],
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
            'start_date' => $commonFields['start_date'],
            'end_date' => $commonFields['end_date'],
            'project_type' => $commonFields['project_type'],
            'notes' => $commonFields['notes'],
            'project_id' => $commonFields['project_id'],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                 // 'project_reg_no' => $commonFields['project_reg_no'],
                'project_type' => $commonFields['project_type'],
                'notes' => $commonFields['notes'],
                'start_date' => $commonFields['start_date'],
                'end_date' => $commonFields['end_date'],
                'project_id' => $commonFields['project_id'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
    'relation_show' => [
        'advances' => include('relations/advances.php'),
        'expenses' =>  include('relations/expenses.php'),
        'documents' => include('relations/documents.php'),
    ],
];
