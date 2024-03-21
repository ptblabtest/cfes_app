<?php

return [
    'model' => App\Models\Project::class,
    'title' => 'Implementasi',
    'parent' => 'project_id',
    'relationship' => ['deals', 'creator', 'location'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'tables' => [
            'fields' => [
                'title' => ['label' => 'Judul Project', 'type' => 'text'],
                'product_id' => $commonFields['product_id'],
                'location_id' => $commonFields['location_id'],
                'deal_id' => $commonFields['deal_id'],
                'amount' => [
                    'label' => 'Nilai Project',
                    'type' => 'currency',
                    'validation' => 'nullable|numeric',
                ],
                'start_date' => $commonFields['start_date'],
                'end_date' => $commonFields['end_date'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
    'form' => [
        'sections' => [
            [
                'titleform' => 'Pilih Kesepakatan',
                'fields' => [
                    'deal_id' => $commonFields['deal_id'],
                ],
            ],
            [
                'titleform' => 'Informasi Project',
                'subtitleform' => 'Bagian ini berisi detail mengenai proyek yang sedang atau akan dikerjakan',
                'fields' => [
                    'title' => [
                        'label' => 'Judul Project',
                        'type' => 'text',
                    ],
                    'product_id' => $commonFields['product_id'],
                    'amount' => [
                        'label' => 'Nilai Project',
                        'type' => 'currency',
                        'validation' => 'nullable|numeric',
                    ],
                    'location_id' => $commonFields['location_id'],
                    'start_date' => $commonFields['start_date'],
                    'end_date' => $commonFields['end_date'],
                ],
            ],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'title' => ['label' => 'Nama Project', 'type' => 'text'],
                'deal_id' => $commonFields['deal_id'],
                'amount' => [
                    'label' => 'Nilai Project',
                    'type' => 'currency',
                    'validation' => 'nullable|numeric',
                ],
                'start_date' => $commonFields['start_date'],
                'end_date' => $commonFields['end_date'],
            ],
        ],
    ],
    'relation_show' => [
        'projectactivities' => include('relations/projectactivities.php'),
        'documents' => include('relations/documents.php'),
    ],
];
