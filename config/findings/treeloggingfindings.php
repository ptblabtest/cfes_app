<?php

return [
    'model' => App\Models\TreeLoggingFinding::class,
    'title' => 'Temuan Penebangan Pohon',
    'relationship' => ['location', 'unit', 'createdby'],
    'export_fields' => ['id', 'date', 'location_id', 'name', 'quantity', 'unit', 'age_type', 'description', 'action'],
    'view' => [
        'index' => 'Display/Index/Index',
    ],
    'index' => [
        'tables' => [
            'rowClickAction' => 'modal',
            'fields' => [
                'name' => $commonFields['name'],
                'quantity' => $commonFields['quantity'],
                'unit' => $commonFields['unit'],
                'location_id' => $commonFields['location_id'],
                'date' => $commonFields['date'],
            ],
        ],
    ],
];
