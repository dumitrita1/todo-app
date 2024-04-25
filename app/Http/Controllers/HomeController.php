<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Task;
use App\Models\TaskList;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::find(1);

        return view('pages/home', ['lists' => $user->taskLists]);
    }
    }
