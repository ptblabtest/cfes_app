<?php

return [
    'model' => App\Models\SalesActivity::class,
    'title' => 'Kegiatan Sales',
    'entity' => 'salesactivities',
    'query' => true,
    'relationship' => ['deals', 'creator'],
    'create' => [
        'url' => '/salesactivities/create',
    ],
    'fields' => [
        'notes' => $commonFields['notes'],
        'sales_type' => $commonFields['sales_type'],
        'start_date' => $commonFields['start_date'],
        'end_date' => $commonFields['end_date'],
        'created_by' => $commonFields['created_by'],
    ],
];
