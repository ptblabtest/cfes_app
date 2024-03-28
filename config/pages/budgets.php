<?php

return [
    'model' => App\Models\Budget::class,
    'title' => 'Costing',
    'relationship' => ['creator', 'account'],
    'index' => [
        'tables' => [
            'fields' => [
                'account_id' => $commonFields['account_id'],
                'amount' => [
                    'label' => 'Jumlah Costing',
                    'type' => 'number',
                    'validation' => 'nullable|numeric',
                ],
                'start_date' => $commonFields['start_date'],
                'end_date' => $commonFields['end_date'],
                'model_type' => $commonFields['model_type'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
    'form' => [
        'sections' => [
            [
                'titleform' => 'Detail Costing',
                'fields' => [
                    'start_date' => $commonFields['start_date'],
                    'end_date' => $commonFields['end_date'],
                    'description' => $commonFields['description'],
                    'model_type' => $commonFields['model_type'],
                    'model_id' => $commonFields['model_id'],
                ],
            ],
            [
                'titleform' => 'Jumlah Costing',
                'fields' => [
                    'account_id' => $commonFields['account_id'],
                    'amount' => [
                        'label' => 'Jumlah Costing',
                        'type' => 'number',
                        'validation' => 'nullable|numeric',
                    ],
                ],
            ],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'account_id' => $commonFields['account_id'],
                'amount' => [
                    'label' => 'Jumlah Costing',
                    'type' => 'number',
                    'validation' => 'nullable|numeric',
                ],
                'start_date' => $commonFields['start_date'],
                'end_date' => $commonFields['end_date'],
                'description' => $commonFields['description'],
                'model_type' => $commonFields['model_type'],
                'model_id' => $commonFields['model_id'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
];
