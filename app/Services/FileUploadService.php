<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class FileUploadService
{
    public function storeFile(UploadedFile $file, $folder = 'files')
    {
        $filename = $this->generateFileName($file);
        return $file->storeAs($folder, $filename, 'public');
    }

    public function storeImage(UploadedFile $file, $folder = 'images')
    {
        $filename = $this->generateFileName($file);
        return $file->storeAs($folder, $filename, 'public');
    }

    private function generateFileName(UploadedFile $file)
    {
        $extension = $file->getClientOriginalExtension();
        return Str::random(40) . '.' . $extension;
    }
}
