<?php

return [
    'class' => App\Models\Btor::class,
    'title' => 'BTORs',
    'relationship' => ['location','createdby'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'form' => [
        'fields' => [
            'tor_id' => $commonFields['tor_id'],
            'start_date' => $commonFields['start_date'],
            'end_date' => $commonFields['end_date'],
            'location_id' => $commonFields['location_id'],
            'description' => $commonFields['description'],
            'sch_detail' => $commonFields['sch_detail'],
            'followup' => $commonFields['followup'],
            'image' => $commonFields['image'],
            'file' => $commonFields['file'],
            'cost' => $commonFields['cost'],
        ],
    ],
    'show' => [
        'fields' => [
            'tor_id' => $commonFields['tor_id'],
            'start_date' => $commonFields['start_date'],
            'end_date' => $commonFields['end_date'],
            'location_id' => $commonFields['location_id'],
            'description' => $commonFields['description'],
            'sch_detail' => $commonFields['sch_detail'],
            'followup' => $commonFields['followup'],
            'image' => $commonFields['image'],
            'file' => $commonFields['file'],
            'cost' => $commonFields['cost'],
        ],
    ],
];
