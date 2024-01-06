<?php

return [
    'class' => App\Models\CarbonStock::class,
    'title' => 'Carbon Stocks',
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
            'image' => $commonFields['image'],
        ],
    ],
    'form' => [
        'fields' => [
            'year' => $commonFields['year'],
            'location_id' => $commonFields['location_id'],
            'amount' => $commonFields['amount'],
            'description' => $commonFields['description'],
            'image' => $commonFields['image'],
        ],
    ],    
    'show' => [
        'fields' => [
            'year' => $commonFields['year'],
            'location_id' => $commonFields['location_id'],
            'amount' => $commonFields['amount'],
            'description' => $commonFields['description'],
            'image' => $commonFields['image'],
        ],
    ],
];
