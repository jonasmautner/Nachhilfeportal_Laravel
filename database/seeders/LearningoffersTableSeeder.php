<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\User;
use App\Models\Learningoffer;
use App\Models\Meetingdate;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class LearningoffersTableSeeder extends Seeder
{
    public function run()
    {
        $offer1 = new Learningoffer();
        $offer1->description = "Lorem ipsum dolor sit amet.";
        $offer1->accepted_at = new Carbon(); // könnte auch null sein

        $user1 = User::all()->first();
        $offer1->owner()->associate($user1);
        $offer1->learner()->associate($user1);

        $subject1 = Subject::all()->first();
        $offer1->subject()->associate($subject1);

        $offer1->save();

        $dates1 = Meetingdate::all()->pluck('id');
        $offer1->meetingdates()->sync($dates1);
        $offer1->save();

        //----------------------------------------

        $offer2 = new Learningoffer();
        $offer2->description = 'Lorem ipsum dolor sit amet.';
        $offer2->accepted_at = new Carbon(); // könnte auch null sein

        $user2 = User::all()->first();
        $offer2->owner()->associate($user2);
        $offer2->learner()->associate($user2);

        $subject2 = Subject::all()->first();
        $offer2->subject()->associate($subject2);

        $offer2->save();

        $dates2 = Meetingdate::all()->pluck('id');
        $offer2->meetingdates()->sync($dates2);
        $offer2->save();
    }
}
