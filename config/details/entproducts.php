<?php

return [
    'model' => App\Models\EntProduct::class,
    'title' => 'Produk KUPS',
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
    ],
    'index' => [
        'grids' => [
            'rowClickAction' => 'modal',
            'fields' => [
                'name' => $commonFields['name'],
                'revenue' => $commonFields['revenue'],
                'ent_id' => $commonFields['ent_id'],
                'description' => $commonFields['description'],
                'tokopedia_url' => $commonFields['tokopedia_url'],
                'shopee_url' => $commonFields['shopee_url'],
                'image' => $commonFields['image'],
            ],
        ],
    ],
    'form' => [
        'fields' => [
            'name' => $commonFields['name'],
            'revenue' => $commonFields['revenue'],
            'ent_id' => $commonFields['ent_id'],
            'description' => $commonFields['description'],
            'tokopedia_url' => $commonFields['tokopedia_url'],
            'shopee_url' => $commonFields['shopee_url'],
            'image' => $commonFields['image'],
        ],
    ],
];
