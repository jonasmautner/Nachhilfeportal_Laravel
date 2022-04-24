<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Learningoffer extends Model
{
    use HasFactory;

    protected $fillable = ['subject_id', 'description', 'owner_id', 'learner_id', 'accepted_at'];

    public function subject():hasOne {
        return $this->hasOne(Subject::class, 'id', 'subject_id');
    }

    public function owner():BelongsTo {
        return $this->belongsTo(User::class, 'id', 'owner_id');
    }

    public function learner():BelongsTo {
        return $this->belongsTo(User::class, 'id', 'learner_id');
    }

    public function meetingdates():BelongsToMany {
        return $this->belongsToMany(Meetingdate::class)->withTimestamps();
    }

}
