<?php


return [
    'image' => [
        'label' => 'Foto',
        'type' => 'image',
        'validation' => 'image|max:2048',
    ],
    'pp_image' => [
        'label' => 'Foto Diri',
        'type' => 'image',
        'validation' => 'image|max:2048',
    ],
    'tor_file' => [
        'label' => 'Lampiran TOR',
        'type' => 'file',
        'smallLabel' => 'Upload file PDF, Word, Excel',
    ],
    'budget_file' => [
        'label' => 'Lampiran PUM',
        'type' => 'file',
        'smallLabel' => 'Upload file PDF, Word, Excel',
    ],
    'btor_file' => [
        'label' => 'Lampiran BTOR',
        'type' => 'file',
        'smallLabel' => 'Upload file PDF atau Excel',
    ],
    'cost_file' => [
        'label' => 'Lampiran PJUM',
        'type' => 'file',
        'smallLabel' => 'Upload file PDF atau Excel',
    ],
    'act_file' => [
        'label' => 'Lampiran Laporan Aktifitas',
        'type' => 'file',
        'smallLabel' => 'Upload file PDF atau Excel',
    ],
    'org_file' => [
        'label' => 'Lampiran SK LPHD',
        'type' => 'file',
        'smallLabel' => 'Upload file PDF atau Excel',
    ],
    'article_file' => [
        'label' => 'Lampiran Artikel',
        'type' => 'file',
        'smallLabel' => 'Upload file PDF atau Word',
    ],
];
