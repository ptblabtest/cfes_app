<?php

use App\Models\Option;

return [
    'sales_type' => [
        'label' => 'Tipe Penjualan',
        'type' => 'select',
        'options' => function () {
            return Option::where('key', 'sales_type')
                ->get()
                ->map(function ($option) {
                    return ['value' => $option->label, 'label' => $option->label];
                })->toArray();
        },
    ],
    'doc_type' => [
        'label' => 'Tipe Dokumen',
        'type' => 'select',
        'options' => function () {
            return Option::where('key', 'doc_type')
                ->get()
                ->map(function ($option) {
                    return ['value' => $option->label, 'label' => $option->label];
                })->toArray();
        },
    ],
    'project_type' => [
        'label' => 'Tipe Aktivitas',
        'type' => 'select',
        'options' => function () {
            return Option::where('key', 'project_type')
                ->get()
                ->map(function ($option) {
                    return ['value' => $option->label, 'label' => $option->label];
                })->toArray();
        },
    ],
    'source' => [
        'label' => 'Sumber',
        'type' => 'select',
        'smallLabel' => 'Tuliskan metode atau saluran yang mengarahkan prospek ini kepada perusahaan',
        'options' => [
            ['value' => 'Website', 'label' => 'Website'],
            ['value' => 'Pameran', 'label' => 'Pameran'],
            ['value' => 'Meeting', 'label' => 'Meeting'],
            ['value' => 'Kartu Nama', 'label' => 'Kartu Nama'],
        ],
    ],

];
