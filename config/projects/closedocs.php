<?php

return [
    'model' => App\Models\Closedoc::class,
    'title' => 'Kelengkapan Dokumen ISO - Penutupan',
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
                'titleform' => '8.5: Penyediaan Jasa',
                'fields' => [
                    'close_report' => ['label' => 'Laporan Sisa Dana Imbal Jasa Lingkungan', 'type' => 'file'],
                ],
            ],
            [
                'titleform' => '8.6: Penyerahan Jasa',
                'fields' => [
                    'submit_report' => ['label' => 'Laporan Penyerahan', 'type' => 'file'],
                ],
            ],
            [
                'titleform' => '8.7 Pengendalian Ketidaksesuaian',
                'fields' => [
                    'correct_report' => ['label' => 'Laporan Mitigasi / Corrective Action', 'type' => 'file'],
                    'action_report' => ['label' => 'Laporan Pengananan Keluhan', 'type' => 'file'],
                    'invoice_4' => ['label' => 'Invoice 4', 'type' => 'file'],
                    'invoice_5' => ['label' => 'Invoice 5', 'type' => 'file'],
                ],
            ],
        ],
    ],
    'show' => [
        'cards' => [
            'fields' => [
                'project_id' => $commonFields['project_id'],
                'close_report' => ['label' => 'Laporan Sisa Dana Imbal Jasa Lingkungan', 'type' => 'file'],
                'submit_report' => ['label' => 'Laporan Penyerahan', 'type' => 'file'],
                'correct_report' => ['label' => 'Laporan Mitigasi / Corrective Action', 'type' => 'file'],
                'action_report' => ['label' => 'Laporan Pengananan Keluhan', 'type' => 'file'],
                'invoice_4' => ['label' => 'Invoice 4', 'type' => 'file'],
                'invoice_5' => ['label' => 'Invoice 5', 'type' => 'file'],
            ],
        ],
    ],
];
