<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;
use App\Models\Task;
use App\Models\User;
use Auth;
use Validator;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return auth()->user()->tasks;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user_id = auth()->user()->id;

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'desc' => 'max:255',
            'priority' => 'integer|min:0|max:3'
        ]);

        $task = Task::create([
            'name' => $request->name,
            'desc' => $request->desc,
            'priority' => $request->priority,
            'user_id' => $user_id,
        ]);
        return response()->json($task);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Task $task)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Task $id)
    {
        return $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'desc' => 'max:255',
            'priority' => 'integer|min:0|max:3'
        ]);

        $id->update([
            'name' => $request->name,
            'desc' => $request->desc,
            'priority' => $request->priority,
            'is_checked' => $request->is_checked
        ]);

        return response()->json($id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $id)
    {
        $id->delete();
        return Response::HTTP_OK;
    }
}
