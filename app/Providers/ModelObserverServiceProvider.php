<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Model;
use App\Observers\BaseObserver;

class ModelObserverServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerObservers();
    }

    protected function registerObservers()
    {
        $modelPath = app_path('Models');
        $modelFiles = File::allFiles($modelPath);

        foreach ($modelFiles as $modelFile) {
            $modelClass = $this->getClassNameFromFile($modelFile);

            if (is_subclass_of($modelClass, Model::class)) {
                $modelClass::observe(BaseObserver::class);
            }
        }
    }

    protected function getClassNameFromFile($file)
    {
        $namespace = 'App\\Models';
        $className = str_replace('.php', '', $file->getFilename());

        return $namespace . '\\' . $className;
    }
}
