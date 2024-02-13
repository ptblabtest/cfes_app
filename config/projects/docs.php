<?php

return [
    'model' => App\Models\Doc::class,
    'title' => 'Kelengkapan Dokumen ISO Thn 1',
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
                'titleform' => 'Penyusunan Informasi & Analisis',
                'subtitleform' => "8.1: Perencanaan Operasional & Pengendalian\n8.2: Penetapan & Tinjauan Persyaratan (NDA)\n8.3: Desain dan Pengembangan Jasa",
                'fields' => [
                    'nda_1' => ['label' => 'NDA', 'type' => 'file'],
                    'analysis_1' => ['label' => 'Analisis: persetujuan pelanggan', 'type' => 'file'],
                    'invoice_1' => ['label' => 'Invoice 1', 'type' => 'file'],
                ],
            ],
            [
                'titleform' => 'Penyusunsan Konsep Rancangan Jasa Lingkungan',
                'subtitleform' => "8.3: Desain dan Pengembangan Jasa\n8.4: Pengendalian Penyedia Eksternal",
                'fields' => [
                    'concept_note' => ['label' => 'Concept Note: persetujuan otoritas', 'type' => 'file'],
                    'invoice_2' => ['label' => 'Invoice 2', 'type' => 'file'],
                ],
            ],
            [
                'titleform' => 'Pengembangan Rencana Penyediaan Jasa Lingkungan',
                'subtitleform' => "8.3: Desain dan Pengembangan Jasa\n8.4: Pengendalian Penyedia Eksternal",
                'fields' => [
                    'plan_note' => ['label' => 'Rencana Jasling', 'type' => 'file'],
                ],
            ],
            [
                'titleform' => 'Pendampingan Rencana Kelola Jasa Lingkungan Partisipatif',
                'subtitleform' => "8.3: Desain dan Penembangan\n8.4: Pengendalian Penvedia Eksternal\n8.5: Penyediaan Jasa",
                'fields' => [
                    'support_note' => ['label' => 'Rencana Kelola Jasa Lingkungan', 'type' => 'file'],
                    'invoice_3' => ['label' => 'Invoice 3', 'type' => 'file'],
                ],
            ],
            [
                'titleform' => 'Pendampingan LPHD dalam Pengelolaan Jasa Lingkungan',
                'subtitleform' => "8.4: Pengendalian Penyedia Eksternal\n8.5: Penvediaan Jasa",
                'fields' => [
                    'first_note' => ['label' => 'Laporan Imbalan Tahun 1', 'type' => 'file'],
                    'invoice_4' => ['label' => 'Invoice 4', 'type' => 'file'],
                ],
            ],
            [
                'titleform' => 'Penyampaian Laporan Tahun 1 Imbalan Jasa Lingkungan.',
                'subtitleform' => "8.6: Penverahan Jasa\n8.7: Pengendalian Ketidaksesuaian",
                'fields' => [
                    'feedback_client' => ['label' => 'Feedback Client', 'type' => 'file'],
                    'invoice_5' => ['label' => 'Invoice 5', 'type' => 'file'],
                ],
            ],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'project_id' => $commonFields['project_id'],
                'nda' => ['label' => 'NDA', 'type' => 'file'],
                'analysis' => ['label' => 'Analysis', 'type' => 'file'],
                'invoice' => ['label' => 'Invoice', 'type' => 'file'],
                'concept_note' => ['label' => 'Concept Note', 'type' => 'file'],
                'plan_note' => ['label' => 'Rencana Jasling', 'type' => 'file'],
                'support_note' => ['label' => 'Rencana Kelola Jasa Lingkungan', 'type' => 'file'],
                'first_note' => ['label' => 'Laporan Imbalan Tahun 1', 'type' => 'file'],
                'feedback_client' => ['label' => 'Feedback Client', 'type' => 'file'],
            ],
        ],
    ],
];
