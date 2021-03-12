<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubAgent extends Model
{
    use HasFactory;

    protected $table = 'subagents';

    public function user()
    {
        return $this->morphOne(User::class, 'settings');
    }
}
