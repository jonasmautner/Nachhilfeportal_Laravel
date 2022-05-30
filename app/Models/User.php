<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    protected $fillable = ['firstname', 'lastname', 'email', 'password', 'telephone', 'imagepath', 'is_learner', 'user_semester'];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = ['email_verified_at' => 'datetime'];

    public function createoffer():HasMany{
        return $this->hasMany(Learningoffer::class);
    }

    public function acceptoffer():HasMany{
        return $this->hasMany(Learningoffer::class);
    }

    public function getJWTCustomClaims() {
        return ['user' => ['id' => $this->id]];
    }

    public function getJWTIdentifier() {
        return $this->getKey();
    }
}
