<?php

return [
    'model' => App\Models\NonTimberFinding::class,
    'title' => 'Temuan HHBK',
    'relationship' => ['location', 'unit', 'createdby'],
    'export_fields' => ['id', 'date', 'location_id', 'name', 'quantity', 'unit', 'description', 'action'],
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
