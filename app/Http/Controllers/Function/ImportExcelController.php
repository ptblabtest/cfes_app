<?php

namespace App\Http\Controllers\Function;

use App\Http\Controllers\Controller;
use App\Traits\HandleExcel;
use Inertia\Inertia;

class ImportExcelController extends Controller
{
    use HandleExcel;

    public function showImportPage()
    {
        return Inertia::render('Display/Form/ImportForm', [
            'title' => 'Entities',
            'auth' => ['user' => auth()->user()],
        ]);
    }
    
}
