<?php

return
    [
        'model' => App\Models\SalesActivity::class,
        'title' => 'Aktivitas Penjualan',
        'relationship' => ['deals', 'creator'],
        'view' => [
            'index' => 'Display/Index/Index',
            'form' => 'Display/Form/Form',
            'show' => 'Display/Show/Show',
        ],
        'index' => [
            'tables' => [
                'fields' => [
                    'deal_id' => $commonFields['deal_id'],
                    'sales_type' => $commonFields['sales_type'],
                    'notes' => $commonFields['notes'],
                    'date' => $commonFields['date'],
                    'created_by' => $commonFields['created_by'],
                ],
            ],
        ],
        'form' => [
            'fields' => [
                'deal_id' => $commonFields['deal_id'],
                'sales_type' => $commonFields['sales_type'],
                'notes' => $commonFields['notes'],
                'date' => $commonFields['date'],
            ],
        ],
        'show' => [
            'cards' => [
                'fields' => [
                    'deal_id' => $commonFields['deal_id'],
                    'sales_type' => $commonFields['sales_type'],
                    'notes' => $commonFields['notes'],
                    'date' => $commonFields['date'],
                    'created_by' => $commonFields['created_by'],
                ],
            ],
        ],
    ];
