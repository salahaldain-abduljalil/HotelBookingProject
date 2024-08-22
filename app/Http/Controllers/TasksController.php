<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTasksRequest;
use App\Http\Resources\TasksResource;
use App\Models\Tasks;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TasksController extends Controller
{
    use HttpResponses;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      return TasksResource::collection(
        Tasks::where('user_id',Auth::user()->id)->get()
      );
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTasksRequest $request)
    {
        $request->validated($request->all());
        $task = Tasks::create([
            'user_id' => Auth::user()->id,
            'name'    =>$request->name,
            'description' => $request->description,
            'priority'   => $request->priority
        ]);
        return new TasksResource($task);

    }

    /**
     * Display the specified resource.
     */
    public function show(Tasks $task)
    {
        return $this->isNotAuthorized($task) ? $this->isNotAuthorized($task) : new TasksResource($task);

    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tasks $task)
    {
        if(Auth::user()->id !== $task->user_id){
            return $this->error('','You are not Authorized to make this request',403);
        }
        $task->update($request->all());
        return new TasksResource($task);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tasks $task)
    {

        return $this->isNotAuthorized($task) ? $this->isNotAuthorized($task) :    $task->delete();

       // return response(null,204);
    }
    private function isNotAuthorized($task){
        if(Auth::user()->id !== $task->user_id){
            return $this->error('','You are not Authorized to make this request',403);
        }

    }
}
