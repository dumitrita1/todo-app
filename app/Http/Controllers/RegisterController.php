<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function show(): string
    {
        $user = User::first();
        return view('pages/registers', ['register' => $user]);
    }
    
    public function store()
    {
        $user = User::create(
            [
            'name' => request()->get('name',''),
            'email'=> request()->get('email', ''),
            'password' => request()->get('password',''),
        ]
    );

    return redirect()->route('login.show')
    
    ->with('success','Sie haben sich erfolgreich registriert');
    }
   
}