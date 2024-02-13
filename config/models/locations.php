<?php

return [
    'model' => App\Models\Location::class,
    'title' => 'Lokasi',
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'grids' => [
            'rowClickAction' => 'modal',
            'fields' => [
                'forest_name' => $commonFields['forest_name'],
                'village_name' => $commonFields['village_name'],
                'forest_legal' => $commonFields['forest_legal'],
                'image' => $commonFields['image'],
            ],
        ],
    ],
    'form' => [
        'sections' => [
            [
                'titleform' => 'General Information',
                'fields' => [
                    'forest_name' => $commonFields['forest_name'],
                    'village_name' => $commonFields['village_name'],
                    'forest_legal' => $commonFields['forest_legal'],
                    'longitude' => $commonFields['longitude'],
                    'latitude' => $commonFields['latitude'],
                    'image' => $commonFields['image'],
                ],
            ],
            [
                'titleform' => 'Data Hutan',
                'subtitleform' => "Isi Data Hutan Terkini",
                'fields' => [
                    'usable_area' => $commonFields['usable_area'],
                    'usable_forest_area' => $commonFields['usable_forest_area'],
                    'protected_area' => $commonFields['protected_area'],
                    'tree_count' => $commonFields['tree_count'],
                    'carbon_stock' => $commonFields['carbon_stock'],
                ],
            ],
            [
                'titleform' => 'Data Desa',
                'subtitleform' => "Isi Data Desa Terkini",
                'fields' => [
                    'village_area' => $commonFields['village_area'],
                    'male_population' => $commonFields['male_population'],
                    'female_population' => $commonFields['female_population'],
                ],
            ],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'forest_name' => $commonFields['forest_name'],
                'village_name' => $commonFields['village_name'],
                'forest_legal' => $commonFields['forest_legal'],
                'image' => $commonFields['image'],
                'usable_area' => $commonFields['usable_area'],
                'usable_forest_area' => $commonFields['usable_forest_area'],
                'protected_area' => $commonFields['protected_area'],
                'tree_count' => $commonFields['tree_count'],
                'carbon_stock' => $commonFields['carbon_stock'],
                'village_area' => $commonFields['village_area'],
                'male_population' => $commonFields['male_population'],
                'female_population' => $commonFields['female_population'],
            ],
        ],
    ],
];
