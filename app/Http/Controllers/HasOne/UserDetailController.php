<?php

namespace App\Http\Controllers\HasOne;

use App\Http\Controllers\Controller;
use App\Services\EntityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class UserDetailController extends Controller
{
    protected $entityService;
    protected $config;

    public function __construct(EntityService $entityService)
    {
        $this->entityService = $entityService;
        $this->config = Config::get("pages");
    }

    public function show($entity)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config, 404);
    
        $user = auth()->user();
        $item = $user->userDetail;
    
        abort_unless($item, 404, "User details not found.");
    
        $editUrl = url("/d/{$entity}/edit/{$item->id}");
    
        return Inertia::render('Display/Show/Show', [
            'entity' => $entity,
            'item' => $item,
            'cards' => $config['show']['cards'],
            'editUrl' => $editUrl,
            'title' => $config['title'],
            'auth' => ['user' => $user],
        ]);
    }
    

    public function create($entity)
    {

        if (Auth::user()->userdetail) {
            return Redirect::to('/');
        }

        $config = $this->config[$entity] ?? null;
        abort_unless($config && isset($config['form']), 404);

        $storeUrl = url("/d/{$entity}");

        return Inertia::render('Display/Form/Form', [
            'entity' => $entity,
            'fields' => $config['form']['fields'],
            'title' => $config['title'],
            'storeUrl' => $storeUrl,
            'auth' => ['user' => auth()->user()],
        ]);
    }

    public function store(Request $request, $entity)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config && isset($config['form']), 404);

        $newRecord = new $config['model'];
        $newRecord->fill($request->all());

        $this->entityService->handleMediaUploads($newRecord, $request, $config['form']['fields']);

        $newRecord->save();

        return redirect()->back()->with('message', 'Data Berhasil Diinput');
    }

    public function edit($entity, $id)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config && isset($config['form']), 404);

        $item = $config['model']::with('media')->findOrFail($id);
        $updateUrl = url("/d/{$entity}/update/{$id}");

        return Inertia::render('Display/Form/Form', [
            'entity' => $entity,
            'item' => $item,
            'fields' => $config['form']['fields'],
            'title' => $config['title'],
            'updateUrl' => $updateUrl,
            'auth' => ['user' => auth()->user()],
        ]);
    }

    public function update(Request $request, $entity, $id)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config && isset($config['form']), 404);

        $record = $config['model']::findOrFail($id);
        $record->fill($request->except(['file', 'image']));

        $this->entityService->handleMediaUploads($record, $request, $config['form']['fields']);

        $record->save();

        return redirect()->back()->with('message', 'Data Berhasil Diinput');
    }



}
