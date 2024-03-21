<?php

return [
    'model' => App\Models\Deal::class,
    'title' => 'Calon Transaksi',
    'entity' => 'deals',
    'relationship' => ['creator', 'lead', 'customer'],
    'query' => true,
    'create' => [
        'url' => '/deals/create',
    ],
    'fields' => [
        'customer_id' => $commonFields['customer_id'],
        'potential_revenue' => $commonFields['potential_revenue'],
        'expected_close_date' => $commonFields['expected_close_date'],
        'description' => $commonFields['description'],
        'created_by' => $commonFields['created_by'],
    ],
];