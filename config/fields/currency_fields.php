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
        'label' => 'Potensi Pendapatan',
        'type' => 'currency',
        'smallLabel' => 'Estimasi nilai pendapatan dari kesepakatan ini. Isi dalam Rp.',
        'validation' => 'nullable|numeric',
    ],
    'credit' => [
        'label' => 'Credit', 'type' => 'currency'
    ],
];