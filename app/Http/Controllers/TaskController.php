<?php

namespace App\Http\Controllers;

use App\Task;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CreateTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($user)
    {
        $tasks = DB::table('users')
            ->join('tasks',  'users.id', '=', 'tasks.user_id')
            ->where('tasks.user_id', $user)
            ->select(
                'tasks.*',
                'users.first_name',
                'users.last_name',
            )
            ->paginate(config('constants.pagination'));

        $tasks->user_id = $user;

        foreach ($tasks->items() as $task) {
            $task->full_name = $task->first_name . ' ' . $task->last_name;
        }

        return view('task.index', compact('tasks', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user)
    {
        return view('task.add', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateTaskRequest $request, $user)
    {
        $request->flash();

        DB::table('tasks')->insert(
            array_merge(
                $request->only(['name', 'description']),
                [
                    'user_id' => $user,
                ]
            )
        );

        return redirect()->route('task.index', ['user' => $user]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($task, $user)
    {
        $task = DB::table('tasks')->find($task);

        return view('task.show', compact('user', 'task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($task, $user)
    {
        $task = DB::table('tasks')->find($task);

        return view('task.edit', compact('task', 'user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTaskRequest $request, $task, $user)
    {
        DB::table('tasks')
            ->where('id', $task)
            ->update([
                'name' => $request->name,
                'description' => $request->description,
                'isDone' => $request->isDone ? Task::IS_DONE : Task::IS_NOT_DONE,
            ]);

        return redirect()->route('task.index', ['user' => $user]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($task, $user)
    {
        DB::table('tasks')->where('id', $task)->delete();

        return redirect()->route('task.index', ['user' => $user]);
    }
}
