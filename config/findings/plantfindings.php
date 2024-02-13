<?php

return [
    'model' => App\Models\PlantFinding::class,
    'title' => 'Temuan Tumbuhan',
    'relationship' => ['location', 'plant', 'unit', 'createdby'],
    'export_fields' => ['id', 'date', 'location_id', 'plant_id', 'quantity', 'unit', 'description'],
    'view' => [
        'index' => 'Display/Index/Index',
    ],
    'index' => [
        'tables' => [
            'rowClickAction' => 'modal',
            'fields' => [
                'plant_id' => $commonFields['plant_id'],
                'quantity' => $commonFields['quantity'],
                'unit' => $commonFields['unit'],
                'location_id' => $commonFields['location_id'],
                'date' => $commonFields['date'],
            ],
        ],
    ],
];
