<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terminal extends Model
{
    use HasFactory;

    protected $table = 'terminals';

    public function user()
    {
        return $this->morphOne(User::class, 'settings');
    }
}
