<?php

return [
    'model' => App\Models\ApprovalLog::class,
    'title' => 'Log Approval',
    'relationship' => [],
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
                    'label' => 'Approved By', 'type' => 'text'
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
                'label' => 'Approved By', 'type' => 'text'
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
