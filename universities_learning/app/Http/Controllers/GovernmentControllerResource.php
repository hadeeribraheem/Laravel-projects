<?php

namespace App\Http\Controllers;

use App\Actions\HandleDataBeforeSaveAction;
use App\Filters\EndDateFilter;
use App\Filters\GovernmentsIdFilter;
use App\Filters\NameFilter;
use App\Filters\StartDateFilter;
use App\Http\Requests\GovernmentFormRequest;
use App\Models\governments;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class GovernmentControllerResource extends Controller
{

    public function __construct(){
        $this->middleware('auth:sanctum', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = governments::query()->orderBy('governments_id','DESC');
        $result = app(Pipeline::class)
            ->send($data)
            ->through([
                /*GovernmentsIdFilter::class,*/
                NameFilter::class,
                StartDateFilter::class,
                EndDateFilter::class,
            ])
            ->thenReturn()
            ->paginate(10);
        return $result;
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

    /**
     * Store a newly created resource in storage.
     */
    public function store(GovernmentFormRequest $request)
    {
        $data = $request->validated();
        $handled_data = HandleDataBeforeSaveAction::handle($data);
        return $handled_data;
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
