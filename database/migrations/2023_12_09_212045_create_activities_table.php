<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->time('hour');
            $table->unsignedBigInteger('eventDayID');
            $table->unsignedBigInteger('speakerID');
            $table->timestamps();

            $table->foreign('eventDayID')->references('id')->on('event_days')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('speakerID')->references('id')->on('speakers')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
