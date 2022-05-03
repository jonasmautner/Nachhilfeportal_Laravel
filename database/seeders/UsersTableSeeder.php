<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user1 = new User;
        $user1->firstname = 'Jonas';
        $user1->lastname = 'Mautner';
        $user1->email = 'jonas.mautner@gmail.com';
        $user1->password = bcrypt('Passwort1');
        $user1->is_learner = 0;
        $user1->user_semester = 6;
        $user1->save();

        $user2 = new User;
        $user2->firstname = 'Alexander';
        $user2->lastname = 'Schönmann';
        $user2->email = 'alex.schoenmann@gmail.com';
        $user2->password = bcrypt('Passwort2');
        $user2->is_learner = 1;
        $user2->user_semester = 6;
        $user2->save();

        $user3 = new User;
        $user3->firstname = 'Hanna';
        $user3->lastname = 'Rodler';
        $user3->email = 'hanna.rodler@gmail.com';
        $user3->password = bcrypt('Passwort3');
        $user3->is_learner = 1;
        $user3->user_semester = 4;
        $user3->save();
    }
}
