<?php

return [
    'class' => App\Models\ForestArea::class,
    'title' => 'Forest Areas',
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
            'util_amount' => $commonFields['util_amount'],
            'prot_amount' => $commonFields['prot_amount'],
            'image' => $commonFields['image'],
        ],
    ],
    'form' => [
        'fields' => [
            'year' => $commonFields['year'],
            'location_id' => $commonFields['location_id'],
            'util_amount' => $commonFields['util_amount'],
            'prot_amount' => $commonFields['prot_amount'],
            'image' => $commonFields['image'],
        ],
    ],
    'show' => [
        'fields' => [
            'year' => $commonFields['year'],
            'location_id' => $commonFields['location_id'],
            'util_amount' => $commonFields['util_amount'],
            'prot_amount' => $commonFields['prot_amount'],
            'image' => $commonFields['image'],
        ],
    ],
];
