<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
                            'name',
                            'url',
                            'country',
                            'state',
                            'user_id'];
    
    public function User(){
        return $this->belongsTo();
    }
}
