<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * Qiwi payment system
     *
     * @param $info
     */
    public static function qiwi($info)
    {

    }
    /**
     * Yandex payment system
     *
     * @param $info
     */
    public static function yandex($info)
    {

    }
}
