<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuperAgent extends Model
{
    use HasFactory;

    protected $table = 'superagents';

    public function user()
    {
        return $this->morphOne(User::class, 'settings');
    }
}
