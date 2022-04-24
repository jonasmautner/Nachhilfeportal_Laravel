<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAvailableDatesTable extends Migration
{
    public function up() {
        Schema::create('available_dates', function (Blueprint $table) {
            $table->foreignId('learningoffer_id')
                ->references('id')->on('learningoffers')
                ->onDelete('cascade');
            $table->foreignId('meetingdate_id')
                ->references('id')->on('meetingdates')
                ->onDelete('cascade');
            $table->primary(['learningoffer_id', 'meetingdate_id']);
            $table->timestamps();
        });
    }
    public function down() {
        Schema::dropIfExists('available_dates');
    }
}
