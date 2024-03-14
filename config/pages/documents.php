<?php

return
    [
        'model' => App\Models\Document::class,
        'title' => 'Dokumen',
        'relationship' => ['creator'],
        'view' => [
            'index' => 'Display/Index/Index',
            'form' => 'Display/Form/Form',
            'show' => 'Display/Show/Show',
        ],
        'index' => [
            'tables' => [
                'fields' => [
                    'title' => [
                        'label' => 'Judul Dokumen',
                        'type' => 'text',
                    ],
                    'doc_type' => $commonFields['doc_type'],
                    'description' => $commonFields['description'],
                    'model_type' => $commonFields['model_type'],
                    'model_id' => $commonFields['model_id'],
                    'created_by' => $commonFields['created_by'],
                ],
            ],
        ],
        'form' => [
            'sections' => [
                [
                    'titleform' => 'Pilih Data',
                    'fields' => [
                        'model_type' => $commonFields['model_type'],
                        'model_id' => $commonFields['model_id'],
                    ],
                ],
                [
                    'titleform' => 'Detail Dokumen',
                    'fields' => [
                        'title' => [
                            'label' => 'Judul Dokumen',
                            'type' => 'text',
                            'validation' => 'nullable|string',
                        ],
                        'doc_type' => $commonFields['doc_type'],
                        'description' => $commonFields['description'],
                    ],
                ],
                [
                    'titleform' => 'Upload Dokumen',
                    'fields' => [
                        'file' => $commonFields['file'],
                    ],
                ],
            ],
        ],
        'show' => [
            'cards' => [
                'fields' => [
                    'model_type' => $commonFields['model_type'],
                    'model_id' => $commonFields['model_id'],
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
