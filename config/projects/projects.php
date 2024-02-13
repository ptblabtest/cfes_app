<?php

return [
    'model' => App\Models\Project::class,
    'title' => 'Project',
    'relationship' => ['createdby', 'location', 'client', 'pmanager', 'approver'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'tables' => [
            'fields' => [
                'title' => $commonFields['title'],
                'sales_type' => $commonFields['sales_type'],
                'client_id' => $commonFields['client_id'],
                'location_id' => $commonFields['location_id'],
                'amount' => $commonFields['amount'],
                'approval_status' => $commonFields['approval_status'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
    'form' => [
        'fields' => [
            'title' => $commonFields['title'],
            'client_id' => $commonFields['client_id'],
            'location_id' => $commonFields['location_id'],
            'sales_type' => $commonFields['sales_type'],
            'amount' => $commonFields['amount'],
            'pmanager' => $commonFields['pmanager'],
            'approver' => $commonFields['approver'],
            'start_date' => $commonFields['start_date'],
            'end_date' => $commonFields['end_date'],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'title' => $commonFields['title'],
                'client_id' => $commonFields['client_id'],
                'location_id' => $commonFields['location_id'],
                'sales_type' => $commonFields['sales_type'],
                'amount' => $commonFields['amount'],
                'pmanager' => $commonFields['pmanager'],
                'approver' => $commonFields['approver'],
                'start_date' => $commonFields['start_date'],
                'end_date' => $commonFields['end_date'],
            ],
        ],
    ],
];
