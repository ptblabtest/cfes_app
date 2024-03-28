<?php

return [
    'model' => App\Models\Advance::class,
    'title' => 'Pengajuan Uang Muka',
    'entity' => 'advances',
    'relationship' => ['creator'],
    'query' => true,
    'isPolymorphic' => true,
    'model_id_field' => 'model_id',
    'model_type_field' => 'model_type',
    'create' => [
        'url' => '/advances/create',
    ],
    'fields' => [
        'advance_reg_no' => $commonFields['advance_reg_no'],
        'amount' => [
            'label' => 'Jumlah PUM',
            'type' => 'number',
        ],
        'description' => $commonFields['description'],
        'created_by' => $commonFields['created_by'],
    ],
];