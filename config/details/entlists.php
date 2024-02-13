<?php

return [
    'model' => App\Models\EntList::class,
    'title' => 'Kelompok Usaha',
    'relationship' => ['location'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
    ],
    'index' => [
        'grids' => [
            'rowClickAction' => 'modal',
            'fields' => [
                'name' => $commonFields['name'],
                'location_id' => $commonFields['location_id'],
                'year' => $commonFields['year'],
                'description' => $commonFields['description'],
                'ent_type' => $commonFields['ent_type'],
                'kups_class' => $commonFields['kups_class'],
                'sk_number' => $commonFields['sk_number'],
            ],
        ],
    ],
    'form' => [
        'fields' => [
            'name' => $commonFields['name'],
            'location_id' => $commonFields['location_id'],
            'year' => $commonFields['year'],
            'description' => $commonFields['description'],
            'ent_type' => $commonFields['ent_type'],
            'kups_class' => $commonFields['kups_class'],
            'sk_number' => $commonFields['sk_number'],
        ],
    ],
];
