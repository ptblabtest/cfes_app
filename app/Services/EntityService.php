<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;

class EntityService
{
    public function getItems(string $entity, array $config): Collection
    {
        // Instantiate the model to use non-static methods
        $modelInstance = new $config['model'];
        $query = $modelInstance->newQuery();

        $user = Auth::user();



        if (!empty($config['relationship']) && is_array($config['relationship'])) {
            $query->with($config['relationship']);
        }

        return $query->get();
    }
}
