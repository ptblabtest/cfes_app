<?php

return [
    'model' => App\Models\Document::class,
    'title' => 'Dokumen',
    'relationship' => ['creator'],
    'index' => [
        'tables' => [
            'fields' => [
                'id' => $commonFields['id'],
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
                        'type' => 'textarea',
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
            [
                'titleform' => 'Pilih Data',
                'fields' => [
                    'model_type' => $commonFields['model_type'],
                    'model_id' => $commonFields['model_id'],
                ],
            ],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'title' => [
                    'label' => 'Judul Dokumen',
                    'type' => 'text',
                ],
                'doc_type' => $commonFields['doc_type'],
                'description' => $commonFields['description'],
                'file' => $commonFields['file'],
                'model_type' => $commonFields['model_type'],
                'model_id' => $commonFields['model_id'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
];
