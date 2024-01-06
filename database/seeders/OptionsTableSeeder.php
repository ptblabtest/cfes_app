<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OptionsTableSeeder extends Seeder
{
    public function run()
    {
        $projectTypes = ['Pelatihan', 'Kunjungan'];
        foreach ($projectTypes as $type) {
            DB::table('options')->insert([
                'key' => 'proj_type',
                'value' => $type,
                'label' => $type,
            ]);
        }
        }
    }

