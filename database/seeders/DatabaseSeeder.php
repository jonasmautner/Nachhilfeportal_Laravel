<?php

namespace Database\Seeders;

use App\Models\Meetingdate;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run() {
        $this->call(UsersTableSeeder::class);
        $this->call(MeetingdatesTableSeeder::class);
        $this->call(LearningoffersTableSeeder::class);
    }
}
