<?php

return [
    'model' => App\Models\Project::class,
    'title' => 'Implementasi',
    'parent' => 'project_id',
    'relationship' => ['deals', 'creator', 'location', 'product'],
    'index' => [
        'tables' => [
            'fields' => [
                'id' => $commonFields['id'],
                'project_reg_no' => $commonFields['project_reg_no'],
                'title' => ['label' => 'Judul Project', 'type' => 'text'],
                'product_id' => $commonFields['product_id'],
                'location_id' => $commonFields['location_id'],
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
            [
                'titleform' => 'Pilih Kesepakatan',
                'fields' => [
                    'deal_id' => $commonFields['deal_id'],
                ],
            ],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'project_reg_no' => $commonFields['project_reg_no'],
                'title' => ['label' => 'Nama Project', 'type' => 'text'],
                'product_id' => $commonFields['product_id'],
                'location_id' => $commonFields['location_id'],
                'amount' => [
                    'label' => 'Nilai Project',
                    'type' => 'currency',
                    'validation' => 'nullable|numeric',
                ],
                'start_date' => $commonFields['start_date'],
                'end_date' => $commonFields['end_date'],
                'deal_id' => $commonFields['deal_id'],
            ],
        ],
    ],
    'relation_show' => [
        'projectactivities' => include('relations/projectactivities.php'),
        'documents' => include('relations/documents.php'),
    ],
];
