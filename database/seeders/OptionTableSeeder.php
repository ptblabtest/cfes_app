<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('options')->truncate();

        $data = [
            'sales_type' => [
                'label' => 'Tipe Penjualan',
                'type' => 'select',
                'options' => [
                    ['value' => 'Telepon', 'label' => 'Telepon'],
                    ['value' => 'Email', 'label' => 'Email'],
                    ['value' => 'Meeting', 'label' => 'Meeting'],
                ],
            ],
            'doc_type' => [
                'label' => 'Tipe Dokumen',
                'type' => 'select',
                'options' => [
                    ['value' => 'LUCA', 'label' => 'LUCA'],
                    ['value' => 'NDA', 'label' => 'NDA'],
                    ['value' => 'Concept Note', 'label' => 'Concept Note'],
                    ['value' => 'Surat Perjanjian Kerjasama (SPK)', 'label' => 'Surat Perjanjian Kerjasama (SPK)'],
                    ['value' => 'Compensation Plan', 'label' => 'Compensation Plan'],
                    ['value' => 'FPIC', 'label' => 'FPIC'],
                    ['value' => 'SPK Pendamping', 'label' => 'SPK Pendamping'],
                    ['value' => 'Rencana Kegiatan Pendamping', 'label' => 'Rencana Kegiatan Pendamping'],
                    ['value' => 'Laporan Imbalan Tahunan', 'label' => 'Laporan Imbalan Tahunan'],
                    ['value' => 'Laporan Tahunan', 'label' => 'Laporan Tahunan'],
                    ['value' => 'TOR', 'label' => 'TOR'],
                    ['value' => 'Laporan Anggaran TOR', 'label' => 'Laporan Anggaran TOR'],
                    ['value' => 'BTOR', 'label' => 'BTOR'],
                    ['value' => 'Laporan Realisasi BTOR', 'label' => 'Laporan Anggaran BTOR'],
                    ['value' => 'Laporan Aktifitas', 'label' => 'Laporan Aktifitas'],
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
        ];

        foreach ($data as $key => $value) {
            if (isset($value['options'])) {
                foreach ($value['options'] as $option) {
                    DB::table('options')->insert([
                        'key' => $key,
                        'value' => $option['value'] ?? null,
                        'label' => $option['label'] ?? null,
                        'description' => $value['label'] ?? null, // Assuming you want to use the top-level label as the description
                    ]);
                }
            }
        }
    }
}
