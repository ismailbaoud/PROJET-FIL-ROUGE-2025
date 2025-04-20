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

    public function users(){
        return $this->belongsToMany();
    }


    public function entreprise(){
        return $this->belongsTo(User::class, 'user_id');
    }


    public function hunters(){
        return $this->belongsToMany(User::class, 'program_user')
                    ->using(\App\Models\ProgramUser::class)
                    ->withTimestamps();
    }

    public function scopes(){
        return $this->hasMany(Scope::class);
    }


}
