<?php

namespace App\Traits;

use App\Exports\EntityExport;
use App\Imports\EntityImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

trait HandleExcel
{

    public function import(Request $request, $entity)
    {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,csv,xls',
        ]);

        Excel::import(new EntityImport($entity), $request->file('file'));

        return redirect()->back()->with('success', 'Data imported successfully.');
    }

    public function export(Request $request, $entity)
    {
        // Check if the $entity is defined
        if (empty($entity)) {
            // If $entity is not defined, redirect back or perform another action
            return back();
        }
    
        // Proceed with the download if $entity is defined
        return Excel::download(new EntityExport($entity), "{$entity}-export.xlsx");
    }
}
