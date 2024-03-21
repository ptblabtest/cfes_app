<?php

return [
    'model' => App\Models\Expense::class,
    'title' => 'Biaya Sales',
    'entity' => 'expenses',
    'relationship' => ['accountitem', 'creator'],
    'query' => true,
    'isPolymorphic' => true,
    'model_id_field' => 'model_id',
    'model_type_field' => 'model_type',
    'create' => [
        'url' => '/expenses/create',
    ],
    'fields' => [
        'account_item_id' => $commonFields['account_item_id'],
        'description' => $commonFields['description'],
        'amount' => [
            'label' => 'Jumlah Biaya',
            'type' => 'currency',
            'validation' => 'nullable|numeric',
        ],
        'date' => $commonFields['date'],
        'advance_id' => $commonFields['advance_id'],
        'created_by' => $commonFields['created_by'],
    ],
];