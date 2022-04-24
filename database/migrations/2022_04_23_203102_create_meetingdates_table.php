<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMeetingdatesTable extends Migration
{
    public function up(){
        Schema::create('meetingdates', function (Blueprint $table) {
            $table->id();
            $table->date('day');
            $table->dateTime('from');
            $table->dateTime('to');
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('meetingdates');
    }
}
