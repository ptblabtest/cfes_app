<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\EntityService;
use App\Services\MediaService;
use App\Services\RelationshipService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Config;

class DisplayController extends Controller
{
    protected $entityService;
    protected $relationshipService;
    protected $mediaService;
    protected $config;

    public function __construct(
        EntityService $entityService,
        RelationshipService $relationshipService,
        MediaService $mediaService
    ) {
        $this->entityService = $entityService;
        $this->relationshipService = $relationshipService;
        $this->mediaService = $mediaService;
        $this->config = Config::get("pages");
    }

    public function index($entity)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config, 404);

        $items = $this->entityService->getItems($entity, $config);

        return Inertia::render('Display/Index/Index', [
            'items' => $items,
            'entity' => $entity,
            'tables' => $config['index']['tables'] ?? null,
            'grids' => $config['index']['grids'] ?? null,
            'title' => $config['title'],
            'auth' => ['user' => auth()->user()],
        ]);
    }

    public function show($entity, $id)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config, 404);

        $item = $this->relationshipService->getItemWithDetails($entity, $id, $config);

        if (!empty($config['redirect_show']['enabled'])) {
            $parentField = $config['parent'] ?? null;
            $parentId = $item->{$parentField} ?? null;
            $redirectPath = $config['redirect_show']['path'] ?? null;
            $showAction = $config['redirect_show']['show_action'] ?? 'show';

            if ($parentField && $parentId && $redirectPath) {
                return redirect("/{$redirectPath}/{$showAction}/{$parentId}");
            }
        }

        $relationShowData = $this->relationshipService->processRelationShowData($item, $config);

        return Inertia::render($config['view']['show'], [
            'entity' => $entity,
            'item' => $item,
            'cards' => $config['show']['cards'],
            'relation_show' => $relationShowData,
            'title' => $config['title'],
            'auth' => ['user' => auth()->user()],
            'model' => $config['model'],
        ]);
    }

    public function create($entity)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config && isset($config['form']), 404);

        $parentId = request()->input($config['parent'] ?? '');

        if ($parentId && $config['redirect_show']['enabled'] ?? false) {
            $parentEntity = $config['model']::where($config['parent'], $parentId)->first();

            if ($parentEntity) {
                $redirectPath = $config['redirect_show']['path'] ?? $entity;
                $showAction = $config['redirect_show']['show_action'] ?? 'show';
                return redirect("/{$redirectPath}/{$showAction}/{$parentId}");
            }
        }

        return Inertia::render($config['view']['form'], [
            'entity' => $entity,
            'sections' => $config['form']['sections'] ?? null,
            'fields' => $config['form']['fields'] ?? null,
            'title' => $config['title'],
            'auth' => ['user' => auth()->user()],
        ]);
    }

    public function edit($entity, $id)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config && isset($config['form']), 404);

        $item = $config['model']::findOrFail($id);

        return Inertia::render($config['view']['form'], [
            'entity' => $entity,
            'item' => $item,
            'sections' => $config['form']['sections'] ?? null,
            'fields' => $config['form']['fields'] ?? null,
            'title' => $config['title'],
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
                $this->mediaService->handleMediaUploads($newRecord, $request->all(), $section['fields']);
            }
        } else {
            $this->mediaService->handleMediaUploads($newRecord, $request->all(), $config['form']['fields']);
        }

        $newRecord->save();

        $parentField = $config['parent'] ?? null;
        $parentId = $parentField ? $newRecord->{$parentField} : null;

        if ($parentId) {
            $redirectPath = $config['redirect_show']['path'] ?? $entity;
            $showAction = $config['redirect_show']['show_action'] ?? 'show';
            return redirect("/{$redirectPath}/{$showAction}/" . $parentId)
                ->with('message', 'Data successfully updated.');
        } else {
            return redirect("/{$entity}/show/" . $newRecord->id)
                ->with('message', 'Data successfully updated.');
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
                $this->mediaService->handleMediaUploads($record, $request->all, $section['fields']);
            }
        } else {
            $this->mediaService->handleMediaUploads($record, $request->all(), $config['form']['fields']);
        }

        $record->save();
        $parentField = $config['parent'] ?? null;
        $parentId = $parentField ? $record->{$parentField} : null;

        if ($parentId) {
            $redirectPath = $config['redirect_show']['path'] ?? $entity;
            $showAction = $config['redirect_show']['show_action'] ?? 'show';
            return redirect("/{$redirectPath}/{$showAction}/" . $parentId)
                ->with('message', 'Data successfully updated.');
        } else {
            return redirect("/{$entity}/show/" . $record->id)
                ->with('message', 'Data successfully updated.');
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
