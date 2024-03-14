<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ApprovalLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class ApprovalLogController extends Controller
{
    public function fetchLatest(Request $request)
    {
        $modelType = $request->query('model');
        $modelId = $request->query('modelId');

        $config = Config::get("pages.$modelType");

        if (null === $config || !isset($config['model'])) {
            return response()->json(['error' => 'Configuration or model not found for the specified type'], 404);
        }

        $modelClass = $config['model'];

        $latestLog = $modelClass::where('model_id', $modelId)
                                ->latest('log_number')
                                ->first();

        if (!$latestLog) {
            return response()->json([
                'status' => 'No Status',
                'comment' => '',
                'statusClass' => 'bg-gray-50',
            ]);
        }

        return response()->json([
            'status' => $latestLog->status,
            'comment' => $latestLog->comment,
            'statusClass' => $this->determineStatusClass($latestLog->status),
        ]);
    }


    public function updateStatus(Request $request)
    {
        $validated = $request->validate([
            'modelType' => 'required|string',
            'modelId' => 'required|integer',
            'status' => 'required|string',
            'comment' => 'sometimes|string',
        ]);
    
        $modelClassName = Str::singular(ucfirst($validated['modelType']));
        $modelClass = "App\\Models\\" . $modelClassName;
    
        if (!class_exists($modelClass)) {
            return response()->json(['message' => 'Invalid model type'], 404);
        }
    
        $log = ApprovalLog::create([
            'model_type' => $modelClass,
            'model_id' => $validated['modelId'],
            'status' => $validated['status'],
            'comment' => $validated['comment'] ?? '',
            'log_number' => ApprovalLog::where('model_type', $modelClass)
                ->where('model_id', $validated['modelId'])
                ->max('log_number') + 1,
            // 'approved_by' should be determined based on your application's auth logic
        ]);
    
        return response()->json(['message' => 'Status updated successfully', 'log' => $log]);
    }

    public function getStatuses()
    {
        return response()->json([
            'draft' => ['label' => 'Draft', 'class' => 'bg-gray-500'],
            'review' => ['label' => 'Under Review', 'class' => 'bg-yellow-500'],
            'approved' => ['label' => 'Approved', 'class' => 'bg-green-500'],
        ]);
    }
    
}
