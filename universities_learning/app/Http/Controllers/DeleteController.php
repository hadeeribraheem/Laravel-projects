<?php

namespace App\Http\Controllers;

use App\Actions\DeleteFileFromPublicAction;
use App\Http\Requests\DeleteFormRequest;
use App\Models\Images;
use App\Services\Messages;
use Illuminate\Http\Request;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(DeleteFormRequest $request)
    {

        // Check if the model is 'images'
        if (request('model_name') == 'images') {
            $image = Images::query()->find(request('id'));
            $image->delete();
            DeleteFileFromPublicAction::delete('images', $image->name);

        } else {
            $modelClass = 'App\Models\\' . request('model_name');
            $item = $modelClass::query()->find(request('id'));
            if ($item){
                $item->delete();
            }
        }

        return Messages::success('', __('messages.deleted_successfully'));
    }
}
