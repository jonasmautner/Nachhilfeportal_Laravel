<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    public function run()
    {
        $subject0 = new Subject();
        $subject0->title = 'Einführung in Programmierung';
        $subject0->teacher = 'Mirjam Augstein';
        $subject0->subject_semester = 1;
        $subject0->save();

        $subject1 = new Subject();
        $subject1->title = 'Objektorientierte Programmierung';
        $subject1->teacher = 'Wolfgang Schreiner';
        $subject1->subject_semester = 2;
        $subject1->save();

        $subject2 = new Subject();
        $subject2->title = 'Datenbankmodellierung und Datenbankdesign';
        $subject2->teacher = 'Josef Altmann';
        $subject2->subject_semester = 3;
        $subject2->save();

        $subject3 = new Subject();
        $subject3->title = 'Web-Architekturen und Frameworks';
        $subject3->teacher = 'Elmar Putz';
        $subject3->subject_semester = 6;
        $subject3->save();

        $subject4 = new Subject();
        $subject4->title = 'E-Learning Konzepte';
        $subject4->teacher = 'Sophie Neumüller';
        $subject4->subject_semester = 6;
        $subject4->save();
    }
}
