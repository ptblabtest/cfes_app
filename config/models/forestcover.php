<?php

return [
    'class' => App\Models\ForestCover::class,
    'title' => 'Forest Covers',
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
            'amount' => $commonFields['amount'],
            'description' => $commonFields['description'],
            'action' => $commonFields['action'],
            'image' => $commonFields['image'],
        ],
    ],
    'form' => [
        'fields' => [
            'year' => $commonFields['year'],
            'location_id' => $commonFields['location_id'],
            'amount' => $commonFields['amount'],
            'description' => $commonFields['description'],
            'action' => $commonFields['action'],
            'image' => $commonFields['image'],
        ],
    ],
    'show' => [
        'fields' => [
            'year' => $commonFields['year'],
            'location_id' => $commonFields['location_id'],
            'amount' => $commonFields['amount'],
            'description' => $commonFields['description'],
            'action' => $commonFields['action'],
            'image' => $commonFields['image'],
        ],
    ],
];
