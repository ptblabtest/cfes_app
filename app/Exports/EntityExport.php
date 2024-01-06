<?php

namespace App\Exports;
use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EntityExport implements FromCollection, WithHeadings
{
    protected $entity;
    protected $config;

    public function __construct($entity)
    {
        $this->entity = $entity;
        $this->config = Config::get("models.{$entity}");
    }

    public function collection()
    {
        $modelClass = $this->config['class'];
        $modelInstance = new $modelClass();

        // Check if export_fields is set in the configuration
        if (isset($this->config['export_fields']) && is_array($this->config['export_fields'])) {
            $fields = $this->config['export_fields'];
        } else {
            // If export_fields is not set, use an empty array to select all fields
            $fields = ['*'];
        }

        return $modelInstance->newQuery()->get($fields);
    }

    public function headings(): array
    {
        // Use the fields specified in the configuration for headings
        $fields = $this->config['export_fields'] ?? [];

        // Format the headings to be more readable
        $headings = array_map(function($field) {
            return ucwords(str_replace('_', ' ', $field));
        }, $fields);

        return $headings;
    }
}
