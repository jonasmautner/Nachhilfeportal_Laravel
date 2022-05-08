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
        $user1->imagepath = 'https://profile-images.xing.com/images/8e1dd22e7ad7b4e0f0212571e3d7c96a-2/jonas-mautner.1024x1024.jpg';
        $user1->email = 'jonas.mautner@gmail.com';
        $user1->telephone = "+49 175 1572782";
        $user1->password = bcrypt('Passwort1');
        $user1->is_learner = 0;
        $user1->user_semester = 6;
        $user1->save();

        $user2 = new User;
        $user2->firstname = 'Alexander';
        $user2->lastname = 'Schönmann';
        $user2->imagepath = 'https://www.abgeordnetenwatch.de/sites/default/files/styles/politician_teaser_large/public/politicians-profile-pictures/Profilbild_Quadratisch_0.jpg?itok=fN6R9C2L';
        $user2->email = 'alex.schoenmann@gmail.com';
        $user2->telephone = '+49 175 188724';
        $user2->password = bcrypt('Passwort2');
        $user2->is_learner = 1;
        $user2->user_semester = 6;
        $user2->save();

        $user3 = new User;
        $user3->firstname = 'Hanna';
        $user3->lastname = 'Rodler';
        $user3->imagepath = 'https://scrowl.de/wp-content/uploads/2018/07/ANT_4655-1.jpg';
        $user3->email = 'hanna.rodler@gmail.com';
        $user3->telephone = '+43 522 4220';
        $user3->password = bcrypt('Passwort3');
        $user3->is_learner = 0;
        $user3->user_semester = 4;
        $user3->save();

        $user4 = new User;
        $user4->firstname = 'Karin';
        $user4->lastname = 'Stütz';
        $user4->email = 'karin.stuetz@gmail.com';
        $user4->telephone = '+43 012257';
        $user4->password = bcrypt('Passwort4');
        $user4->is_learner = 1;
        $user4->user_semester = 1;
        $user4->save();
    }
}
