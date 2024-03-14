<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\Config;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class EntityExport implements FromCollection, WithHeadings
{
    protected $entity;

    public function __construct($entity)
    {
        $this->entity = $entity;
    }

    public function collection()
    {
        $modelClass = Config::get("pages.{$this->entity}.model");
    
        if (!class_exists($modelClass) || !is_subclass_of($modelClass, Model::class)) {
            // Handle error or return an empty collection
            return collect([]);
        }
    
        $models = $modelClass::all();
    
        // Check if the model should have appended attributes
        if (property_exists($modelClass, 'appends')) {
            $appends = (new $modelClass)->getAppends();
            // Manually append the attributes for each model in the collection
            $models = $models->each(function ($model) use ($appends) {
                foreach ($appends as $append) {
                    $model->append($append);
                }
            });
        }
    
        return $models;
    }
    

    public function headings(): array
    {
        $modelClass = Config::get("pages.{$this->entity}.model");
    
        if (!class_exists($modelClass)) {
            return [];
        }
    
        $tableName = (new $modelClass)->getTable();
        $columnNames = Schema::getColumnListing($tableName);
    
        // Fetch the column configurations from common_fields.php config
        $columnConfigs = Config::get('common_fields', []);
    
        // Include appended attributes if the model has any
        $appends = property_exists($modelClass, 'appends') ? (new $modelClass)->getAppends() : [];
    
        // Combine database columns and appended attributes
        $allAttributes = array_merge($columnNames, $appends);
    
        // Map each attribute to its label, fallback to attribute name if label not found
        $headings = array_map(function($attribute) use ($columnConfigs) {
            // Check if the attribute exists in the config and has a 'label' key
            if (isset($columnConfigs[$attribute]) && isset($columnConfigs[$attribute]['label'])) {
                return $columnConfigs[$attribute]['label'];
            }
            // Fallback to the attribute name itself if not found
            return $attribute;
        }, $allAttributes);
    
        return $headings;
    }
    
    
}
