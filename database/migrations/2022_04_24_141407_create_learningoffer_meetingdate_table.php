<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningofferMeetingdateTable extends Migration
{
    public function up() {
        Schema::create('learningoffer_meetingdate', function (Blueprint $table) {
            $table->foreignId('learningoffer_id')
                ->references('id')->on('learningoffers')
                ->onDelete('cascade');
            $table->foreignId('meetingdate_id')
                ->references('id')->on('meetingdates')
                ->onDelete('cascade');
            $table->primary(['learningoffer_id', 'meetingdate_id'], 'offer_date_primary');
            // notwendig da sonst Syntax Error 1059 Identifier name is too long
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('learningoffer_meetingdate');
    }
}
