<?php

namespace App\Services;

class DeleteEntityService
{

    public static function delete(string $modelName, int $id)
    {
        $modelClass = 'App\\Models\\' . $modelName;

        if (class_exists($modelClass)) {
            $entity = $modelClass::find($id);

            if ($entity) {
                return $entity->delete();
            }
        }

        return null;
    }
}
