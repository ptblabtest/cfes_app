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

       if (isset($this->config['export_fields']) && is_array($this->config['export_fields'])) {
            $fields = $this->config['export_fields'];
        } else {
            $fields = ['*'];
        }

        return $modelInstance->newQuery()->get($fields);
    }

    public function headings(): array
    {
        $fields = $this->config['export_fields'] ?? [];

        $headings = array_map(function($field) {
            return ucwords(str_replace('_', ' ', $field));
        }, $fields);

        return $headings;
    }
}
