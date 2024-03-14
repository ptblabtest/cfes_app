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

        // Ensure the user has the 'user' role before applying 'created_by' filtering
        if ($user->hasRole('user')) {
            // Use the instantiated model to get the table name and check for 'created_by' column
            if (Schema::hasColumn($modelInstance->getTable(), 'created_by')) {
                // Apply filtering to include only items created by the logged-in user
                $query->where('created_by', $user->id);
            }
        }

        if (!empty($config['relationship']) && is_array($config['relationship'])) {
            $query->with($config['relationship']);
        }

        return $query->get();
    }
}
