<?php

return [
    'location_id' => [
        'label' => 'Lokasi',
        'type' => 'related',
        'relationship' => 'location',
        'relation_item' => 'forest_name',
        'options' => function () {
            return App\Models\Location::all()
                ->map(function ($option) {
                    return ['value' => $option->id, 'label' => $option->forest_name];
                })->toArray();
        },
    ],
    'project_id' => [
        'label' => 'Nama Project',
        'type' => 'related',
        'relationship' => 'project',
        'relation_item' => 'title',
        'options' => function () {
            return App\Models\Project::all()
            ->map(function ($option) {
                return ['value' => $option->id, 'label' => $option->title];
            })->toArray();
        },
    ],
    'account_id' => [
        'label' => 'Nama Akun',
        'type' => 'related',
        'relationship' => 'account',
        'relation_item' => 'name',
        'options' => function () {
            return App\Models\Account::all()
            ->map(function ($option) {
                return ['value' => $option->id, 'label' => $option->name];
            })->toArray();
        },
    ],
    'account_item_id' => [
        'label' => 'Nama Item',
        'type' => 'related',
        'relationship' => 'accountitem',
        'relation_item' => 'name',
        'options' => function () {
            return App\Models\AccountItem::all()
            ->map(function ($option) {
                return ['value' => $option->id, 'label' => $option->name];
            })->toArray();
        },
    ],
    'advance_id' => [
        'label' => 'Nomor Advance',
        'type' => 'related',
        'smallLabel' => 'Isi Nomor Advance jika biaya ini dari Advance',
        'relationship' => 'advance',
        'relation_item' => 'advance_number',
        'options' => function () {
            return App\Models\Advance::all()
            ->map(function ($option) {
                return ['value' => $option->id, 'label' => $option->advance_number];
            })->toArray();
        },
    ],
    'plan_id' => [
        'label' => 'Judul TOR/BTOR',
        'type' => 'related',
        'relationship' => 'plan',
        'relation_item' => 'title',
        'options' => function () {
            return App\Models\Plan::all()
                ->map(function ($option) {
                    return ['value' => $option->id, 'label' => $option->title];
                })->toArray();
        },
    ],
    'org_id' => [
        'label' => 'Lembaga',
        'type' => 'related',
        'relationship' => 'org',
        'relation_item' => 'name',
        'options' => function () {
            return App\Models\Org::all()
                ->map(function ($option) {
                    return ['value' => $option->id, 'label' => $option->name];
                })->toArray();
        },
    ],
    'plant_id' => [
        'label' => 'Nama Tumbuhan',
        'smallLabel' => 'Pilih Sesuai Nama Tumbuhan',
        'type' => 'related',
        'relationship' => 'plant',
        'relation_item' => 'name',
        'options' => function () {
            return App\Models\Plant::all()
                ->map(function ($option) {
                    return ['value' => $option->id, 'label' => $option->name];
                })->toArray();
        },
    ],
    'animal_id' => [
        'label' => 'Nama Satwa',
        'smallLabel' => 'Pilih Sesuai Nama Satwa',
        'type' => 'related',
        'relationship' => 'animal',
        'relation_item' => 'name',
        'options' => function () {
            return App\Models\Animal::all()
                ->map(function ($option) {
                    return ['value' => $option->id, 'label' => $option->name];
                })->toArray();
        },
    ],
    'ent_id' => [
        'label' => 'Kelompok Usaha',
        'type' => 'related',
        'relationship' => 'entlist',
        'relation_item' => 'name',
        'options' => function () {
            return App\Models\EntList::all()
                ->map(function ($option) {
                    return ['value' => $option->id, 'label' => $option->name];
                })->toArray();
        },
    ],
    'customer_id' => [
        'label' => 'Customer',
        'type' => 'related',
        'relationship' => 'customer',
        'relation_item' => 'name',
        'options' => function () {
            return App\Models\Customer::all()
                ->map(function ($option) {
                    return ['value' => $option->id, 'label' => $option->name];
                })->toArray();
        },
    ],
    'created_by' => [
        'label' => 'Dibuat Oleh',
        'type' => 'related',
        'relationship' => 'creator',
        'relation_item' => 'name',
        'options' => function () {
            return App\Models\User::all()
                ->map(function ($option) {
                    return ['value' => $option->id, 'label' => $option->name];
                })->toArray();
        },
    ],
    'lead_id' => [
        'label' => 'Prospek',
        'type' => 'related',
        'relationship' => 'lead',
        'relation_item' => 'name',
        'options' => function () {
            return App\Models\Lead::all()
                ->map(function ($option) {
                    return ['value' => $option->id, 'label' => $option->name];
                })->toArray();
        },
    ],
    'deal_id' => [
        'label' => 'Kesepakatan',
        'type' => 'related',
        'relationship' => 'deals',
        'relation_item' => 'combined_id',
        'options' => function () {
            $formatter = new NumberFormatter('id_ID', NumberFormatter::CURRENCY);
            return App\Models\Deal::all()
                ->map(function ($option) use ($formatter) {
                    $customer_name = optional($option->customer)->name; 
                    $formattedRevenue = $formatter->formatCurrency($option->potential_revenue, 'IDR');
                    $label = $customer_name . ' - ' . $formattedRevenue;
                    return [
                        'value' => $option->id, 
                        'label' => $label
                    ];
                })->toArray();
        },
    ],
    'pmanager' => [
        'label' => 'Project Manager',
        'type' => 'related',
        'relationship' => 'pmanager',
        'relation_item' => 'name',
        'options' => function () {
            return App\Models\User::all()
                ->map(function ($option) {
                    return ['value' => $option->id, 'label' => $option->name];
                })->toArray();
        },
    ],
    'approver' => [
        'label' => 'Approver',
        'type' => 'related',
        'relationship' => 'approver',
        'relation_item' => 'name',
        'options' => function () {
            return App\Models\User::all()
                ->map(function ($option) {
                    return ['value' => $option->id, 'label' => $option->name];
                })->toArray();
        },
    ],
    'product_id' => [
        'label' => 'Nama Produk',
        'smallLabel' => 'Pilih Sesuai Nama Produk',
        'type' => 'related',
        'relationship' => 'product',
        'relation_item' => 'name',
        'options' => function () {
            return App\Models\Product::all()
                ->map(function ($option) {
                    return ['value' => $option->id, 'label' => $option->name];
                })->toArray();
        },
    ],
    


];
