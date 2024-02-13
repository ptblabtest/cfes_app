<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\MediaLibrary\HasMedia;


class EntityService
{
    public function __construct()
    {
    }

    public function getItems($entity, $config)
    {
        abort_unless($config, 404);

        $query = $config['model']::query();

        // Check if the authenticated user has the "user" role and adjust the query
        $user = Auth::user();
        if ($user->hasRole('user') && !empty($user->userDetail->location_id)) {
            $locationId = $user->userDetail->location_id;
            $query->where('location_id', $locationId);
        }


        if (isset($config['relationship']) && is_array($config['relationship'])) {
            $query->with($config['relationship']);
        }

        return $query->get();
    }

    public function getItemWithDetails($entity, $id, $config)
    {
        abort_unless($config, 404);

        $modelClass = $config['model'];
        $relationships = $this->prepareRelationships($config);

        return $modelClass::with($relationships)->findOrFail($id);
    }

    protected function prepareRelationships($config)
    {
        $relationships = array_merge(
            $config['relationship'] ?? [],
            array_keys($config['relation_show'] ?? [])
        );

        if (isset($config['relation_show']) && is_array($config['relation_show'])) {
            foreach ($config['relation_show'] as $relation => $relationConfig) {
                if (!empty($relationConfig['relationship'])) {
                    foreach ($relationConfig['relationship'] as $nestedRelation) {
                        $relationships[] = "{$relation}.{$nestedRelation}";
                    }
                }
            }
        }

        return $relationships;
    }

    public function processRelationShowData($item, $config)
    {
        $relationShowData = $config['relation_show'] ?? [];
        if (!empty($relationShowData)) {
            foreach ($relationShowData as $relation => &$data) {
                $relatedItems = $item->$relation;
                $data['isCreatable'] = true;

                if (!$relatedItems->isEmpty() && in_array(HasMedia::class, class_implements($relatedItems->first()->getMorphClass()))) {
                    $relatedItems = $this->loadMediaForItems($relatedItems, get_class($relatedItems->first()));
                }

                foreach ($relatedItems as $relatedItem) {
                    if (isset($relatedItem->project_id)) {
                        $data['isCreatable'] = false;
                        break;
                    }

                    if (method_exists($relatedItem, 'loadApproval')) {
                        // Assuming loadApproval method exists or similar logic
                        $relatedItem->loadApproval();
                    }
                }

                if (isset($data['create']['url'])) {
                    $data['create']['url'] .= $item->id;
                }
            }
        }

        return $relationShowData;
    }

    public function getItem($entity, $id, $config)
    {
        abort_unless($config, 404);

        $modelClass = $config['model'];
        $relationships = $config['relationship'] ?? [];

        $item = $modelClass::with($relationships)->findOrFail($id);

        return $item;
    }

    public function loadMediaForItems(Collection $items, $class)
    {
        if (in_array(HasMedia::class, class_implements($class))) {
            $items->load('media');
        }

        return $items;
    }

    public function loadMediaForItem(Model $item, $class)
    {
        // Ensure the class uses HasMedia and then load media
        if (in_array(HasMedia::class, class_implements($class))) {
            $item->load('media');
        }

        return $item;
    }

    public function handleMediaUploads($record, Request $request, $fields)
    {
        foreach ($fields as $field => $properties) {
            if (isset($properties['type']) && ($properties['type'] === 'file' || $properties['type'] === 'image') && $request->hasFile($field)) {
                if (method_exists($record, 'clearMediaCollection')) {
                    $record->clearMediaCollection($field);
                }

                $record->addMediaFromRequest($field)
                    ->toMediaCollection($field);
            }
        }
    }
}
