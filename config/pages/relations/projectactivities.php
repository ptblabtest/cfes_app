<?php

return [
    'model' => App\Models\ProjectActivity::class,
    'title' => 'Aktivitas Project',
    'entity' => 'projectactivities',
    'query' => true,
    'relationship' => ['project', 'creator'],
    'create' => [
        'url' => '/projectactivities/create',
    ],
    'fields' => [
        'notes' => $commonFields['notes'],
        'project_type' => $commonFields['project_type'],
        'start_date' => $commonFields['start_date'],
        'end_date' => $commonFields['end_date'],
        'created_by' => $commonFields['created_by'],
    ],
];
