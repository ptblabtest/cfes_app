<?php

return
    [
        'model' => App\Models\ProjectActivity::class,
        'title' => 'Aktivitas Project',
        'relationship' => ['project', 'creator'],
        'view' => [
            'index' => 'Display/Index/Index',
            'form' => 'Display/Form/Form',
            'show' => 'Display/Show/Show',
        ],
        'index' => [
            'tables' => [
                'fields' => [
                    'project_id' => $commonFields['project_id'],
                    'project_type' => $commonFields['project_type'],
                    'notes' => $commonFields['notes'],
                    'date' => $commonFields['date'],
                    'created_by' => $commonFields['created_by'],
                ],
            ],
        ],
        'form' => [
            'fields' => [
                'project_id' => $commonFields['project_id'],
                'project_type' => $commonFields['project_type'],
                'notes' => $commonFields['notes'],
                'date' => $commonFields['date'],
            ],
        ],
        'show' => [
            'cards' => [
                'fields' => [
                    'project_id' => $commonFields['project_id'],
                    'project_type' => $commonFields['project_type'],
                    'notes' => $commonFields['notes'],
                    'date' => $commonFields['date'],
                    'created_by' => $commonFields['created_by'],
                ],
            ],
        ],
        'relation_show' => [
            'expenses' => [
                'model' => App\Models\Expense::class,
                'title' => 'Biaya Project',
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
            ],
            'documents' => [
                'model' => App\Models\Document::class,
                'title' => 'Dokumen',
                'entity' => 'documents',
                'query' => true,
                'isPolymorphic' => true,
                'model_id_field' => 'model_id',
                'model_type_field' => 'model_type',
                'create' => [
                    'url' => '/documents/create',
                ],
                'fields' => [
                    'title' => [
                        'label' => 'Judul Dokumen',
                        'type' => 'text',
                    ],
                    'doc_type' => $commonFields['doc_type'],
                    'description' => $commonFields['description'],
                    'file' => $commonFields['file'],
                    'created_by' => $commonFields['created_by'],
                ],
            ],
        ],
    ];
