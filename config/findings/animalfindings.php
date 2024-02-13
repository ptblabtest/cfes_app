<?php

return [
    'model' => App\Models\AnimalFinding::class,
    'title' => 'List Temuan Satwa',
    'relationship' => ['location', 'findingtype', 'animal', 'createdby'],
    'export_fields' => ['id', 'date', 'location_id', 'animal_id', 'quantity', 'finding_type', 'description'],
    'view' => [
        'index' => 'Display/Index/Index',
    ],
    'index' => [
        'tables' => [
            'fields' => [
                'animal_id' => $commonFields['animal_id'],
                'quantity' => $commonFields['quantity'],
                'finding_type' => $commonFields['finding_type'],
                'location_id' => $commonFields['location_id'],
                'date' => $commonFields['date'],
            ],
        ],
    ],
];
