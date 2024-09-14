<?php

namespace App\Actions;

use App\Models\Images;

class ImageModalSave
{
    public static function make($id, $model_name, $image_file)
    {
        /*Images::query()->where('imageable_id', $id)
            ->where('imageable_type', 'App\Models\\' . $model_name)
            ->delete();*/

        Images::query()->create([
            'imageable_id' => $id,
            'imageable_type' => 'App\Models\\' . $model_name,
            'name' => $image_file,
        ]);
    }
}
