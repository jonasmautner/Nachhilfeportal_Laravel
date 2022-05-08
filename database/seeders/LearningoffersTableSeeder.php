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
        $offer1->description = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.';
        $offer1->accepted_at = new Carbon(); // könnte auch null sein

        $user1a = User::all()->find(1);
        $user1b = User::all()->find(4);
        $offer1->owner()->associate($user1a);
        $offer1->learner()->associate($user1b);

        $subject1 = Subject::all()->find(1);
        $offer1->subject()->associate($subject1);

        $offer1->save();

        $dates1 = Meetingdate::all()->pluck('id');
        $offer1->meetingdates()->sync($dates1);
        $offer1->save();

        //----------------------------------------

        $offer2 = new Learningoffer();
        $offer2->description = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.';

        $user2 = User::all()->find(3);
        $offer2->owner()->associate($user2);

        $subject2 = Subject::all()->find(2);
        $offer2->subject()->associate($subject2);

        $offer2->save();

        $dates2 = Meetingdate::all()->pluck('id');
        $offer2->meetingdates()->sync($dates2);
        $offer2->save();

        //----------------------------------------

        $offer3 = new Learningoffer();
        $offer3->description = 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod.';

        $user3 = User::all()->find(3);
        $offer3->owner()->associate($user3);

        $subject3 = Subject::all()->find(3);
        $offer3->subject()->associate($subject3);

        $offer3->save();

        $dates3 = Meetingdate::all()->pluck('id');
        $offer3->meetingdates()->sync($dates3);
        $offer3->save();
    }
}
