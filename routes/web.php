<?php


use App\Http\Middleware\Authenticate;
use App\Http\Middleware\HasRole;
use App\Http\Middleware\TrackVisitor;
use App\Http\Middleware\Password;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlaygroundController;
use App\Http\Controllers\TaskListController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Models\Task;
use App\Models\Register;
use App\Models\User;
use App\Models\TodoTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

$password = request('password');

if ($password === '12345') {
    
}
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('/dev/playground', [PlaygroundController::class, 'index'])
    ->name('playground')
    ->middleware([
        Password::class.':654321',
        HasRole::class,
        TrackVisitor::class,
    ]);

Route::get('/tasks/{slug}', [TaskController::class, 'show']);

Route::get('/tasks/{slug}/{userId}', [TaskController::class, 'show'])
    ->name('task.show');

Route::post('/tasks/{slug}/{userId}', [TaskController::class, 'store'])
    ->name('task.create');

Route::get('/lists', [TaskListController::class, 'index'])
    ->name('lists.index');

Route::get('/lists/{slug}', [TaskListController::class, 'show'])
    ->name('lists.show');

Route::get('/login', [LoginController::class, 'show'])
    ->name('login');

Route::post('/login', [LoginController::class, 'login'])
    ->name('login');

Route::get('/logout', [LogoutController::class, 'logout'])
    ->name('logout')
    ->middleware(Authenticate::class);

Route::get('/register', [RegisterController::class, 'show'])
    ->name('register');

Route::post('/register', [RegisterController::class, 'store'])
    ->name('register');

Route::get('/{name}', [UserController::class, 'show'])
    ->name('user.show')
    ->middleware([
        Password::class.':123456',
    ]);;
