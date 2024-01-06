<?php

return [
    'class' => App\Models\Population::class,
    'title' => 'Populations',
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
            'male_population' => $commonFields['male_population'],
            'female_population' => $commonFields['female_population'],
        ],
    ],
    'form' => [
        'fields' => [
            'year' => $commonFields['year'],
            'location_id' => $commonFields['location_id'],
            'male_population' => $commonFields['male_population'],
            'female_population' => $commonFields['female_population'],
        ],
    ],
    'show' => [
        'fields' => [
            'year' => $commonFields['year'],
            'location_id' => $commonFields['location_id'],
            'male_population' => $commonFields['male_population'],
            'female_population' => $commonFields['female_population'],
        ],
    ],
];
