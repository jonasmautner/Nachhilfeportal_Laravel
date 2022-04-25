<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'teacher', 'subject_semester'];

    public function learningoffer():HasOne {
        return $this->hasOne(Learningoffer::class, 'subject_id', 'id');
    }
}
