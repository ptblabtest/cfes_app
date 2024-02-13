<?php

return [
    'model' => App\Models\BoundaryFinding::class,
    'title' => 'Patok Batas',
    'relationship' => ['location', 'createdby'],
    'export_fields' => ['id','location_id', 'date', 'marker_number', 'description'],
    'view' => [
        'index' => 'Display/Index/Index',
    ],
    'index' => [
        'tables' => [
            'rowClickAction' => 'modal',
            'fields' => [
                'marker_number' => $commonFields['marker_number'],
                'location_id' => $commonFields['location_id'],
                'date' => $commonFields['date'],
            ],
        ],
    ],
];
