<?php

namespace App\Http\Controllers;

use App\Models\Tor;
use App\Traits\ExportImport;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Config;
use Spatie\MediaLibrary\HasMedia;

class DisplayController extends Controller
{

    use ExportImport;

    public function index($entity)
    {
        $config = Config::get("models.{$entity}");
        abort_unless($config, 404);

        $itemsQuery = !empty($config['relationship'])
            ? $config['class']::with($config['relationship'])
            : new $config['class'];

        $items = $itemsQuery->get();

        if (in_array(HasMedia::class, class_implements($config['class']))) {
            $items->load('media');
        }

        $user = auth()->user()->load('roles');

        return Inertia::render($config['view']['index'], [
            'items' => $items,
            'entity' => $entity,
            'fields' => $config['index']['fields'],
            'title' => $config['title'],
            'auth' => ['user' => $user],
        ]);
    }

    public function show($entity, $id)
    {
        $config = Config::get("models.{$entity}");
        abort_unless($config, 404);
    
        // Dynamically fetch the model and its related data
        $modelClass = $config['class'];
        $relatedEntity = $config['relation_show']['relation'] ?? null;
    
        // Load the main item and its relation if specified
        $item = $relatedEntity ? $modelClass::with($relatedEntity)->findOrFail($id) : $modelClass::findOrFail($id);
    
        if (in_array(HasMedia::class, class_implements($modelClass))) {
            $item->load('media');
        }
    
        return Inertia::render($config['view']['show'], [
            'entity' => $entity,
            'item' => $item,
            'fields' => $config['show']['fields'],
            'relation_show' => $config['relation_show'] ?? null,
            'title' => "View " . $config['title'],
            'auth' => ['user' => auth()->user()],
        ]);
    }
    
    
    

    public function create($entity)
    {
        $config = Config::get("models.{$entity}");
        abort_unless($config && isset($config['form']), 404);

        return Inertia::render($config['view']['form'], [
            'entity' => $entity,
            'fields' => $config['form']['fields'],
            'title' => "Create " . $config['title'],
            'auth' => ['user' => auth()->user()],
        ]);
    }

    public function edit($entity, $id)
    {
        $config = Config::get("models.{$entity}");
        abort_unless($config && isset($config['form']), 404);

        $item = $config['class']::findOrFail($id);

        return Inertia::render($config['view']['form'], [
            'entity' => $entity,
            'item' => $item,
            'fields' => $config['form']['fields'],
            'title' => "Edit " . $config['title'],
            'auth' => ['user' => auth()->user()],
        ]);
    }


    public function store(Request $request, $entity)
    {

        $config = Config::get("models.{$entity}");
        abort_unless($config && isset($config['form']), 404);
    
        $newRecord = new $config['class'];
        $newRecord->fill($request->all());
    
        foreach ($config['form']['fields'] as $field => $properties) {
            if (($properties['type'] === 'file' || $properties['type'] === 'image') && $request->hasFile($field)) {
                $newRecord->addMediaFromRequest($field)
                          ->toMediaCollection(); // Use the field name as the collection name
            }
        }
    
        $newRecord->save();
    
        return redirect()->route('entity.index', ['entity' => $entity])
            ->with('success', 'New record created successfully.');
    }
    


    public function update(Request $request, $entity, $id)
    {
        $config = Config::get("models.{$entity}");
        abort_unless($config && isset($config['form']), 404);
    
        $record = $config['class']::findOrFail($id);
        $record->fill($request->except(['file', 'image'])); // Adjust based on your fields
    
        foreach ($config['form']['fields'] as $field => $properties) {
            if (($properties['type'] === 'file' || $properties['type'] === 'image') && $request->hasFile($field)) {
                $record->clearMediaCollection($field);
                $record->addMediaFromRequest($field)
                       ->toMediaCollection($field); // Use the field name as the collection name
            }
        }
    
        $record->save();
    
        return redirect()->route('entity.index', ['entity' => $entity])
            ->with('success', 'Record updated successfully.');
    }

    public function destroy($entity, $id)
    {
        $config = Config::get("models.{$entity}");
        abort_unless($config, 404);

        $config['class']::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Item deleted successfully.');
    }



}
