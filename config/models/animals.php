<?php

return [
    'model' => App\Models\Animal::class,
    'title' => 'Satwa',
    'relationship' => ['iucn', 'cites'],
    'export_fields' => ['name', 'species_name', 'description', 'iucn_id', 'cites_id'],
    'view' => [
        'index' => 'Display/Index/Index',
    ],
    'index' => [
        'grids' => [
            'rowClickAction' => 'modal',
            'fields' => [
                'name' => $commonFields['name'],
                'species_name' => $commonFields['species_name'],
                'iucn_id' => $commonFields['iucn_id'],
                'cites_id' => $commonFields['cites_id'],
            ],
        ],
    ],
];
