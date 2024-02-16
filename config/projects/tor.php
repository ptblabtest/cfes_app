<?php

return [
    'model' => App\Models\Tor::class,
    'title' => 'Terms of Reference',
    'return' => '/projects',
    'relationship' => ['createdby', 'plan'],
    'view' => [
        'form' => 'Display/Form/Form',
    ],
    'form' => [
        'fields' => [
            'plan_id' => $commonFields['plan_id'],
            'start_date' => $commonFields['start_date'],
            'end_date' => $commonFields['end_date'],
            'tor_file' => $commonFields['tor_file'],
            'budget' => $commonFields['budget'],
            'budget_file' => $commonFields['budget_file'],
        ],
    ],
];
