<?php

return [
    'longitude' => [
        'label' => 'Koordinat X',
        'type' => 'text',
        'smallLabel' => 'Longitude'
    ],
    'latitude' => [
        'label' => 'Koordinat Y',
        'type' => 'text',
        'smallLabel' => 'Latitude'
    ],
    'approval_status' => [
        'label' => 'Status Project',
        'type' => 'text',
    ],
    'marker_number' => [
        'label' => 'Nomor Patok Batas',
        'type' => 'text',
    ],
    'sk_number' => [
        'label' => 'Nomor SK',
        'type' => 'text',
        'smallLabel' => 'Nomor SK',
        'validation' => 'nullable|string',
    ],
    'title' => [
        'label' => 'Judul',
        'type' => 'text',
        'validation' => 'nullable|string',
    ],
    'position' => [
        'label' => 'Posisi',
        'type' => 'text',
        'validation' => 'nullable|string',
    ],
    'division' => [
        'label' => 'Divisi',
        'type' => 'text',
        'validation' => 'nullable|string',
    ],
    'name' => [
        'label' => 'Nama',
        'type' => 'text',
        'validation' => 'nullable|string',
    ],
    'species_name' => [
        'label' => 'Nama Species',
        'type' => 'text',
        'validation' => 'nullable|string',
    ],
    'birth_place' => [
        'label' => 'Tempat Lahir',
        'type' => 'text',
        'validation' => 'nullable|string',
    ],
    'tool_name' => [
        'label' => 'Nama Alat Perburuan',
        'type' => 'text',
        'validation' => 'nullable|string',
    ],
    'forest_name' => [
        'label' => 'Nama Hutan',
        'type' => 'text',
        'validation' => 'nullable|string',
    ],
    'village_name' => [
        'label' => 'Nama Desa',
        'type' => 'text',
        'validation' => 'nullable|string',
    ],
    'phone' => [
        'label' => 'Telepon',
        'type' => 'text'
    ],
    'email' => [
        'label' => 'Email',
        'type' => 'text',
        'validation' => 'nullable|email'
    ],
    'key' => [
        'label' => 'Key',
        'type' => 'text',
        'validation' => 'nullable|email'
    ],
    'value' => [
        'label' => 'Value',
        'type' => 'text',
        'validation' => 'nullable|email'
    ],
    'label' => [
        'label' => 'Label',
        'type' => 'text',
        'validation' => 'nullable|email'
    ],
    'year' => [
        'label' => 'Tahun',
        'type' => 'text',
    ],
    'member' => [
        'label' => 'Anggota',
        'type' => 'text',
    ],
    'member_status' => [
        'label' => 'Status Aktif Member',
        'type' => 'text',
    ],
    'cp_name' => [
        'label' => 'Nama Contact Person',
        'type' => 'text',
        'validation' => 'nullable|string',
    ],
    'cp_email' => [
        'label' => 'Email Contact Person',
        'type' => 'text',
        'validation' => 'nullable|string',
    ],
    'cp_phone' => [
        'label' => 'Telepon Contact Person',
        'type' => 'text',
        'validation' => 'nullable|string',
    ],

    'first_name' => [
        'label' => 'Nama Depan',
        'type' => 'text',
        'validation' => 'nullable|string',
    ],

    'last_name' => [
        'label' => 'Nama Belakang',
        'type' => 'text',
        'validation' => 'nullable|string',
    ],

    'comment' => [
        'label' => 'Status Terkini',
        'type' => 'text',
        'validation' => 'nullable|string',
    ],

];
