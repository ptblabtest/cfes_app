<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\EntityService;
use App\Services\MediaService;
use App\Services\RelationshipService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ApiController extends Controller
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
        if (!$config) {
            return response()->json(['error' => 'Entity not found.'], 404);
        }

        $items = $this->entityService->getItems($entity, $config);

        return response()->json([
            'items' => $items,
            'entity' => $entity,
            'config' => [
                'tables' => $config['index']['tables'] ?? null,
                'grids' => $config['index']['grids'] ?? null,
                'title' => $config['title'],
            ],
        ]);
    }

    public function show($entity, $id)
    {
        $config = $this->config[$entity] ?? null;
        if (!$config) {
            return response()->json(['error' => 'Entity not found.'], 404);
        }

        $item = $this->relationshipService->getItemWithDetails($entity, $id, $config);

        $relationShowData = $this->relationshipService->processRelationShowData($item, $config);

        return response()->json([
            'entity' => $entity,
            'item' => $item,
            'config' => [
                'cards' => $config['show']['cards'],
                'relation_show' => $relationShowData,
                'title' => $config['title'],
                'model' => $config['model'],
            ],
        ]);
    }

    public function store(Request $request, $entity)
    {
        $config = $this->config[$entity] ?? null;
        if (!$config || !isset($config['form'])) {
            return response()->json(['message' => 'Entity configuration not found or form configuration missing.'], 404);
        }

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

        return response()->json(['message' => 'Data successfully created.', 'data' => $newRecord], 201);
    }

    public function update(Request $request, $entity, $id)
    {
        $config = $this->config[$entity] ?? null;
        if (!$config || !isset($config['form'])) {
            return response()->json(['message' => 'Entity configuration not found or form configuration missing.'], 404);
        }
    
        // Fetch the existing record instead of creating a new instance
        $record = $config['model']::findOrFail($id);
        $record->update($request->all());
    
        // Media upload handling, similar to the store method
        if (isset($config['form']['sections'])) {
            foreach ($config['form']['sections'] as $section) {
                $this->mediaService->handleMediaUploads($record, $request->all(), $section['fields']);
            }
        } else {
            $this->mediaService->handleMediaUploads($record, $request->all(), $config['form']['fields']);
        }
    
        $record->save();
    
        return response()->json(['message' => 'Data successfully updated.', 'data' => $record]);
    }
    

    public function destroy($entity, $id)
    {
        $config = $this->config[$entity] ?? null;
        abort_unless($config, 404);

        $config['model']::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Item deleted successfully.');
    }
}
