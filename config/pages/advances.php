<?php

return
    [
        'model' => App\Models\Advance::class,
        'title' => 'Pengajuan Uang Muka',
        'relationship' => ['creator'],
        'view' => [
            'index' => 'Display/Index/Index',
            'form' => 'Display/Form/Form',
            'show' => 'Display/Show/Show',
        ],
        'index' => [
            'tables' => [
                'fields' => [
                    'advance_number' => $commonFields['advance_number'],
                    'amount' => [
                        'label' => 'Jumlah PUM',
                        'type' => 'currency',
                    ],
                    'description' => $commonFields['description'],
                    'model_type' => $commonFields['model_type'],
                    'expenses_total' => ['label' => 'Total Biaya', 'type' => 'currency'],
                    'created_by' => $commonFields['created_by'],
                ],
            ],
        ],
        'form' => [
            'sections' => [
                [
                    'titleform' => 'Detail PUM',
                    'fields' => [
                        'advance_number' => $commonFields['advance_number'],
                        'amount' => [
                            'label' => 'Jumlah PUM',
                            'type' => 'number',
                        ],
                        'description' => $commonFields['description'],
                        'model_type' => $commonFields['model_type'],
                        'model_id' => $commonFields['model_id'],
                    ],
                ],
            ],
        ],
        'show' => [
            'cards' => [
                'fields' => [
                    'advance_number' => $commonFields['advance_number'],
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
