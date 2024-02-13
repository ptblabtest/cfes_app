<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class ApiDetailController extends Controller
{
    public function show($entity)
    {
        $config = Config::get("entities.$entity");

        if (!$config) {
            return response()->json(['message' => "Entity type {$entity} is not configured."], 404);
        }

        $modelClass = $config['model'];
        $userId = Auth::id();
        $item = $modelClass::where('user_id', $userId)->firstOrFail();

        return response()->json([
            'item' => $item,
            'fields' => $config['fields'],
        ]);
    }
}
