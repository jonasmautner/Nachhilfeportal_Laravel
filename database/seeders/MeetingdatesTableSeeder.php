<?php

namespace Database\Seeders;

use App\Models\Meetingdate;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class MeetingdatesTableSeeder extends Seeder
{
    public function run()
    {
        $date1 = new Meetingdate();
        $date1->day = new Carbon();
        $date1->from = Carbon::create(2021, 3, 10, 13, 0, 0);
        $date1->to = Carbon::create(2021, 3, 10, 13, 30, 0);
        $date1->save();

        $date2 = new Meetingdate();
        $date2->day = new Carbon();
        $date2->from = Carbon::create(2021, 3, 11, 13, 0, 0);
        $date2->to = Carbon::create(2021, 3, 11, 13, 30, 0);
        $date2->save();
    }
}
