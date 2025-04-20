<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class ProgramUser extends Pivot
{
    protected $table = 'program_user'; 

    protected $fillable = [
        'user_id',
        'program_id',
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function program(){
        return $this->belongsTo(Program::class);
    }

}
