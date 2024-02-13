<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApprovalController extends Controller
{
    public function updateStatus(Request $request, $entity)
    {
        if ($entity === 'tor') {
            $model = \App\Models\Tor::findOrFail($request->id);
        } elseif ($entity === 'btor') {
            $model = \App\Models\Btor::findOrFail($request->id);
        } else {
            return response()->json(['error' => 'Invalid entity'], 400);
        }
    
        $model->approval_status = $request->approval_status;
        $model->comment = $request->comment;
        $model->save();
    
        return response()->json(['message' => "{$entity} status updated successfully"]);
    }

}
