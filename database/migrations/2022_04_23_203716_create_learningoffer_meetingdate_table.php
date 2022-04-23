<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningOfferMeetingDateTable extends Migration
{

    public function up(){
        Schema::create('learningoffer_meetingdate', function (Blueprint $table) {
            $table->foreignId('learningoffer_id')
                ->constrained()
                ->onDelete('cascade');
            $table->foreignId('meetingdate_id')
                ->constrained()
                ->onDelete('cascade');
            $table->primary(['learningoffer_id', 'meetingdate_id']);
            $table->timestamps();
        });
    }

    public function down(){
        Schema::dropIfExists('learningoffer_meetingdate');
    }
}
