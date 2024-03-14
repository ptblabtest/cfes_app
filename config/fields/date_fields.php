<?php

return [
    'date' => [
        'label' => 'Tanggal',
        'type' => 'date',
        'validation' => 'nullable|string',
    ],
    'start_date' => [
        'label' => 'Tanggal Mulai',
        'type' => 'date',
        'validation' => 'nullable|string',
    ],
    'end_date' => [
        'label' => 'Tanggal Selesai',
        'type' => 'date',
        'validation' => 'nullable|string',
    ],
    'expected_close_date' => [
        'label' => 'Tanggal Penutupan yang Diharapkan',
        'type' => 'date',
        'smallLabel' => 'Tanggal di mana kesepakatan/project ini diharapkan selesai.',
        'validation' => 'nullable|string',
    ],
];
