<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diller extends Model
{
    use HasFactory;

    protected $table = 'dillers';

    public function user()
    {
        return $this->morphOne(User::class, 'settings');
    }
}
