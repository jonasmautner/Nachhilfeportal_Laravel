<?php

namespace Database\Seeders;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class SubjectsTableSeeder extends Seeder
{
    public function run()
    {
        $subject = new Subject();
        $subject->title = 'Objektorientierte Programmierung';
        $subject->teacher = 'Wolfgang Schreiner';
        $subject->semester = 2;
        $subject->save();

        $subject = new Subject();
        $subject->title = 'Web-Architekturen und Frameworks';
        $subject->teacher = 'Elmar Putz';
        $subject->semester = 6;
        $subject->save();
    }
}
