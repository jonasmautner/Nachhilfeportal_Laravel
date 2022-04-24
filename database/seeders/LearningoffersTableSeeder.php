<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Learningoffer;
use App\Models\Meetingdate;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LearningoffersTableSeeder extends Seeder
{
    public function run()
    {
        $offer = new Learningoffer();
        $offer->description = "Lorem ipsum dolor sit amet.";
        $offer->accepted_at = new Carbon(); // könnte auch null sein

        $user = User::all()->first();
        $offer->owner()->associate($user);
        $offer->learner()->associate($user);

        $offer->save();

        $dates = Meetingdate::all()->pluck('id');
        $offer->meetingdates()->sync($dates);
        $offer->save();
    }
}
