<?php

return [
    'class' => App\Models\VillageArea::class,
    'title' => 'Village Areas',
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
        ],
    ],
    'form' => [
        'fields' => [
            'year' => $commonFields['year'],
            'location_id' => $commonFields['location_id'],
            'amount' => $commonFields['amount'],
        ],
    ],
    'show' => [
        'fields' => [
            'year' => $commonFields['year'],
            'location_id' => $commonFields['location_id'],
            'amount' => $commonFields['amount'],
        ],
    ],
];
