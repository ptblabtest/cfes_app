<?php

namespace App\Traits;

use App\Exports\EntityExport;
use App\Imports\EntityImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Facades\Excel;

trait HandleExcel
{

    public function export($entity)
    {
        $config = Config::get("models.{$entity}");
        abort_unless($config, 404);

        $fileName = "{$entity}_" . now()->format('Y_m_d_His') . ".xlsx";

        return Excel::download(new EntityExport($entity), $fileName);
    }

    public function import(Request $request, $entity)
    {
        $config = Config::get("models.{$entity}");
        abort_unless($config, 404);

        Excel::import(new EntityImport($entity), $request->file('file'));

        return redirect()->back()->with('success', 'Data imported successfully.');
    }
}
