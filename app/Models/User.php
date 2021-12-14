<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Balance;
use App\Models\Historic;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function balance(){
      
        //1 para 1 banco
        return $this->hasOne(Balance::class);


    }
    public function historics(){
        //1 para muitos
        return $this->hasMany(Historic::class);
    }


    public function getSender($sender){
       return $this->where('name', 'LIKE', "%$sender$")
        ->orWhere('email',$sender)
        ->get()
        ->first();

    }

    
}
