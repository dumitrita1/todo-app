<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Task;
use App\Models\TaskList;
use App\Models\User;

class PlaygroundController extends Controller
{
    public function index(): void
    {
        $this->countStatsForPlaygroundUrl();
    }

    protected function findModelsWithLaravelQueryBuilder(): void
    {
        // Super Power #1: Laravel Query Builder
        $tasks = Task::query()
            ->where('slug', 'team-auswahl') // ->andWhere('slug', 'team-auswahl')
            ->orWhere('title', 'hura')
            ->orderBy('title', 'asc')
            ->limit(10)
            ->get(); // ->first();
    }

    protected function createModelInstanceWithTimestamps(): void
    {
        // Super Power #2: Automatic Timestamps
        $task = Task::create([
            'title' => 'Learn Laravel',
            'slug' => 'learn-laravel',
        ]);

        $task->created_at; // Erstellungsdatum
        $task->updated_at; // Aktualisierungsdatum
    }

    protected function protectAgainstMassAssignment(): void
    {
        // Super Power #3: Protect Against Mass Assignment
        $task = Task::create([
            'slug' => 'learn-about-mass-assignment',
            'user_id' => 1,
        ]);

        // Note: Only columns listed in the property $task->fillable can be used here.
        // All other columns for example user_id will be NULL.
    }

    protected function typeCastingOfModelProperties(): void
    {
        // Super Power #4: Property Type Casting
        $task = Task::find(3);
        var_dump($task->completed_at); // Automatically convert string columns to instances of DateTime/Carbon
    }

    protected function namedRoutes(): void
    {
        var_dump(route('playground'));
    }

    protected function countStatsForPlaygroundUrl(): void
    {
        $count = DB::table('stats')
            ->where('url', route('playground'))
            ->count();

        var_dump('The playground was visited ' . $count . ' times.');
    }
}
