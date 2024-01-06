<?php

return
    [
        'class' => App\Models\Client::class,
        'title' => 'List Klien',
        'export_fields' =>['name', 'address'],
        'view' => [
            'index' => 'Display/Index/Index',
            'form' => 'Display/Form/Form',
            'show' => 'Display/Show/Show',
        ],
        'index' => [
            'fields' => [
                'name' => $commonFields['name'],
                'address' => $commonFields['address'],
                'phone' => $commonFields['phone'],
                'image' => $commonFields['image'],
            ],
        ],
        'form' =>
        [
            'fields' => [
                'name' => $commonFields['name'],
                'address' => $commonFields['address'],
                'phone' => $commonFields['phone'],
                'image' => $commonFields['image'],
            ],
        ],
        'show' =>
        [
            'fields' => [
                'name' => $commonFields['name'],
                'address' => $commonFields['address'],
                'phone' => $commonFields['phone'],
                'image' => $commonFields['image'],
            ],
        ],
    ];
