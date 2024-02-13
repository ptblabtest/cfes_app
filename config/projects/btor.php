<?php

return [
    'model' => App\Models\Btor::class,
    'title' => 'BTOR',
    'return' => '/projects',
    'relationship' => ['createdby', 'project'],
    'view' => [
        'form' => 'Display/Form/Form',
    ],
    'form' => [
        'fields' => [
            'project_id' => $commonFields['project_id'],
            'start_date' => $commonFields['start_date'],
            'end_date' => $commonFields['end_date'],
            'btor_file' => $commonFields['btor_file'],
            'cost' => $commonFields['cost'],
            'cost_file' => $commonFields['cost_file'],
        ],
    ],
];
