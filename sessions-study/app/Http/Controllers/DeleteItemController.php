<?php

namespace App\Http\Controllers;

use App\Actions\DeleteFileFromPublicAction;
use App\Models\Images;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteItemController extends Controller
{
    public function delete()
    {
        if(request()->filled('model_name') && request()->filled('id')){
            //            $item =('App\Models\\' . request('model_name'))::query()->find(request('id'));
            //            if($item != null){
            //                $item->delete();
            //                return redirect()->back();
            //
            // Check if model is Images and proceed with deletion
            if (request('model_name') == 'Images') {
                $image = Images::query()->find(request('id'));
                DeleteFileFromPublicAction::delete('images', $image->name);

                /* $file_path = public_path('/images/' . $image->name);

                     // Delete the image file if it exists
                     if (file_exists($file_path)) {
                         unlink($file_path);
                     }

                     // Now delete the image record from the database*/
            }
            DB::select('DELETE FROM '.request('model_name').' WHERE id='.request('id'));
            return redirect()->back();

        }
    }
}
