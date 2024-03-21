<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class MediaService
{
    public function handleMediaUploads(Model $record, ?array $data, array $fields): void
    {
        if (null === $data) {
            return;
        }

        foreach ($fields as $field => $properties) {
            if (isset($properties['type']) && ($properties['type'] === 'file' || $properties['type'] === 'image')) {
                if (isset($data[$field]) && is_array($data[$field])) {
                    foreach ($data[$field] as $file) {
                        $this->processSingleFile($record, $file, $field);
                    }
                } elseif (isset($data[$field]) && $data[$field] instanceof UploadedFile) {
                    $this->processSingleFile($record, $data[$field], $field);
                }
            }
        }
    }

    protected function processSingleFile(Model $record, UploadedFile $file, string $field): void
    {
        $formattedFileName = $this->formatFileName($file);

        if (method_exists($record, 'clearMediaCollection')) {
            $record->clearMediaCollection($field);
        }

        // Use `usingFileName` to specify the formatted file name
        $record->addMedia($file)
               ->usingFileName($formattedFileName)
               ->toMediaCollection($field);
    }

    /**
     * Format the file name.
     *
     * This method replaces spaces with underscores and ensures the file name is unique.
     * Customize this method as needed.
     *
     * @param UploadedFile $file
     * @return string
     */
    protected function formatFileName(UploadedFile $file): string
    {
        // Replace spaces with underscores
        $sanitizedFileName = str_replace(' ', '_', $file->getClientOriginalName());
        
        // Ensure the file name is unique by appending a UUID
        return Str::uuid() . '_' . $sanitizedFileName;
    }
}
