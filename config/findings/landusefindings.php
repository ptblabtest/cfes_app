<?php

return [
    'model' => App\Models\LandUseFinding::class,
    'title' => 'Temuan Pemanfaatan Lahan',
    'relationship' => ['location', 'createdby'],
    'export_fields' => ['id', 'date', 'location_id', 'name', 'quantity', 'description', 'action'],
    'view' => [
        'index' => 'Display/Index/Index',
    ],
    'index' => [
        'tables' => [
            'rowClickAction' => 'modal',
            'fields' => [
                'name' => $commonFields['name'],
                'quantity' => $commonFields['quantity'],
                'location_id' => $commonFields['location_id'],
                'date' => $commonFields['date'],
            ],
        ],
    ],
];
