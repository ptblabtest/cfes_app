<?php

return [
    'model_type' => [
        'label' => 'Tipe Data',
        'type' => 'model',
        'smallLabel' => 'Otomatis terisi, tidak perlu diisi lagi',
        'options' => [
            ['value' => 'App\\Models\\ProjectActivity', 'label' => 'Implementasi'],
            ['value' => 'App\\Models\\SalesActivity', 'label' => 'Kesepakatan'],
        ],
    ],
    'model_id' => [
        'label' => 'Model ID',
        'type' => 'text',
        'background' => 'bg-gray-200',
        'smallLabel' => 'Otomatis terisi, tidak perlu diisi lagi'
    ],
];