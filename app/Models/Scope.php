<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Scope extends Model
{
    protected $fillable = [
        'target',
        'target_type',
        'type',
        'instructions',
        'program_id',
    ];
    
    
    public function program(){
        return $this->belongsTo(Program::class);
    }

}
