<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubHall extends Model
{
    use HasFactory;

    protected $table = 'subhalls';

    public function user()
    {
        return $this->morphOne(User::class, 'settings');
    }
}
