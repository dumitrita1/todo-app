<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;


class TaskController extends Controller
{
    public function show()
    {
        $tasks = Task::all();
        $user_id = $task->user_id;
        $list_status = $task->taskList->status;
        return view('pages.task', [
            'task' => $task,
            'user_id' => $user_id,
            'list_status' => $list_status, 
        ]);
    }
    

    public function store()
    {
        request()->validate([
            'title' => 'request|min:3|max:20',
        ]);
        $task =Task::create(
            [
            'title' => request()->get('title',''),
            'description'=> request()->get('description', ''),
            'due_at' => request()->get('date',''),
        ]
    );

    return redirect()->route('maria.show')
    
    ->with('success','Sie haben eine Aufgabe angelegt');
    }
   
    
}