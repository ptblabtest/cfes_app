<?php

return [

    'class' => App\Models\ClientContact::class,
    'title' => 'Contact Person Client',
    'relationship' => ['client'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'fields' => [
            'name' => $commonFields['name'],
            'email' => $commonFields['email'],
            'phone' => $commonFields['phone'],
            'client_id' => $commonFields['client_id'],
        ],
    ],
    'form' => [
        'fields' => [
            'name' => $commonFields['name'],
            'email' => $commonFields['email'],
            'phone' => $commonFields['phone'],
            'client_id' => $commonFields['client_id'],
        ],
    ],
    'show' => [
        'fields' => [
            'name' => $commonFields['name'],
            'email' => $commonFields['email'],
            'phone' => $commonFields['phone'],
            'client_id' => $commonFields['client_id'],
        ],
    ],

];
