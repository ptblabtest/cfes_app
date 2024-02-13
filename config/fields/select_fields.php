<?php

return [
    'forest_legal' => [
        'label' => 'Kategori Hutan',
        'smallLabel' => 'Kategori Hutan HD / HA',
        'type' => 'select',
        'options' => [
            ['value' => 'Hutan Desa', 'label' => 'Hutan Desa'],
            ['value' => 'Hutan Adat', 'label' => 'Hutan Adat'],
        ],
    ],
    'cites_id' => [
        'label' => 'Kategori CITES',
        'type' => 'select',
        'options' => [
            ['value' => 'N/A', 'label' => 'N/A'],
            ['value' => 'Appendix I', 'label' => 'Appendix I'],
            ['value' => 'Appendix II', 'label' => 'Appendix II'],
            ['value' => 'Appendix III', 'label' => 'Appendix III'],
        ],
    ],
    'iucn_id' => [
        'label' => 'Kategori IUCN',
        'type' => 'select',
        'options' => [
            ['value' => 'EX', 'label' => 'Punah'],
            ['value' => 'EW', 'label' => 'Punah di Alam Liar'],
            ['value' => 'CR', 'label' => 'Sangat Terancam'],
            ['value' => 'EN', 'label' => 'Terancam'],
            ['value' => 'VU', 'label' => 'Rentan'],
            ['value' => 'NT', 'label' => 'Hampir Terancam'],
            ['value' => 'LC', 'label' => 'Risiko Rendah/Kurang Prihatin'],
            ['value' => 'DD', 'label' => 'Data Kurang'],
            ['value' => 'NE', 'label' => 'Belum Dievaluasi'],
        ],
    ],
    'kups_class' => [
        'label' => 'Kelas KUPS',
        'type' => 'select',
        'options' => [
            ['value' => 'Non Kups', 'label' => 'Non Kups'],
            ['value' => 'Blue', 'label' => 'Blue'],
            ['value' => 'Silver', 'label' => 'Silver'],
            ['value' => 'Gold', 'label' => 'Gold'],
            ['value' => 'Platinum', 'label' => 'Platinum'],
        ],
    ],
    'ent_type' => [
        'label' => 'Bentuk Kelompok',
        'type' => 'select',
        'options' => [
            ['value' => 'Koperasi', 'label' => 'Koperasi'],
            ['value' => 'LPHD', 'label' => 'LPHD'],
            ['value' => 'Kelompok Usaha', 'label' => 'Kelompok Usaha'],
        ],
    ],
    'org_type' => [
        'label' => 'Kategori Kelembagaan',
        'type' => 'select',
        'options' => [
            ['value' => 'LPHD', 'label' => 'LPHD'],
            ['value' => 'KPHA', 'label' => 'KPHA'],
        ],
    ],
    'project_status' => [
        'label' => 'Status Proyek',
        'type' => 'select',
        'options' => [
            ['value' => 'draft', 'label' => 'Draft'],
            ['value' => 'ongoing', 'label' => 'Ongoing'],
            ['value' => 'finished', 'label' => 'Finished'],
        ],
    ],
    'project_type' => [
        'label' => 'Tipe Aktivitas',
        'type' => 'select',
        'options' => [
            ['value' => 'Pelatihan', 'label' => 'Pelatihan'],
            ['value' => 'Kunjungan', 'label' => 'Kunjungan'],
        ],
    ],
    'finding_type' => [
        'label' => 'Tipe Temuan',
        'type' => 'select',
        'options' => [
            ['value' => 'Cakaran', 'label' => 'Cakaran'],
            ['value' => 'Jejak Kaki', 'label' => 'Jejak Kaki'],
            ['value' => 'Kubangan', 'label' => 'Kubangan'],
            ['value' => 'Melihat', 'label' => 'Melihat'],
            ['value' => 'Sarang', 'label' => 'Sarang'],
            ['value' => 'Suara', 'label' => 'Suara'],
            ['value' => 'Tanda Lainnya', 'label' => 'Tanda Lainnya'],
        ],
    ],
    'boundary_type' => [
        'label' => 'Tipe Batas',
        'type' => 'select',
        'options' => [
            ['value' => 'Patok Batas', 'label' => 'Patok Batas'],
            ['value' => 'Plang', 'label' => 'Plang'],
        ],
    ],
    'age_type' => [
        'label' => 'Tipe Umur Temuan',
        'type' => 'select',
        'options' => [
            ['value' => 'Temuan Baru', 'label' => 'Temuan Baru'],
            ['value' => 'Temuan Lama', 'label' => 'Temuan Lama'],
        ],
    ],
    'unit' => [
        'label' => 'Unit',
        'type' => 'select',
        'options' => [
            ['value' => 'Batang', 'label' => 'Batang'],
            ['value' => 'cm', 'label' => 'cm'],
            ['value' => 'Pohon', 'label' => 'Pohon'],
        ],
    ],
    'usage' => [
        'label' => 'Kegunaan',
        'type' => 'select',
        'options' => [
            ['value' => 'Pohon Kayu', 'label' => 'Pohon Kayu'],
            ['value' => 'Tumbuhan Hias', 'label' => 'Tumbuhan Hias'],
            ['value' => 'Tumbuhan Obat', 'label' => 'Tumbuhan Obat'],
        ],
    ],
    'permit_type' => [
        'label' => 'Jenis Izin',
        'type' => 'select',
        'options' => [
            ['value' => 'Izin', 'label' => 'Izin'],
            ['value' => 'Tanpa Izin', 'label' => 'Tanpa Izin'],
        ],
    ],
    'project_target' => [
        'label' => 'Tujuan Project',
        'type' => 'select',
        'options' => [
            ['value' => 'RKT', 'label' => 'RKT'],
            ['value' => 'Operasional CFES', 'label' => 'Operasional CFES'],
            ['value' => 'Fasilitator', 'label' => 'Fasilitator'],
        ],
    ],
    'sales_type' => [
        'label' => 'Jenis Produk',
        'type' => 'select',
        'options' => [
            ['value' => 'RaCP', 'label' => 'RaCP'],
            ['value' => 'Biodiversity Offset', 'label' => 'Biodiversity Offset'],
            ['value' => 'Carbon Credit', 'label' => 'Carbon Credit'],            
        ],
    ],
];

