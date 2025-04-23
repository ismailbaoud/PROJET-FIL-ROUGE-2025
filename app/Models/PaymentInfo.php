<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    
    protected $table = 'payment_info';
    protected $fillable = [
        'name',
        'address',
        'postal_code',
        'rib',
        'user_id'
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

}
