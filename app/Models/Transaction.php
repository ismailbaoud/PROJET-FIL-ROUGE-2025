<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'from_user_id',
        'to_user_id',
        'report_id',
        'program_id',
        'amount',
        'method',
        'status',
    ];

    public function fromUser()
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function toUser()
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    public function report()
    {
        return $this->belongsTo(Report::class);
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
