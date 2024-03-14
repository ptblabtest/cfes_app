<?php

return [
    'model' => App\Models\ApprovalLog::class,
    'title' => 'Log Approval',
    'relationship' => [],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'tables' => [
            'fields' => [
                'model_type' => [
                    'label' => 'Model Type', 'type' => 'model'
                ],
                'model_id' => [
                    'label' => 'Model ID', 'type' => 'text'
                ],
                'status' => [
                    'label' => 'Status', 'type' => 'text'
                ],
                'comment' => [
                    'label' => 'Comment', 'type' => 'text'
                ],
                'log_number' => [
                    'label' => 'Log Number', 'type' => 'text'
                ],
                'approved_by' => [
                    'label' => 'Approved Bu', 'type' => 'text'
                ],
            ],
        ],
    ],
    'form' => [
        'fields' => [
            'model_type' => [
                'label' => 'Model Type', 'type' => 'model'
            ],
            'model_id' => [
                'label' => 'Model ID', 'type' => 'text'
            ],
            'status' => [
                'label' => 'Status', 'type' => 'text'
            ],
            'comment' => [
                'label' => 'Comment', 'type' => 'text'
            ],
            'log_number' => [
                'label' => 'Log Number', 'type' => 'text'
            ],
            'approved_by' => [
                'label' => 'Approved Bu', 'type' => 'text'
            ],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'model_type' => [
                    'label' => 'Model Type', 'type' => 'model'
                ],
                'model_id' => [
                    'label' => 'Model ID', 'type' => 'text'
                ],
                'status' => [
                    'label' => 'Status', 'type' => 'text'
                ],
                'comment' => [
                    'label' => 'Comment', 'type' => 'text'
                ],
                'log_number' => [
                    'label' => 'Log Number', 'type' => 'text'
                ],
                'approved_by' => [
                    'label' => 'Approved By', 'type' => 'text'
                ],
            ],
        ],
    ],
];
