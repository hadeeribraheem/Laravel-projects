<?php

namespace App\Http\Controllers;

use App\Actions\HandleDataBeforeSaveAction;
use App\Filters\NameFilter;
use App\Http\Requests\YearsRequest;
use App\Http\Resources\YearsResource;
use App\Models\years;
use App\Services\Messages;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class YearController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = years::query()->orderBy('id','DESC');
        $result = app(Pipeline::class)
            ->send($data)
            ->through([
                /*GovernmentsIdFilter::class,*/
                NameFilter::class,
            ])
            ->thenReturn()
            ->paginate(10);
        return YearsResource::collection($result);
    }

    public function save($data)
    {

        // Attempt to update or create the record
        $output = years::query()->updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );
        // Return a success message
        return Messages::success(YearsResource::class::make($output), __('messages.saved_successfully'));
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(YearsRequest $request)
    {
        $data = $request->validated();
        $handled_data = HandleDataBeforeSaveAction::handle($data);
        return $this->save($handled_data);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $item = years::query()->find($id);

        if($item){
            return YearsResource::make($item);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(YearsRequest $request, string $id)
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
