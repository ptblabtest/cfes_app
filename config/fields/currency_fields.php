<?php


return[
    'revenue' => [
        'label' => 'Omset',
        'type' => 'currency',
        'smallLabel' => 'Dalam Rupiah',
        'validation' => 'nullable|numeric',
    ],
    'budget' => [
        'label' => 'Budget',
        'type' => 'currency',
        'validation' => 'nullable|numeric',
    ],
    'cost' => [
        'label' => 'Cost',
        'type' => 'currency',
        'validation' => 'nullable|numeric',
    ],
    'potential_revenue' => [
        'label' => 'Pendapatan Potensial',
        'type' => 'currency',
        'smallLabel' => 'Estimasi nilai pendapatan dari kesepakatan ini',
        'validation' => 'nullable|numeric',
    ],
];