<?php

return [
    'model' => App\Models\Project::class,
    'title' => 'Proyek',
    'parent' => 'project_id',
    'relationship' => ['deals', 'creator'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'tables' => [
            'fields' => [
                'title' => ['label' => 'Judul Proyek', 'type' => 'text'],
                'deal_id' => $commonFields['deal_id'],
                'amount' => [
                    'label' => 'Nilai Project',
                    'type' => 'currency',
                    'validation' => 'nullable|numeric',
                ],
                'start_date' => $commonFields['start_date'],
                'expected_close_date' => $commonFields['expected_close_date'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
    'form' => [
        'sections' => [
            [
                'titleform' => 'Pilih Prospek',
                'fields' => [
                    'deal_id' => $commonFields['deal_id'],
                ],
            ],
            [
                'titleform' => 'Informasi Proyek',
                'subtitleform' => 'Bagian ini berisi detail mengenai proyek yang sedang atau akan dikerjakan',
                'fields' => [
                    'title' => [
                        'label' => 'Judul Proyek',
                        'type' => 'text',
                    ],
                    'amount' => [
                        'label' => 'Nilai Project',
                        'type' => 'currency',
                        'validation' => 'nullable|numeric',
                    ],
                    'start_date' => $commonFields['start_date'],
                    'expected_close_date' => $commonFields['expected_close_date'],
                ],
            ],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'title' => ['label' => 'Nama Proyek', 'type' => 'text'],
                'deal_id' => $commonFields['deal_id'],
                'start_date' => $commonFields['start_date'],
                'end_date' => $commonFields['end_date'],
            ],
        ],
    ],
    'relation_show' => [
        'projectactivities' => [
            'model' => App\Models\ProjectActivity::class,
            'title' => 'Aktivitas Project',
            'entity' => 'projectactivities',
            'query' => true,
            'relationship' => ['project', 'creator'],
            'create' => [
                'url' => '/projectactivities/create',
            ],
            'fields' => [
                'project_type' => $commonFields['project_type'],
                'notes' => $commonFields['notes'],
                'date' => $commonFields['date'],
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
