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
        'label' => 'No Implementasi',
        'type' => 'related',
        'relationship' => 'project',
        'relation_item' => 'combined_id',
        'options' => function () {
            return App\Models\Project::all()
            ->map(function ($option) {
                return ['value' => $option->id, 'label' => $option->combined_id];
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
        'label' => 'No PUM',
        'type' => 'related',
        'smallLabel' => 'Isi Nomor Advance jika biaya ini dari Advance',
        'relationship' => 'advance',
        'relation_item' => 'advance_reg_no',
        'options' => function () {
            return App\Models\Advance::all()
            ->map(function ($option) {
                return ['value' => $option->id, 'label' => $option->advance_reg_no];
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
        'label' => 'Nama Calon Client',
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
        'label' => 'No Kesepakatan',
        'type' => 'related',
        'relationship' => 'deals',
        'relation_item' => 'combined_id',
        'options' => function () {
            return App\Models\Deal::all()
            ->map(function ($option) {
                return ['value' => $option->id, 'label' => $option->combined_id];
            })->toArray();
        },
    ],
    'product_id' => [
        'label' => 'Nama Program',
        'smallLabel' => 'Pilih Sesuai Nama Program',
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
