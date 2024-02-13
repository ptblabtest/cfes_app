<?php

return [
    'model' => App\Models\Org::class,
    'title' => 'List LPHD / KPHA',
    'relationship' => ['location', 'orgtype', 'createdby'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'tables' => [
            'fields' => [
                'name' => $commonFields['name'],
                'location_id' => $commonFields['location_id'],
                'org_type' => $commonFields['org_type'],
                'description' => $commonFields['description'],
                'sk_number' => $commonFields['sk_number'],
                'image' => $commonFields['image'],
            ],
        ],
    ],
    'form' => [
        'fields' => [
            'name' => $commonFields['name'],
            'location_id' => $commonFields['location_id'],
            'org_type' => $commonFields['org_type'],
            'description' => $commonFields['description'],
            'sk_number' => $commonFields['sk_number'],
            'org_file' => $commonFields['org_file'],
            'image' => $commonFields['image'],
        ],
    ],
    'show' => [
        'fields' => [
            'name' => $commonFields['name'],
            'location_id' => $commonFields['location_id'],
            'org_type' => $commonFields['org_type'],
            'description' => $commonFields['description'],
            'sk_number' => $commonFields['sk_number'],
            'org_file' => $commonFields['org_file'],
            'image' => $commonFields['image'],
        ],
    ],
];
