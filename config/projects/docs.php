<?php

return [
    'model' => App\Models\Doc::class,
    'title' => 'Kelengkapan Dokumen ISO - Persiapan',
    'relationship' => ['project'],
    'view' => [
        'index' => 'Display/Index/Index',
        'form' => 'Display/Form/Form',
        'show' => 'Display/Show/Show',
    ],
    'index' => [
        'tables' => [
            'fields' => [
                'project_id' => $commonFields['project_id'],
                'progress' => ['label' => 'Progress'],
                'last_docs' => ['label' => 'Upload File Terakhir'],
                'created_by' => $commonFields['created_by'],
            ],
        ],
    ],
    'form' => [
        'sections' => [
            [
                'titleform' => 'Pilih Project',
                'fields' => [
                    'project_id' => $commonFields['project_id']
                ],
            ],
            [
                'titleform' => '8.1: Perencanaan Operasional & Pengendalian',
                'fields' => [
                    'luca' => ['label' => 'LUCA', 'type' => 'file'],
                ],
            ],
            [
                'titleform' => '8.2 Penetapan & Tinjauan Persyaratan',
                'fields' => [
                    'nda_1' => ['label' => 'NDA', 'type' => 'file'],
                    'invoice_1' => ['label' => 'Invoice 1', 'type' => 'file'],
                ],
            ],
            [
                'titleform' => '8.3: Desain dan Pengembangan Jasa',
                'fields' => [
                    'concept_note' => ['label' => 'Concept Note: persetujuan otoritas', 'type' => 'file'],
                    'coop_1' => ['label' => 'Surat Perjanjian Kerjasama (SPK)', 'type' => 'file'],
                    'invoice_2' => ['label' => 'Invoice 2', 'type' => 'file'],
                    'comp_plan' => ['label' => 'Compensation Plan', 'type' => 'file'],
                    'fpic' => ['label' => 'FPIC', 'type' => 'file'],
                ],
            ],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'project_id' => $commonFields['project_id'],
                'luca' => ['label' => 'LUCA', 'type' => 'file'],
                'nda_1' => ['label' => 'NDA', 'type' => 'file'],
                'invoice_1' => ['label' => 'Invoice 1', 'type' => 'file'],
                'concept_note' => ['label' => 'Concept Note: persetujuan otoritas', 'type' => 'file'],
                'coop_1' => ['label' => 'Surat Perjanjian Kerjasama (SPK)', 'type' => 'file'],
                'invoice_2' => ['label' => 'Invoice 2', 'type' => 'file'],
                'comp_plan' => ['label' => 'Compensation Plan', 'type' => 'file'],
                'fpic' => ['label' => 'FPIC', 'type' => 'file'],
            ],
        ],
    ],
];
