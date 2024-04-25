<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Task extends Model
{
    protected $attributes = [
        'due_at' => 'tomorrow',
    ];

    protected $fillable = [
        'title',
        'slug',
        'description',
        'due_at',
    ];

    protected function casts(): array
    {
        return [
            'completed_at' => 'datetime',
            'due_at' => 'datetime'
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

  
    public function taskList(): BelongsTo
    {
        return $this->belongsTo(TaskList::class);
    }
}
