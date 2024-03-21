<?php

return [
    'model' => App\Models\Document::class,
    'title' => 'Dokumen',
    'entity' => 'documents',
    'relationship' => ['creator'],
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
];