<?php

return [
    'class' => App\Models\KuList::class,
    'title' => 'Kelompok Usaha',
    'relationship' => ['location'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'fields' => [
            'name' => $commonFields['name'],
            'location_id' => $commonFields['location_id'],
            'year' => $commonFields['year'],
            'description' => $commonFields['description'],
            'image' => $commonFields['image'],
        ],
    ],
    'form' => [
        'fields' => [
            'name' => $commonFields['name'],
            'location_id' => $commonFields['location_id'],
            'year' => $commonFields['year'],
            'description' => $commonFields['description'],
            'image' => $commonFields['image'],
        ],
    ],
    'show' => [
        'fields' => [
            'name' => $commonFields['name'],
            'location_id' => $commonFields['location_id'],
            'year' => $commonFields['year'],
            'description' => $commonFields['description'],
            'image' => $commonFields['image'],
        ],
    ],
];
