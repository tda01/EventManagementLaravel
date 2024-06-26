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
        Schema::create('sold_tickets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ticketTypeID');
            $table->unsignedBigInteger('userID');
            $table->timestamps();

            $table->foreign('ticketTypeID')->references('id')->on('ticket_types')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('userID')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sold_tickets');
    }
};
