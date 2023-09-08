<?php

namespace App\Http\Controllers;

use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return DB::table('tasks')->select('*')->get();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('tasks.create', ['user' => $request->user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        $validated = $request->validated();

        DB::table('tasks')->insert(
            [
                'content' => $validated['content'],
                'user_id' => $validated['user'],
            ]
        );

        return redirect()->route('users.show', ['user' => $validated['user']]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        $validated = $request->validated();

        DB::table('tasks')->update(
            [
                'content' => $validated['content'],
            ]
        );

        return redirect()->route('users.show', ['user' => $task->user_id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        DB::table('tasks')->delete($task->id);

        return redirect()->route('users.show', ['user' => $task->user_id]);
    }
}
