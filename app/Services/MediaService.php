<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

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
        if (method_exists($record, 'clearMediaCollection')) {
            $record->clearMediaCollection($field);
        }

        $record->addMedia($file)->toMediaCollection($field);
    }
}
