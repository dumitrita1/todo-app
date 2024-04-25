<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\TaskList;


class UserController extends Controller
{
    public function show(string $name)
    {
        $user = User::where('name', $name)->firstOrFail();

        $lists = $user->taskLists()->where('status', 1)->get();

        return view('pages/user', [
            'user' => $user,
            'id' => $user->id,
            'lists' => $lists,
        ]);
    }
}