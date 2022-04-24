<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'teacher', 'semester'];

    public function learningoffer():BelongsTo {
        return $this->belongsTo(Learningoffer::class, 'subject_id', 'id');
    }
}
