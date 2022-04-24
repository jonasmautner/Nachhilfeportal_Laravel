<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $user = new User;
        $user->firstname = 'Jonas';
        $user->lastname = 'Mautner';
        $user->email = 'jonas.mautner@gmail.com';
        $user->password = bcrypt('Passwort');
        $user->is_learner = 0;
        $user->user_semester = 6;
        $user->save();
    }
}
