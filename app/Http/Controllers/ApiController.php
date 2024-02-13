<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ApiController extends Controller
{
    public function index($entity) {
        $config = Config::get("models.{$entity}");

        if (!$config) {
            return response()->json(['error' => 'Entity not found'], 404);
        }

        $modelClass = $config['model'];
        $items = $modelClass::with($config['relationship'] ?? [])->get();

        return response()->json($items);
    }

    public function show($entity, $id) {
        $config = Config::get("models.{$entity}");

        // Check if the entity configuration exists
        if (!$config) {
            return response()->json(['error' => 'Entity not found'], 404);
        }

        $relationships = $config['relationship'] ?? [];

        // Retrieve the item, including any relationships
        $item = $config['model']::with($relationships)->find($id);

        if (!$item) {
            return response()->json(['error' => 'Item not found'], 404);
        }

        return response()->json($item);
    }
}
