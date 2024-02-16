<?php

use App\Models\Animal;
use App\Models\Client;
use App\Models\EntList;
use App\Models\Location;
use App\Models\Org;
use App\Models\Plan;
use App\Models\Plant;
use App\Models\Project;
use App\Models\User;

return [
    'location_id' => [
        'label' => 'Lokasi',
        'type' => 'select',
        'relationship' => 'location',
        'relation_item' => 'forest_name',
        'options' => function () {
            return Location::all()
                ->map(function ($location) {
                    return ['value' => $location->id, 'label' => $location->forest_name];
                })->toArray();
        },
    ],
    'project_id' => [
        'label' => 'Nama Project',
        'type' => 'select',
        'relationship' => 'project',
        'relation_item' => 'title',
        'options' => function () {
            return Project::all()
                ->map(function ($project) {
                    $label = $project->sales_type 
                    . ' - ' . Client::find($project->client_id)->name
                    . ' - ' . Location::find($project->location_id)->forest_name;
                    return ['value' => $project->id, 'label' => $label];
                })->toArray();
        },
    ],
    'plan_id' => [
        'label' => 'Judul TOR/BTOR',
        'type' => 'select',
        'relationship' => 'plan',
        'relation_item' => 'title',
        'options' => function () {
            return Plan::all()
                ->map(function ($plan) {
                    return ['value' => $plan->id, 'label' => $plan->title];
                })->toArray();
        },
    ],
    'org_id' => [
        'label' => 'Lembaga',
        'type' => 'select',
        'relationship' => 'org',
        'relation_item' => 'name',
        'options' => function () {
            return Org::all()
                ->map(function ($org) {
                    return ['value' => $org->id, 'label' => $org->name];
                })->toArray();
        },
    ],
    'plant_id' => [
        'label' => 'Nama Tumbuhan',
        'smallLabel' => 'Pilih Sesuai Nama Tumbuhan',
        'type' => 'select',
        'relationship' => 'plant',
        'relation_item' => 'name',
        'options' => function () {
            return Plant::all()
                ->map(function ($plant) {
                    return ['value' => $plant->id, 'label' => $plant->name];
                })->toArray();
        },
    ],
    'animal_id' => [
        'label' => 'Nama Satwa',
        'smallLabel' => 'Pilih Sesuai Nama Satwa',
        'type' => 'select',
        'relationship' => 'animal',
        'relation_item' => 'name',
        'options' => function () {
            return Animal::all()
                ->map(function ($animal) {
                    return ['value' => $animal->id, 'label' => $animal->name];
                })->toArray();
        },
    ],
    'ent_id' => [
        'label' => 'Kelompok Usaha',
        'type' => 'select',
        'relationship' => 'entlist',
        'relation_item' => 'name',
        'options' => function () {
            return EntList::all()
                ->map(function ($entlist) {
                    return ['value' => $entlist->id, 'label' => $entlist->name];
                })->toArray();
        },
    ],
    'client_id' => [
        'label' => 'Client',
        'type' => 'select',
        'relationship' => 'client',
        'relation_item' => 'name',
        'options' => function () {
            return Client::all()
                ->map(function ($client) {
                    return ['value' => $client->id, 'label' => $client->name];
                })->toArray();
        },
    ],
    'created_by' => [
        'label' => 'Dibuat Oleh',
        'type' => 'select',
        'relationship' => 'createdby',
        'relation_item' => 'name',
        'options' => function () {
            return User::all()
                ->map(function ($user) {
                    return ['value' => $user->id, 'label' => $user->name];
                })->toArray();
        },
    ],
    'pmanager' => [
        'label' => 'Project Manager',
        'type' => 'select',
        'relationship' => 'pmanager',
        'relation_item' => 'name',
        'options' => function () {
            return User::all()
                ->map(function ($user) {
                    return ['value' => $user->id, 'label' => $user->name];
                })->toArray();
        },
    ],
    'approver' => [
        'label' => 'Approver',
        'type' => 'select',
        'relationship' => 'approver',
        'relation_item' => 'name',
        'options' => function () {
            return User::all()
                ->map(function ($user) {
                    return ['value' => $user->id, 'label' => $user->name];
                })->toArray();
        },
    ],


];
