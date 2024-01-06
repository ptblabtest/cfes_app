<?php

return [

    'class' => App\Models\Location::class,
    'title' => 'Lokasi',
    'relationship' => ['forestcategory'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'fields' => [
            'forest_name' => $commonFields['forest_name'],
            'village_name' => $commonFields['village_name'],
            'forest_category' => $commonFields['forest_category'],
            'x_coordinate' => $commonFields['x_coordinate'],
            'y_coordinate' => $commonFields['y_coordinate'],
        ],
    ],
    'form' => [
        'fields' => [
            'forest_name' => $commonFields['forest_name'],
            'village_name' => $commonFields['village_name'],
            'forest_category' => $commonFields['forest_category'],
            'x_coordinate' => $commonFields['x_coordinate'],
            'y_coordinate' => $commonFields['y_coordinate'],
        ],
    ],
    'show' => [
        'fields' => [
            'forest_name' => $commonFields['forest_name'],
            'village_name' => $commonFields['village_name'],
            'forest_category' => $commonFields['forest_category'],
            'x_coordinate' => $commonFields['x_coordinate'],
            'y_coordinate' => $commonFields['y_coordinate'],
        ],
    ],
];
