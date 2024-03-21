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
                    'file' => $commonFields['file'],
                    'title' => [
                        'label' => 'Judul Dokumen',
                        'type' => 'text',
                    ],
                    'doc_type' => $commonFields['doc_type'],
                    'model_type' => $commonFields['model_type'],
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
                        'description' => [
                            'label' => 'Deskripsi',
                            'type' => 'text',
                            'validation' => 'nullable|string',
                            'smallLabel' => 'Isi penjelasan secara ringkas, deskripsi mengenai dokumen yang anda ingin upload',
                        ],
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
