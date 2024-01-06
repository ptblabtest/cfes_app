<?php

return [
    'class' => App\Models\KuProduct::class,
    'title' => 'KU Products',
    'relationship' => ['kulist'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'fields' => [
            'name' => $commonFields['name'],
            'revenue' => $commonFields['revenue'],
            'ku_id' => $commonFields['ku_id'],
            'description' => $commonFields['description'],
            'image' => $commonFields['image'],
            'tokopedia_url' => $commonFields['tokopedia_url'],
            'shopee_url' => $commonFields['shopee_url'],
        ],
    ],
    'form' => [
        'fields' => [
            'name' => $commonFields['name'],
            'revenue' => $commonFields['revenue'],
            'ku_id' => $commonFields['ku_id'],
            'description' => $commonFields['description'],
            'image' => $commonFields['image'],
            'tokopedia_url' => $commonFields['tokopedia_url'],
            'shopee_url' => $commonFields['shopee_url'],
        ],
    ],
    'show' => [
        'fields' => [
            'name' => $commonFields['name'],
            'revenue' => $commonFields['revenue'],
            'ku_id' => $commonFields['ku_id'],
            'description' => $commonFields['description'],
            'image' => $commonFields['image'],
            'tokopedia_url' => $commonFields['tokopedia_url'],
            'shopee_url' => $commonFields['shopee_url'],
        ],
    ],
];
