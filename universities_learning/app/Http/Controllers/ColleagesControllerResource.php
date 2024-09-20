<?php

namespace App\Http\Controllers;

use App\Actions\HandleDataBeforeSaveAction;
use App\Filters\EndDateFilter;
use App\Filters\GovernmentIdFilter;
use App\Filters\GovernmentsIdFilter;
use App\Filters\NameFilter;
use App\Filters\StartDateFilter;
use App\Http\Requests\ColleagueFormRequest;
use App\Http\Requests\GovernmentFormRequest;
use App\Http\Resources\ColleaguesResource;
use App\Http\Resources\GovernmentResource;
use App\Models\colleagues;
use App\Models\colleagues_years;
use App\Models\governments;
use App\Services\Messages;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Collection;

class ColleagesControllerResource extends Controller
{

    public function __construct(){
        $this->middleware('auth:sanctum', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = colleagues::query()->with('government')
                                    ->with('years')
                                    ->orderBy('id','DESC');
        $result = app(Pipeline::class)
            ->send($data)
            ->through([
                NameFilter::class,
                StartDateFilter::class,
                EndDateFilter::class,
                GovernmentIdFilter::class,

            ])
            ->thenReturn()
            ->paginate(10);
        // Sync the many-to-many relationship for 'years'
        $result->years()->sync($data['years_ids']); // Example: [1, 2, 3]

        // Eager load the 'government' relationship
        $result->load(['government']);
       // return ColleaguesResource::collection($result);
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
        DB::beginTransaction();
        //dd($data);
        $data['years_ids'] = json_decode($data['years_ids'], true);

        $output = colleagues::query()->updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );

        // Sync the many-to-many relationship for 'years'
        $output->years()->sync($data['years_ids']); // Example: [1, 2, 3]

        // Eager load the 'government' relationship
        $output->load(['government']);

        /*colleagues_years::query()
            ->where('college_id','=',$output->id)
            ->delete();

        foreach ($data['years_ids'] as $year) {
            colleagues_years::query()->create(
                [
                    'college_id' => $output->id,
                    'year_id' => $year['year_id'],
                ]
            );*/
            // year_id , id
            /*colleagues_years::query()->updateOrCreate(
                ['id' => $year['id'] ?? null],
                [
                    'college_id' => $output->id,
                    'year_id' => $year['year_id'],
                ]
            );*/
      /*  }

        $output->load(['government']);*/

        DB::commit();

        // Return a success message
        return Messages::success(ColleaguesResource::make($output), __('messages.saved_successfully'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(ColleagueFormRequest $request)
    {

        $data = $request->validated();
        $handled_data = HandleDataBeforeSaveAction::handle($data);
       // dd($handled_data);
        return $this->save($handled_data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = colleagues::query()->find($id);

        if($item){
            return ColleaguesResource::make($item);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ColleagueFormRequest $request, string $id)
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
