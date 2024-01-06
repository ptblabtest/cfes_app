<?php

return [
    'class' => App\Models\Plant::class,
    'title' => 'Plants',
    'relationship' => ['iucn', 'cites'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'fields' => [
            'name' => $commonFields['name'],
            'species_name' => $commonFields['species_name'],
            'description' => $commonFields['description'],
            'image' => $commonFields['image'],
            'iucn_id' => $commonFields['iucn_id'],
            'cites_id' => $commonFields['cites_id'],
            'usage' => $commonFields['usage'],
        ],
    ],
    'form' => [
        'fields' => [
            'name' => $commonFields['name'],
            'species_name' => $commonFields['species_name'],
            'description' => $commonFields['description'],
            'image' => $commonFields['image'],
            'iucn_id' => $commonFields['iucn_id'],
            'cites_id' => $commonFields['cites_id'],
            'usage' => $commonFields['usage'],
        ],
    ],
    'show' => [
        'fields' => [
            'name' => $commonFields['name'],
            'species_name' => $commonFields['species_name'],
            'description' => $commonFields['description'],
            'image' => $commonFields['image'],
            'iucn_id' => $commonFields['iucn_id'],
            'cites_id' => $commonFields['cites_id'],
            'usage' => $commonFields['usage'],
        ],
    ],
];
