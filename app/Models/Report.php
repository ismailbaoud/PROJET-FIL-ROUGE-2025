<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    
    protected $fillable = [
        'title',
        'type',
        'target',
        'steps',
        'impact',
        'poc',
        'poc_type',
        'reward',
        'pointe',
        'severity',
        'status',
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
