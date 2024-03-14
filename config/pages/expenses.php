<?php

return
    [
        'model' => App\Models\Expense::class,
        'title' => 'Biaya',
        'relationship' => ['advance', 'accountitem'],
        'view' => [
            'index' => 'Display/Index/Index',
            'form' => 'Display/Form/Form',
            'show' => 'Display/Show/Show',
        ],
        'index' => [
            'tables' => [
                'fields' => [
                    'account_item_id' => $commonFields['account_item_id'],
                    'amount' => [
                        'label' => 'Jumlah Biaya',
                        'type' => 'currency',
                    ],
                    'date' => $commonFields['date'],
                    'model_type' => $commonFields['model_type'],
                    'created_by' => $commonFields['created_by'],
                ],
            ],
        ],
        'form' => [
            'sections' => [
                [
                    'titleform' => 'Tujuan Biaya',
                    'fields' => [
                        'model_type' => $commonFields['model_type'],
                        'model_id' => $commonFields['model_id'],
                        'advance_id' => $commonFields['advance_id'],
                    ],
                ],
                [
                    'titleform' => 'Biaya',
                    'fields' => [
                        'date' => $commonFields['date'],
                        'account_item_id' => $commonFields['account_item_id'],
                        'description' => $commonFields['description'],
                        'amount' => [
                            'label' => 'Jumlah Biaya',
                            'type' => 'currency',
                            'validation' => 'nullable|numeric',
                        ],
                    ],
                ],
            ],
        ],
        'show' => [
            'cards' => [
                'fields' => [
                    'account_item_id' => $commonFields['account_item_id'],
                    'amount' => [
                        'label' => 'Jumlah Biaya',
                        'type' => 'currency',
                        'validation' => 'nullable|numeric',
                    ],
                    'date' => $commonFields['date'],
                    'description' => $commonFields['description'],
                    'model_type' => $commonFields['model_type'],
                    'model_id' => $commonFields['model_id'],
                    'advance_id' => $commonFields['advance_id'],
                    'created_by' => $commonFields['created_by'],
                ],
            ],
        ],
    ];
