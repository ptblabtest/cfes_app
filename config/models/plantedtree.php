<?php

return [
    'class' => App\Models\PlantedTree::class,
    'title' => 'Planted Trees',
    'relationship' => ['location'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'fields' => [
            'year' => $commonFields['year'],
            'location_id' => $commonFields['location_id'],
            'quantity' => $commonFields['quantity'],
            'description' => $commonFields['description'],
        ],
    ],
    'form' => [
        'fields' => [
            'year' => $commonFields['year'],
            'location_id' => $commonFields['location_id'],
            'quantity' => $commonFields['quantity'],
            'description' => $commonFields['description'],
        ],
    ],
    'show' => [
        'fields' => [
            'year' => $commonFields['year'],
            'location_id' => $commonFields['location_id'],
            'quantity' => $commonFields['quantity'],
            'description' => $commonFields['description'],
        ],
    ],
];
