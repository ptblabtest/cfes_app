<?php

return [
    'model' => App\Models\ActReport::class,
    'title' => 'Form Laporan Kegiatan',
    'relationship' => ['createdby', 'project'],
    'view' => [
        'form' => 'Display/Form/Form',
    ],
    'form' => [
        'fields' => [
            'act_file' => $commonFields['act_file'],
        ],
    ],
];
