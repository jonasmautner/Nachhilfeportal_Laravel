<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Learningoffer extends Model
{
    use HasFactory;

    protected $fillable = ['subject', 'description', 'owner_id', 'learner_id', 'created_at', 'accepted_at'];

    public function owner():BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function learner():BelongsTo {
        return $this->belongsTo(User::class);
    }

    public function meetingdates():BelongsToMany {
        return $this->belongsToMany(Meetingdate::class)->withTimestamps();
    }

}
