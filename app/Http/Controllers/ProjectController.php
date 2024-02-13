<?php

namespace App\Http\Controllers;

use App\Services\EntityService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Inertia\Inertia;
use Spatie\MediaLibrary\HasMedia;

class ProjectController extends Controller
{
    protected $entityService;
    protected $config;

    public function __construct(EntityService $entityService)
    {
        $this->entityService = $entityService;
        $this->config = Config::get("projects");
    }

    public function index($entity)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config, 404);

        $items = $this->entityService->getItems($entity, $config);

        if (in_array(HasMedia::class, class_implements($config['model']))) {
            $items = $this->entityService->loadMediaForItems($items, $config['model']);
        }

        $items->transform(function ($item) use ($entity) {
            $item->showUrl = url("/p/{$entity}/show/{$item->id}");
            return $item;
        });

        $createUrl = url("/p/{$entity}/create");
        $exportUrl = url("/p/{$entity}/export");

        return Inertia::render('Display/Index/Index', [
            'items' => $items,
            'entity' => $entity,
            'tables' => $config['index']['tables'] ?? null,
            'grids' => $config['index']['grids'] ?? null,
            'title' => $config['title'],
            'createUrl' => $createUrl,
            'exportUrl' => $exportUrl,
            'auth' => ['user' => auth()->user()],
        ]);
    }

    public function show($entity, $id)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config, 404);

        $item = $this->entityService->getItemWithDetails($entity, $id, $config);

        $this->entityService->loadMediaForItem($item, $config['model']); // 
        $relationShowData = $this->entityService->processRelationShowData($item, $config);

        $editUrl = url("/p/{$entity}/edit/{$id}");

        return Inertia::render($config['view']['show'], [
            'entity' => $entity,
            'item' => $item,
            'cards' => $config['show']['cards'],
            'relation_show' => $relationShowData,
            'editUrl' => $editUrl,
            'title' => $config['title'],
            'auth' => ['user' => auth()->user()],
        ]);
    }


    public function create($entity)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config && isset($config['form']), 404);

        $storeUrl = url("/p/{$entity}");

        return Inertia::render($config['view']['form'], [
            'entity' => $entity,
            'sections' => $config['form']['sections'] ?? null,
            'fields' => $config['form']['fields'] ?? null,
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
        $updateUrl = url("/p/{$entity}/update/{$id}");

        return Inertia::render($config['view']['form'], [
            'entity' => $entity,
            'item' => $item,
            'sections' => $config['form']['sections'] ?? null,
            'fields' => $config['form']['fields'] ?? null,
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

        if (isset($config['form']['sections'])) {
            foreach ($config['form']['sections'] as $section) {
                $this->entityService->handleMediaUploads($newRecord, $request, $section['fields']);
            }
        } else {
            // Fallback to the original handling if sections are not used
            $this->entityService->handleMediaUploads($newRecord, $request, $config['form']['fields']);
        }

        $newRecord->save();

        if (!empty($newRecord->plan_id)) {
            return redirect('/p/plans/' . $newRecord->plan_id)
                ->with('message', 'Data Berhasil Diinput');
        } else {
            return redirect('/p/' . $entity . '/show/' . $newRecord->id)
                ->with('message', 'Data Berhasil Diinput');
        }
    }

    public function update(Request $request, $entity, $id)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config && isset($config['form']), 404);

        $record = $config['model']::findOrFail($id);
        $record->fill($request->except(['file', 'image']));

        if (isset($config['form']['sections'])) {
            foreach ($config['form']['sections'] as $section) {
                $this->entityService->handleMediaUploads($record, $request, $section['fields']);
            }
        } else {
            // Fallback to the original handling if sections are not used
            $this->entityService->handleMediaUploads($record, $request, $config['form']['fields']);
        }

        $record->save();

        // Conditional redirect based on the presence of plan_id
        if (!empty($record->plan_id)) {
            return redirect('/p/plans/' . $record->plan_id)
                ->with('message', 'Data Berhasil Diinput');
        } else {
            return redirect('/p/' . $entity . '/show/' . $id)
                ->with('message', 'Data Berhasil Diinput');
        }
    }

    public function destroy($entity, $id)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config, 404);

        $config['model']::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Item deleted successfully.');
    }
}
