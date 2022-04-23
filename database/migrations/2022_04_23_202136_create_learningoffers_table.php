<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningOffersTable extends Migration
{

    public function up() {
        Schema::create('learningoffers', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('description')
                ->nullable();
            $table->foreignId('owner_id')
                ->references('id')->on('user')
                ->onDelete('cascade');
            $table->foreignId('learner_id')
                ->nullable()
                ->references('id')->on('user')
                ->onDelete('cascade');
            // $table->date('created_at'); -> per default dabei (über timestamps)
            $table->date('accepted_at')
                ->nullable();
            $table->timestamps();
        });
    }

    public function down() {
        Schema::dropIfExists('learningoffers');
    }
}
