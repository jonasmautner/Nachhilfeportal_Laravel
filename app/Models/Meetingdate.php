<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Meetingdate extends Model
{
    use HasFactory;

    protected $fillable = ['day', 'from', 'to'];

    public function learningoffers():BelongsToMany {
        return $this->belongsToMany(Learningoffer::class)->withTimestamps();
    }

}
