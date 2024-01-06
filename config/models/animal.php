<?php

return [
    'class' => App\Models\Animal::class,
    'title' => 'Animals',
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
        ],
    ],
];
