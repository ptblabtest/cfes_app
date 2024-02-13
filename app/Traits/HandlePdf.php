<?php

namespace App\Traits;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Config;

trait HandlePdf
{
    public function generatePdf($entity)
    {
        $config = Config::get("models.{$entity}");
        abort_unless($config, 404);

        $items = $config['model']::all();

        $pdf = Pdf::loadView('pdf.entity', compact('items'));

        return $pdf->download("{$entity}.pdf");
    }
}
