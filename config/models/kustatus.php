<?php

return [
    'class' => App\Models\KuStatus::class,
    'title' => 'KU Status',
    'relationship' => ['kulist', 'grouptype', 'kupsclass'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'fields' => [
            'ku_id' => $commonFields['ku_id'],
            'group_type' => $commonFields['group_type'],
            'kups_class' => $commonFields['kups_class'],
            'sk_number' => $commonFields['sk_number'],
            'file' => $commonFields['file'],
        ],
    ],
    'form' => [
        'fields' => [
            'ku_id' => $commonFields['ku_id'],
            'group_type' => $commonFields['group_type'],
            'kups_class' => $commonFields['kups_class'],
            'sk_number' => $commonFields['sk_number'],
            'file' => $commonFields['file'],
        ],
    ],
    'show' => [
        'fields' => [
            'ku_id' => $commonFields['ku_id'],
            'group_type' => $commonFields['group_type'],
            'kups_class' => $commonFields['kups_class'],
            'sk_number' => $commonFields['sk_number'],
            'file' => $commonFields['file'],
        ],
    ],
];
