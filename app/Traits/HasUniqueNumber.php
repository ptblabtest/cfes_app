<?php

namespace App\Traits;

trait HasUniqueNumber
{
    protected static function bootHasUniqueNumber()
    {
        static::creating(function ($model) {
            $config = $model->getUniqueNumberConfig();
            $field = $config['field'];
            $format = $config['format'];
            $model->$field = static::generateUniqueNumber($field, $format);
        });
    }

    protected static function generateUniqueNumber($fieldName, $format)
    {
        $prefix = $format['prefix'];
        $size = $format['size'];
        
        $lastRecord = self::where($fieldName, 'like', $prefix.'%')
                            ->orderBy($fieldName, 'desc')
                            ->first();

        if ($lastRecord) {
            $lastNumber = intval(str_replace($prefix, '', $lastRecord->$fieldName));
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        return $prefix . str_pad($newNumber, $size, '0', STR_PAD_LEFT);
    }

    // Models must implement this method to provide the field name and format
    abstract public function getUniqueNumberConfig();
}
