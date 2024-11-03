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
        Schema::create('agenda', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_kegiatan');   // Column for date of the event
            $table->time('jam');                // Column for time of the event
            $table->string('pelaksana', 255);   // Column for the organizer/implementer
            $table->string('agenda', 255);      // Column for the agenda description
            $table->string('tempat', 50);       // Column for the location
            $table->timestamps();               // created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agenda');
    }
};
