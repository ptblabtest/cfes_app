<?php

namespace App\Imports;

use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Database\Eloquent\Model;

class EntityImport implements ToModel, WithHeadingRow
{
    protected $entity;

    public function __construct($entity)
    {
        $this->entity = $entity;
    }

    public function model(array $row)
    {
        $modelClass = Config::get("pages.{$this->entity}.model");

        if (!class_exists($modelClass) || !is_subclass_of($modelClass, Model::class)) {
            // Handle error or skip
            return null;
        }

        // Directly use the $row array, assuming its keys match your database column names
        return new $modelClass($row);
    }
    
}
