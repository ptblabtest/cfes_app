<?php

return [
    'model' => App\Models\Expense::class,
    'title' => 'Biaya',
    'relationship' => ['advance', 'accountitem'],
    'index' => [
        'tables' => [
            'fields' => [
                'expense_reg_no' => $commonFields['expense_reg_no'],
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
            [
                'titleform' => 'Tujuan Biaya',
                'fields' => [
                    'model_type' => $commonFields['model_type'],
                    'model_id' => $commonFields['model_id'],
                    'advance_id' => $commonFields['advance_id'],
                ],
            ],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                 'expense_reg_no' => $commonFields['expense_reg_no'],
                 'date' => $commonFields['date'],
                'account_item_id' => $commonFields['account_item_id'],
                'description' => $commonFields['description'],
                'amount' => [
                    'label' => 'Jumlah Biaya',
                    'type' => 'currency',
                    'validation' => 'nullable|numeric',
                ],
                'model_type' => $commonFields['model_type'],
                'model_id' => $commonFields['model_id'],
                'advance_id' => $commonFields['advance_id'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
];
