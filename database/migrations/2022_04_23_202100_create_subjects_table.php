<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    public function up() {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('teacher')
                ->nullable();
            $table->integer('subject_semester');
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('subjects');
    }
}
