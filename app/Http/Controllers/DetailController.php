<?php

namespace App\Http\Controllers;

use App\Services\EntityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Inertia\Inertia;

class DetailController extends Controller
{

    protected $entityService;
    protected $config;

    public function __construct(EntityService $entityService)
    {
        $this->entityService = $entityService;
        $this->config = Config::get("details");
    }

    public function show($entity, $id)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config, 404);
    
        $item = $this->entityService->getItem($entity, $id, $config);

        $item = $this->entityService->loadMediaForItem($item, $config['model']);

        $editUrl = url("/d/{$entity}/edit/{$id}");
    
        return Inertia::render($config['view']['show'], [
            'entity' => $entity,
            'item' => $item,
            'cards' => $config['show']['cards'],
            'editUrl' => $editUrl,
            'title' => $config['title'],
            'auth' => ['user' => auth()->user()],
        ]);
    }
    

    public function create($entity)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config && isset($config['form']), 404);

        $storeUrl = url("/d/{$entity}");

        return Inertia::render($config['view']['form'], [
            'entity' => $entity,
            'fields' => $config['form']['fields'],
            'title' => $config['title'],
            'storeUrl' => $storeUrl,
            'auth' => ['user' => auth()->user()],
        ]);
    }

    public function edit($entity, $id)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config && isset($config['form']), 404);

        $item = $config['model']::with('media')->findOrFail($id);
        $updateUrl = url("/d/{$entity}/update/{$id}");

        return Inertia::render($config['view']['form'], [
            'entity' => $entity,
            'item' => $item,
            'fields' => $config['form']['fields'],
            'title' => $config['title'],
            'updateUrl' => $updateUrl,
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
