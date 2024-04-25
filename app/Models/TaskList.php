<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TaskList extends Model
{
    protected $attributes = [
        'slug' => 'java-project',
        'status' => 0,
    ];

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'slug',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'status' => 'int'
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
