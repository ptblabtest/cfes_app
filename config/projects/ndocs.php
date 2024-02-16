<?php

return [
    'model' => App\Models\Ndoc::class,
    'title' => 'Kelengkapan Dokumen ISO - Operasional',
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
                    'project_id' => $commonFields['project_id'],
                    'year' => ['label' => 'Tahun', 'type' => 'text'],
                ],
            ],
            [
                'titleform' => '8.3: Desain dan Pengembangan Jasa',
                'fields' => [
                    'invoice_3' => ['label' => 'Invoice 3', 'type' => 'file'],
                    'coop_2' => ['label' => 'SPK Pendamping', 'type' => 'file'],
                ],
            ],
            [
                'titleform' => '8.4: Pengendalian Penvedia Eksternal',
                'fields' => [
                    'support_note' => ['label' => 'Rencana Kegiatan Pendamping', 'type' => 'file'],
                    'yearly_report1' => ['label' => 'Laporan Imbalan Tahunan', 'type' => 'file'],
                    'yearly_report2' => ['label' => 'Laporan Tahunan', 'type' => 'file'],
                    'invoice_3' => ['label' => 'Invoice 3', 'type' => 'file'],
                ],
            ],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'project_id' => $commonFields['project_id'],
                'year' => ['label' => 'Tahun', 'type' => 'text'],
                'invoice_3' => ['label' => 'Invoice 3', 'type' => 'file'],
                'coop_2' => ['label' => 'SPK Pendamping', 'type' => 'file'],
                'support_note' => ['label' => 'Rencana Kegiatan Pendamping', 'type' => 'file'],
                'yearly_report1' => ['label' => 'Laporan Imbalan Tahunan', 'type' => 'file'],
                'yearly_report2' => ['label' => 'Laporan Tahunan', 'type' => 'file'],
                'invoice_3' => ['label' => 'Invoice 3', 'type' => 'file'],
            ],
        ],
    ],
];
