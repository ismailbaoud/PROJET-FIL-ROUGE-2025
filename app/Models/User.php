<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable 
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'userName',
        'email',
        'password',
        'role',
        'status'
    ];

    public function Profile(){
        return $this->hasOne(Profile::class);
    }

    public function createdPrograms(){
        return $this->hasMany(Program::class);
    }

    public function joinedPrograms(){
        return $this->belongsToMany(Program::class, 'program_user')
                    ->using(\App\Models\ProgramUser::class)
                    ->withTimestamps();
    }

    public function reports(){
        return $this->hasMany(Report::class, 'user_id');
    }

    public function programs(){
        return $this->hasMany(Program::class);
    }

    public function paymentInfo(){
        return $this->hasOne(PaymentInfo::class);
    }


    public function wallet()
    {
        return $this->hasOne(EntrepriseWallet::class);
    }



    public function sentTransactions(){
        return $this->hasMany(Transaction::class, 'from_user_id');
    }

    public function receivedTransactions(){
        return $this->hasMany(Transaction::class, 'to_user_id');
    }




    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array{
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    
}
