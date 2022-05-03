<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    public function run()
    {
        $subject1 = new Subject();
        $subject1->title = 'Objektorientierte Programmierung';
        $subject1->teacher = 'Wolfgang Schreiner';
        $subject1->subject_semester = 2;
        $subject1->save();

        $subject2 = new Subject();
        $subject2->title = 'Web-Architekturen und Frameworks';
        $subject2->teacher = 'Elmar Putz';
        $subject2->subject_semester = 6;
        $subject2->save();

        $subject3 = new Subject();
        $subject3->title = 'Datenbankmodellierung und Datenbankdesign';
        $subject3->teacher = 'Josef Altmann';
        $subject3->subject_semester = 3;
        $subject3->save();
    }
}
