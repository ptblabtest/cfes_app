<?php

return [
    'model' => App\Models\HuntingFinding::class,
    'title' => 'Temuan Perburuan',
    'relationship' => ['location', 'agetype', 'animal', 'createdby'],
    'export_fields' => ['id', 'date', 'location_id', 'animal_id', 'animal_quantity', 'tool_name', 'tool_quantity', 'age_type', 'description'],
    'view' => [
        'index' => 'Display/Index/Index',
    ],
    'index' => [
        'tables' => [
            'rowClickAction' => 'modal',
            'fields' => [
                'animal_id' => $commonFields['animal_id'],
                'animal_ quantity' => $commonFields['animal_quantity'],
                'tool_name' => $commonFields['tool_name'],
                'tool_quantity' => $commonFields['tool_quantity'],
                'location_id' => $commonFields['location_id'],
                'date' => $commonFields['date'],
            ],
        ],
    ],
];
