<?php

use App\Models\Client;
use App\Models\KuList;
use App\Models\Location;
use App\Models\Option;
use App\Models\OrgList;
use App\Models\Tor;
use App\Models\User;

return [

    // Text

    'x_coordinate' => [
        'label' => 'Koordinat X',
        'type' => 'text',
        'smallLabel' => 'Latitude'
    ],
    'project_status' => [
        'label' => 'Status Project',
        'type' => 'text',
    ],
    'y_coordinate' => [
        'label' => 'Koordinat Y',
        'type' => 'text',
        'smallLabel' => 'Longitude'
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
    'usage' => [
        'label' => 'Kegunaan',
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

    // Date

    'date' => [
        'label' => 'Tanggal Lahir',
        'type' => 'date',
        'validation' => 'nullable|string',
    ],
    'start_date' => [
        'label' => 'Tanggal Mulai',
        'type' => 'date',
        'validation' => 'nullable|string',
    ],
    'finish_date' => [
        'label' => 'Tanggal Selesai',
        'type' => 'date',
        'validation' => 'nullable|string',
    ],
    'end_date' => [
        'label' => 'Tanggal Selesai',
        'type' => 'date',
        'validation' => 'nullable|string',
    ],
    'year' => [
        'label' => 'Tahun',
        'type' => 'year',
    ],

    // Textarea

    'address' => [
        'label' => 'Alamat',
        'type' => 'textarea',
        'rows' => '10',
        'cols' => '50',
    ],
    'description' => [
        'label' => 'Description',
        'type' => 'textarea',
        'validation' => 'nullable|string',
        'rows' => '10',
        'cols' => '50',
    ],
    'action' => [
        'label' => 'Tindakan',
        'type' => 'textarea',
        'validation' => 'nullable|string',
        'rows' => '10',
        'cols' => '50',
    ],
    'background' => [
        'label' => 'Latar Belakang',
        'type' => 'textarea',
        'validation' => 'nullable|string',
        'rows' => '10',
        'cols' => '50',
    ],
    'purpose' => [
        'label' => 'Tujuan Kegiatan',
        'type' => 'textarea',
        'validation' => 'nullable|string',
        'rows' => '10',
        'cols' => '50',
    ],
    'output' => [
        'label' => 'Output',
        'type' => 'textarea',
        'validation' => 'nullable|string',
        'rows' => '10',
        'cols' => '50',
    ],
    'result' => [
        'label' => 'Objek dan Dokumen yang Dihasilkan',
        'type' => 'textarea',
        'validation' => 'nullable|string',
        'rows' => '10',
        'cols' => '50',
    ],
    'activity' => [
        'label' => 'Kegiatan yang akan Dilaksanakan',
        'type' => 'textarea',
        'validation' => 'nullable|string',
        'rows' => '10',
        'cols' => '50',
    ],
    'sch_detail' => [
        'label' => 'Jadwal Kegiatan',
        'type' => 'textarea',
        'validation' => 'nullable|string',
        'rows' => '10',
        'cols' => '50',
    ],
    'followup' => [
        'label' => 'Rencana Tindak Lanjut',
        'type' => 'textarea',
        'validation' => 'nullable|string',
        'rows' => '10',
        'cols' => '50',
    ],

    // Number

    'revenue' => [
        'label' => 'Omset',
        'type' => 'number',
        'smallLabel' => 'Dalam Rupiah',
        'validation' => 'nullable|numeric',
    ],
    'amount' => [
        'label' => 'Jumlah',
        'type' => 'number',
        'validation' => 'nullable|numeric',
    ],
    'budget' => [
        'label' => 'Total PUM',
        'type' => 'number',
        'validation' => 'nullable|numeric',
    ],
    'cost' => [
        'label' => 'Total PJUM',
        'type' => 'number',
        'validation' => 'nullable|numeric',
    ],
    'util_amount' => [
        'label' => 'Blok Utilisasi',
        'type' => 'number',
        'validation' => 'nullable|numeric',
    ],
    'prot_amount' => [
        'label' => 'Blok Utilisasi',
        'type' => 'number',
        'validation' => 'nullable|numeric',
    ],
    'quantity' => [
        'label' => 'Jumlah',
        'type' => 'number',
        'validation' => 'nullable|numeric',
    ],
    'male_population' => [
        'label' => 'Laki-Laki',
        'type' => 'number',
        'validation' => 'nullable|numeric',
    ],
    'female_population' => [
        'label' => 'Perempuan',
        'type' => 'number',
        'validation' => 'nullable|numeric',
    ],

    // File and Image

    'file' => [
        'label' => 'Upload File',
        'type' => 'file',
        'smallLabel' => 'Upload file PDF atau Excel',
        'validation' => 'file|mimes:pdf,xlsx|max:2048',
    ],
    'image' => [
        'label' => 'Foto',
        'type' => 'image',
        'validation' => 'image|max:2048',
    ],

    // Url

    'tokopedia_url' => [
        'label' => 'Tokopedia URL',
        'type' => 'text',
        'validation' => 'nullable|url',
    ],
    'shopee_url' => [
        'label' => 'Shopee URL',
        'type' => 'text',
        'validation' => 'nullable|url',
    ],
    
    // Option

    'forest_category' => [
        'label' => 'Kategori Hutan',
        'type' => 'select',
        'relation' => 'forestcategory.label',
        'options' => function () {
            return Option::where('key', 'forest_category')
                ->get()
                ->map(function ($option) {
                    return ['value' => $option->id, 'label' => $option->value];
                })->toArray();
        },
    ],
    'active_status' => [
        'label' => 'Status Aktif',
        'type' => 'select',
        'relation' => 'activestatus.label',
        'options' => function () {
            return Option::where('key', 'active_status')
                ->get()
                ->map(function ($option) {
                    return ['value' => $option->id, 'label' => $option->value];
                })->toArray();
        },
    ],
    'org_category' => [
        'label' => 'Kategori Kelembagaan',
        'type' => 'select',
        'relation' => 'orgcategory.label',
        'options' => function () {
            return Option::where('key', 'org_category')
                ->get()
                ->map(function ($option) {
                    return ['value' => $option->id, 'label' => $option->value];
                })->toArray();
        },
    ],
    'group_type' => [
        'label' => 'Bentuk Kelompok',
        'type' => 'select',
        'relation' => 'grouptype.label',
        'options' => function () {
            return Option::where('key', 'group_type')
                ->get()
                ->map(function ($option) {
                    return ['value' => $option->id, 'label' => $option->label];
                })->toArray();
        },
    ],
    'kups_class' => [
        'label' => 'Kelas KUPS',
        'type' => 'select',
        'relation' => 'kupsclass.label',
        'options' => function () {
            return Option::where('key', 'kups_class')
                ->get()
                ->map(function ($option) {
                    return ['value' => $option->id, 'label' => $option->label];
                })->toArray();
        },
    ],
    'iucn_id' => [
        'label' => 'Kategori IUCN',
        'type' => 'select',
        'relation' => 'iucn.label',
        'options' => function () {
            return Option::where('key', 'iucn_id')
                ->get()
                ->map(function ($option) {
                    return ['value' => $option->id, 'label' => $option->label];
                })->toArray();
        },
    ],
    'cites_id' => [
        'label' => 'Kategori CITES',
        'type' => 'select',
        'relation' => 'cites.label',
        'options' => function () {
            return Option::where('key', 'cites_id')
                ->get()
                ->map(function ($option) {
                    return ['value' => $option->id, 'label' => $option->label];
                })->toArray();
        },
    ],
    'project_type' => [
        'label' => 'Tipe Aktivitas',
        'type' => 'select',
        'relation' => 'projecttype.label',
        'options' => function () {
            return Option::where('key', 'project_type')
                ->get()
                ->map(function ($option) {
                    return ['value' => $option->id, 'label' => $option->label];
                })->toArray();
        },
    ],

    // Relation

    'client_id' => [
        'label' => 'Nama Perusahaan',
        'type' => 'select',
        'relation' => 'client.name',
        'options' => function () {
            return Client::all()->map(function ($client) {
                return ['value' => $client->id, 'label' => $client->name];
            })->toArray();
        },
    ],
    'tor_id' => [
        'label' => 'Nomor TOR',
        'type' => 'readonly',
    ],
    'location_id' => [
        'label' => 'Lokasi',
        'type' => 'select',
        'relation' => 'location.forest_name',
        'options' => function () {
            return Location::all()
                ->map(function ($location) {
                    return ['value' => $location->id, 'label' => $location->forest_name];
                })->toArray();
        },
    ],
    'org_id' => [
        'label' => 'Lembaga',
        'type' => 'select',
        'relation' => 'org.name',
        'options' => function () {
            return OrgList::all()
                ->map(function ($org) {
                    return ['value' => $org->id, 'label' => $org->name];
                })->toArray();
        },
    ],
    'ku_id' => [
        'label' => 'Kelompok Usaha',
        'type' => 'select',
        'relation' => 'kulist.name',
        'options' => function () {
            return KuList::all()
                ->map(function ($kulist) {
                    return ['value' => $kulist->id, 'label' => $kulist->name];
                })->toArray();
        },
    ],
    'created_by' => [
        'label' => 'Dibuat Oleh',
        'type' => 'select',
        'relation' => 'createdby.name',
        'options' => function () {
            return User::all()
                ->map(function ($user) {
                    return ['value' => $user->id, 'label' => $user->name];
                })->toArray();
        },
    ],






];
