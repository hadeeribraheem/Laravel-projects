<?php

namespace App\Http\Controllers;

use App\Actions\ImageModalSave;
use App\Http\Resources\ContactResoutce;
use App\Http\Resources\UserResource;
use App\Models\Contact;
use App\Models\User;
use App\Services\DeleteEntityService;
use App\Services\Users\SaveUserInfoService;
use App\traits\upload_image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    use upload_image;

    public function users()
    {
        //dd('hello');
        $data = User::query()
            ->with('image')
            ->orderBy('id','DESC')
            ->paginate(2);
//            ->get();
        $users=UserResource::collection($data);
        return view('admin.list_users',compact('users'));
    }

    public function edit_user($id)
    {
        $user = User::findOrFail($id);
        return view('admin.update_user', compact('user'));

    }

    public function update_user(Request $request, $id){
        $data = $request->all();

        // Handle image file upload if provided
        // Delete the old image from storage

        if ($request->hasFile('personal_image')) {
            $user = User::find($id);
            if ($user && $user->image) {
                $oldImagePath = public_path('images/' . $user->image->name);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $file = $request->file('personal_image');
            $filename = $this->upload($file,'users');
            ImageModalSave::make($id, 'User', $filename);
        }
        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            // If the password field is empty, remove it from the $data array
            unset($data['password']);
        }
        $user  = SaveUserInfoService::save($data,$id);
        return redirect()->route('dashboard.edit.user', $user->id)->with('success', 'Updated successfully!');
    }

    public function contacts()
    {
        $data = Contact::all();
        $contacts=ContactResoutce::collection($data);
        //dd($contacts);
        return view('admin.view_contacts',compact('contacts'));
    }
    public function deleteUser($id)
    {
        $result = DeleteEntityService::delete('User', $id);

        if ($result) {
            return redirect()->back()->with('success', 'User deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'User not found or could not be deleted.');
        }
    }
    public function deleteContact($id)
    {
        $result = DeleteEntityService::delete('Contact', $id);

        if ($result) {
            return redirect()->back()->with('success', 'User deleted successfully!');
        } else {
            return redirect()->back()->with('error', 'User not found or could not be deleted.');
        }
    }

    /*
     * class DeleteController extends Controller
        {
            public function delete()
            {
                if(request()->filled('model_name') && request()->filled('id')){
        //            $item =('App\Models\\' . request('model_name'))::query()->find(request('id'));
        //            if($item != null){
        //                $item->delete();
        //                return redirect()->back();
        //            }
                  DB::select('DELETE FROM '.request('model_name').' WHERE id='.request('id'));
                    return redirect()->back();

                }
            }
        }
     * */
}
