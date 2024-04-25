<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function logout(): string
    {
        Auth::forgetUser();
        $this->redirectTo('/login');
    }
}