<?php

return [
    'class' => App\Models\Project::class,
    'title' => 'Tabel Project',
    'relationship' => ['projecttype', 'createdby'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'fields' => [
            'id' => [
                'label' => 'id',
            ],
            'name' => $commonFields['name'],
            'project_type' => $commonFields['project_type'],
            'tor_id' => $commonFields['tor_id'],
            'created_by' => $commonFields['created_by'],
            'project_status' => $commonFields['project_status'],
        ],
    ],
    'form' => [
        'fields' => [
            'name' => $commonFields['name'],
            'description' => $commonFields['description'],
            'project_type' => $commonFields['project_type'],
        ],
    ],
    'show' => [
        'fields' => [
            'name' => $commonFields['name'],
            'description' => $commonFields['description'],
            'project_type' => $commonFields['project_type'],
            'project_status' => $commonFields['project_status'],
        ],
    ],
];
