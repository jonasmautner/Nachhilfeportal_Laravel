<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLearningoffersTable extends Migration
{
    public function up() {
        Schema::create('learningoffers', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->foreignId('subject_id')
                ->default(1)
                ->references('id')->on('subjects')
                ->onDelete('cascade');
            $table->string('description')
                ->nullable();
            $table->foreignId('owner_id')
                ->default(1)
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->foreignId('learner_id')
                ->nullable()
                ->references('id')->on('users')
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
