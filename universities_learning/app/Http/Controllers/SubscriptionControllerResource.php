<?php

namespace App\Http\Controllers;

use App\Actions\HandleDataBeforeSaveAction;
use App\Filters\EndDateFilter;
use App\Filters\GovernmentsIdFilter;
use App\Filters\NameFilter;
use App\Filters\StartDateFilter;
use App\Filters\UserIdFilter;
use App\Filters\YearIdFilter;
use App\Http\Requests\GovernmentFormRequest;
use App\Http\Requests\SubjectFormRequest;
use App\Http\Requests\SubscriptionFormRequest;
use App\Http\Resources\GovernmentResource;
use App\Http\Resources\SubjectResource;
use App\Http\Resources\SubscriptionResource;
use App\Models\governments;
use App\Models\subjects;
use App\Models\Subscriptions;
use App\Services\Messages;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class SubscriptionControllerResource extends Controller
{

    public function __construct(){
        $this->middleware('auth:sanctum', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = subscriptions::query()
            ->with(['user', 'subject'])
            ->orderBy('id', 'DESC');

        $result = app(Pipeline::class)
            ->send($data)
            ->through([
                StartDateFilter::class,
                EndDateFilter::class,
                UserIdFilter::class,
                //SubjectIdFilter::class,
            ])
            ->thenReturn()
            ->paginate(10);

        return SubscriptionResource::collection($result);
        // DRY (Don't Repeat Yourself) principle used to prevent code duplication

        /* if (request()->filled('name')) {
             $data->where('name', 'LIKE', '%' . request('name') . '%');
         }

         if (request()->filled('start_date')) {
             $data->where('created_at', '>=', request('start_date'));
         }

         if (request()->filled('end_date')) {
             $data->where('created_at', '<=', request('end_date'));
         }

         return $data->get();*/
    }
    public function save($data)
    {
        $output = subscriptions::query()->updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );
        $output->load('user');
        $output->load('year');
        return Messages::success(SubscriptionResource::make($output), __('messages.saved_successfully'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(SubscriptionFormRequest $request)
    {
        $data = $request->validated();
       /* $handled_data = HandleDataBeforeSaveAction::handle($data);
        $handled_data['year_id'] = $handled_data['yearid'];
        unset( $handled_data['yearid']);*/
        return $this->save($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = governments::query()->find($id);

        if($item){
            return $item;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubjectFormRequest $request, string $id)
    {
        $data = $request->validated();
        $handled_data = HandleDataBeforeSaveAction::handle($data);
        $handled_data['id'] = $id;

        return $this->save($handled_data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
