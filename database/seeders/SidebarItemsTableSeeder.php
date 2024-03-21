<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SidebarItemsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sidebar_items')->delete();

        $configs = [
            [
                'title' => "Dashboard",
                'icon' => "search",
                'items' => [
                    ['name' => "Dashboard Monitoring", 'route' => "/dashboard"],
                ],
            ],
            [
                'title' => "Customer Relationship Management (CRM)",
                'icon' => "search",
                'items' => [
                    ['name' => "Calon Client", 'route' => "/leads"],
                    ['name' => "Kesepakatan", 'route' => "/deals"],
                    ['name' => "Kegiatan Sales", 'route' => "/salesactivities"],
                    
                ],
            ],
            [
                'title' => "Project Management",
                'icon' => "search",
                'items' => [
                    ['name' => "Implementasi", 'route' => "/projects"],
                    ['name' => "Kegiatan Project", 'route' => "/projectactivities"],
                ],
            ],
            [
                'title' => "Tambahan",
                'icon' => "search",
                'items' => [
                    ['name' => "Anggaran", 'route' => "/budgets"],
                    ['name' => "Biaya", 'route' => "/expenses"],
                    ['name' => "Pengajuan Uang Muka", 'route' => "/advances"],
                    ['name' => "Dokumen", 'route' => "/documents"],
                ],
            ],
            [
                'title' => "Resource Management",
                'icon' => "done",
                'items' => [
                    ['name' => "Chart of Accounts (COA)", 'route' => "/accounts"],
                    ['name' => "Item Account", 'route' => "/accountitems"],
                    ['name' => "Customers", 'route' => "/customers"],
                    ['name' => "Vendors", 'route' => "/vendors"],
                    ['name' => "Products", 'route' => "/products"],
                    ['name' => "Lokasi", 'route' => "/locations"],
                ],
            ],
            [
                'title' => "Admin Only",
                'icon' => "done",
                'items' => [
                    ['name' => "Option", 'route' => "/options"],
                ],
            ],
        ];

        foreach ($configs as $config) {
            // Insert parent item and get its ID
            $parentId = DB::table('sidebar_items')->insertGetId([
                'title' => $config['title'],
                'icon' => $config['icon'],
                'route' => null, // Parent items might not have a direct route
            ]);

            // Insert child items
            foreach ($config['items'] as $item) {
                DB::table('sidebar_items')->insert([
                    'title' => $item['name'],
                    'icon' => '', // Assuming child items might not have an icon
                    'route' => $item['route'],
                    'parent_id' => $parentId, // Set the parent ID
                ]);
            }
        }
    }
}
