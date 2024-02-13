<?php

return [
    'model' => App\Models\OrgMember::class,
    'title' => 'Data Pengurus',
    'relationship' => ['org', 'createdby'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'grids' => [
        'fields' => [
            'name' => $commonFields['name'],
            'position' => $commonFields['position'],
            'division' => $commonFields['division'],
            'org_id' => $commonFields['org_id'],
            'start_date' => $commonFields['start_date'],
            'end_date' => $commonFields['end_date'],
            'member_status' => $commonFields['member_status'],
            'image' => $commonFields['image'],
        ],],
    ],
    'form' => [
        'fields' => [
            'name' => $commonFields['name'],
            'position' => $commonFields['position'],
            'division' => $commonFields['division'],
            'org_id' => $commonFields['org_id'],
            'start_date' => $commonFields['start_date'],
            'end_date' => $commonFields['end_date'],
            'member_status' => $commonFields['member_status'],
            'image' => $commonFields['image'],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'name' => $commonFields['name'],
                'position' => $commonFields['position'],
                'division' => $commonFields['division'],
                'org_id' => $commonFields['org_id'],
                'start_date' => $commonFields['start_date'],
                'end_date' => $commonFields['end_date'],
                'member_status' => $commonFields['member_status'],
                'image' => $commonFields['image'],
            ],
        ],
    ],
];
