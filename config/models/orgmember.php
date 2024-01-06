<?php

return [
    'class' => App\Models\OrgMember::class,
    'title' => 'Organization Members',
    'relationship' => ['org', 'activestatus'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'fields' => [
            'name' => $commonFields['name'],
            'position' => $commonFields['position'],
            'division' => $commonFields['division'],
            'org_id' => $commonFields['org_id'],
            'start_date' => $commonFields['start_date'],
            'finish_date' => $commonFields['finish_date'],
            'active_status' => $commonFields['active_status'],
            'image' => $commonFields['image'],
        ],
    ],
    'form' => [
        'fields' => [
            'name' => $commonFields['name'],
            'position' => $commonFields['position'],
            'division' => $commonFields['division'],
            'org_id' => $commonFields['org_id'],
            'start_date' => $commonFields['start_date'],
            'finish_date' => $commonFields['finish_date'],
            'active_status' => $commonFields['active_status'],
            'image' => $commonFields['image'],
        ],
    ],
    'show' => [
        'fields' => [
            'name' => $commonFields['name'],
            'position' => $commonFields['position'],
            'division' => $commonFields['division'],
            'org_id' => $commonFields['org_id'],
            'start_date' => $commonFields['start_date'],
            'finish_date' => $commonFields['finish_date'],
            'active_status' => $commonFields['active_status'],
            'image' => $commonFields['image'],
        ],
    ],
];
