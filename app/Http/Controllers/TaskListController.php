<?php

namespace App\Http\Controllers;

use App\Models\TaskList;
use App\Models\Task;
use App\Models\User;

class TaskListController extends Controller
{
    public function index()
    {
        $user = User::current();
    
        return view('pages/user', [
            'user' => $user,
            'id' => $user->id,
            'lists' => $user->taskLists,
        ]);
    }

    public function show(string $slug)
    {
        $list = TaskList::where('slug', $slug)->firstOrFail();
        $tasks = Task::where('task_list_id', $list->id)->get();

        return view('pages/lists', [
            'list' => $list,
            'tasks' => $tasks,
            'user_id' => $list->user_id,
        ]);
    }
}