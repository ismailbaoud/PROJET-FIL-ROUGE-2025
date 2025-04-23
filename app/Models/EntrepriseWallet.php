<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EntrepriseWallet extends Model
{
    use HasFactory;

    protected $table = 'entreprise_wallet';

    protected $fillable = [
        'user_id',
        'balance',
        'currency',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
