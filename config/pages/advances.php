<?php

return [
    'model' => App\Models\Advance::class,
    'title' => 'Pengajuan Uang Muka',
    'relationship' => ['creator'],
    'index' => [
        'tables' => [
            'fields' => [
                'advance_reg_no' => $commonFields['advance_reg_no'],
                'description' => $commonFields['description'],
                'amount' => [
                    'label' => 'Jumlah PUM',
                    'type' => 'currency',
                ],
                'expenses_total' => ['label' => 'Total PJUM', 'type' => 'currency'],
                'model_type' => $commonFields['model_type'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
    'form' => [
        'sections' => [
            [
                'titleform' => 'Detail PUM',
                'fields' => [
                    'amount' => [
                        'label' => 'Jumlah PUM',
                        'type' => 'number',
                    ],
                    'description' => $commonFields['description'],
                ],
            ],
            [
                'titleform' => 'Tujuan Advance',
                'fields' => [
                    'model_type' => $commonFields['model_type'],
                    'model_id' => $commonFields['model_id'],
                ],
            ],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'advance_reg_no' => $commonFields['advance_reg_no'],
                'amount' => [
                    'label' => 'Jumlah PUM',
                    'type' => 'number',
                ],
                'description' => $commonFields['description'],
                'model_type' => $commonFields['model_type'],
                'model_id' => $commonFields['model_id'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
];
