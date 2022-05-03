<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'teacher', 'subject_semester'];

    public function learningoffers():HasMany {
        return $this->hasMany(Learningoffer::class);
    }
}
