<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        "title",
        "description",
        "min_reward",
        "max_reward",
        "user_id",
    ];
}
