<?php

namespace App\Imports;

use Illuminate\Support\Facades\Config;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class EntityImport implements ToModel, WithHeadingRow
{
    protected $entity;

    public function __construct($entity)
    {
        $this->entity = $entity;
    }

    public function model(array $row)
    {
        $modelClass = Config::get("models.{$this->entity}.class");
        $modelInstance = new $modelClass();

        // Create an array with only the fillable attributes from the row data
        $fillableData = array_intersect_key($row, array_flip($modelInstance->getFillable()));

        return new $modelClass($fillableData);
    }
}
