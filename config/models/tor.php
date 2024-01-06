<?php

return [
    'class' => App\Models\Tor::class,
    'title' => 'Terms of Reference',
    'relationship' => ['location', 'createdby', 'projecttype'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/RelationShow',
    ],
    'index' => [
        'fields' => [
            'title' => $commonFields['title'],
            'project_type' => $commonFields['project_type'],
            'start_date' => $commonFields['start_date'],
            'end_date' => $commonFields['end_date'],
            'location_id' => $commonFields['location_id'],
            'project_status' => $commonFields['project_status'],
            'created_by' => $commonFields['created_by'],
        ],
    ],
    'form' => [
        'fields' => [
            'title' => $commonFields['title'],
            'project_type' => $commonFields['project_type'],
            'start_date' => $commonFields['start_date'],
            'end_date' => $commonFields['end_date'],
            'location_id' => $commonFields['location_id'],
            'background' => $commonFields['background'],
            'purpose' => $commonFields['purpose'],
            'output' => $commonFields['output'],
            'result' => $commonFields['result'],
            'activity' => $commonFields['activity'],
            'budget' => $commonFields['budget'],
        ],
    ],
    'show' => [
        'fields' => [
            'id' => [
                'type' => 'text',
                'label' => 'ID'
            ],
            'start_date' => $commonFields['start_date'],
            'end_date' => $commonFields['end_date'],
            'location_id' => $commonFields['location_id'],
            'background' => $commonFields['background'],
            'purpose' => $commonFields['purpose'],
            'output' => $commonFields['output'],
            'result' => $commonFields['result'],
            'activity' => $commonFields['activity'],
            'budget' => $commonFields['budget'],
        ],
    ],
    'relation_show' =>[
        'relation' => 'btor',
        'create' => [
            'url' => '/btor/create?tor_id=',
            'label' => 'Create Btor',
        ],
        'fields' => [
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
