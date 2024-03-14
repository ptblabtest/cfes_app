<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class RelationshipService
{
    protected function prepareRelationships(array $config): array
    {
        $relationships = $config['relationship'] ?? [];
        if (isset($config['relation_show']) && is_array($config['relation_show'])) {
            foreach ($config['relation_show'] as $relation => $relationConfig) {
                $relationships = array_merge($relationships, [$relation]);
                if (!empty($relationConfig['relationship'])) {
                    foreach ($relationConfig['relationship'] as $nestedRelation) {
                        $relationships[] = "{$relation}.{$nestedRelation}";
                    }
                }
            }
        }
        return array_unique($relationships);
    }

    public function processRelationShowData(Model $item, array $config): array
    {
        $relationShowData = $config['relation_show'] ?? [];
        $parentField = $config['parent'] ?? null;

        foreach ($relationShowData as $relationKey => &$data) {
            $relatedItems = $this->fetchRelatedItems($item, $data, $relationKey, $parentField);

            // Set 'isCreatable' and update 'create' label
            $data['isCreatable'] = $this->determineCreatability($relatedItems, $parentField);
            $data['create']['label'] = "Isi " . $data['title'];
        }

        return $relationShowData;
    }

    protected function fetchRelatedItems(Model $item, array &$data, string $relationKey, ?string $parentField): Collection
    {
        if ($data['isPolymorphic'] ?? false) {
            return $this->handlePolymorphicRelation($item, $data);
        } else {
            // Fetch related items for standard relationships
            $relatedItems = $item->$relationKey()->get();

            // For standard relationships, append parent ID if applicable
            if ($parentField) {
                $parentId = $item->{$parentField} ?? $item->id;
                $data['create']['url'] .= "?$parentField=$parentId";
            }

            return $relatedItems;
        }
    }

    protected function handlePolymorphicRelation(Model $item, array &$data): Collection
    {
        $relatedModelClass = $data['model'] ?? null;
        if (!$relatedModelClass) {
            return collect();
        }

        // Construct 'create' URL for polymorphic relationships
        $modelTypeValue = urlencode(get_class($item));
        $modelIdValue = $item->id;
        $data['create']['url'] = rtrim($data['create']['url'], '/') . "?{$data['model_type_field']}=$modelTypeValue&{$data['model_id_field']}=$modelIdValue";

        // Fetch related items based on dynamically determined model_id and model_type
        return $relatedModelClass::where([
            $data['model_id_field'] => $item->id,
            $data['model_type_field'] => get_class($item),
        ])->get();
    }

    protected function determineCreatability(Collection $relatedItems, ?string $parentField): bool
    {
        $isCreatable = true;
        foreach ($relatedItems as $relatedItem) {
            if ($parentField && isset($relatedItem->$parentField)) {
                $isCreatable = false;
                break;
            }
        }
        return $isCreatable;
    }

    public function getItemWithDetails(string $entity, int $id, array $config): Model
    {
        $relationships = $this->prepareRelationships($config);
        return $config['model']::with($relationships)->findOrFail($id);
    }
}
