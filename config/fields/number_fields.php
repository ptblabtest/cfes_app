<?php

return [
    'quantity' => [
        'label' => 'Jumlah',
        'type' => 'number',
        'validation' => 'nullable|numeric',
    ],
    'animal_quantity' => [
        'label' => 'Jumlah Satwa',
        'type' => 'number',
        'validation' => 'nullable|numeric',
    ],
    'tool_quantity' => [
        'label' => 'Jumlah Alat Perburuan',
        'type' => 'number',
        'validation' => 'nullable|numeric',
    ],
    'usable_area' => [
        'label' => 'Jumlah Blok Pemanfaatan',
        'smallLabel' => 'Dalam Hektar',
        'type' => 'number',
        'validation' => 'nullable|numeric',
    ],
    'usable_forest_area' => [
        'label' => 'Jumlah Blok Pemanfaatan Berhutan',
        'smallLabel' => 'Dalam Hektar',
        'type' => 'number',
        'validation' => 'nullable|numeric',
    ],
    'protected_area' => [
        'label' => 'Jumlah Blok Perlindungan',
        'smallLabel' => 'Dalam Hektar',
        'type' => 'number',
        'validation' => 'nullable|numeric',
    ],
    'tree_count' => [
        'label' => 'Jumlah Pohon Ditanam',
        'smallLabel' => 'Jumlah Pohon di Hutan yang Dipilih',
        'type' => 'number',
        'validation' => 'nullable|numeric',
    ],
    'carbon_stock' => [
        'label' => 'Jumlah Stok Karbon',
        'smallLabel' => 'Dalam ton C, Isi Jika Ada',
        'type' => 'number',
        'validation' => 'nullable|numeric',
    ],
    'village_area' => [
        'label' => 'Jumlah Area Desa',
        'smallLabel' => 'Isi dalam Hektar',
        'type' => 'number',
        'validation' => 'nullable|numeric',
    ],
    'male_population' => [
        'label' => 'Jumlah Penerima Manfaat Laki-laki',
        'type' => 'number',
        'validation' => 'nullable|numeric',
    ],
    'female_population' => [
        'label' => 'Jumlah Penerima Manfaat Perempuan',
        'type' => 'number',
        'validation' => 'nullable|numeric',
    ],
];
