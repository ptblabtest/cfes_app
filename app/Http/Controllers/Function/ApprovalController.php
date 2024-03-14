<?php

namespace App\Http\Controllers\Function;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ApprovalController extends Controller
{
    public function updateStatus(Request $request, $entity)
    {
        $modelClass = Config::get("pages.{$entity}.model");

        if (!$modelClass || !class_exists($modelClass)) {
            return redirect()->back()->with('error', 'Invalid entity');
        }
    
        $model = $modelClass::findOrFail($request->id);
    
        $model->approval_status = $request->approval_status;
        $model->comment = $request->comment;
        $model->save();
    
        return response()->json(['message' => "{$entity} status updated successfully"]);
    }
    

}
