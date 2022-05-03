<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
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

}
