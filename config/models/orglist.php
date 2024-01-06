<?php

return [
    'class' => App\Models\OrgList::class,
    'title' => 'Organization Lists',
    'relationship' => ['location', 'orgcategory'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'fields' => [
            'name' => $commonFields['name'],
            'location_id' => $commonFields['location_id'],
            'org_category' => $commonFields['org_category'],
            'description' => $commonFields['description'],
            'image' => $commonFields['image'],
            'sk_number' => $commonFields['sk_number'],
            'file' => $commonFields['file'],
        ],
    ],
    'form' => [
        'fields' => [
            'name' => $commonFields['name'],
            'location_id' => $commonFields['location_id'],
            'org_category' => $commonFields['org_category'],
            'description' => $commonFields['description'],
            'image' => $commonFields['image'],
            'sk_number' => $commonFields['sk_number'],
            'file' => $commonFields['file'],
        ],
    ],
    'show' => [
        'fields' => [
            'name' => $commonFields['name'],
            'location_id' => $commonFields['location_id'],
            'org_category' => $commonFields['org_category'],
            'description' => $commonFields['description'],
            'image' => $commonFields['image'],
            'sk_number' => $commonFields['sk_number'],
            'file' => $commonFields['file'],
        ],
    ],
];
