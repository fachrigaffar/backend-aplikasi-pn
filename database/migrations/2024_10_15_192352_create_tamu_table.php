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
        Schema::create('tamu', function (Blueprint $table) {
            $table->id();                                   // Auto-incrementing primary key
            $table->string('nama', 50);                     // Column for name (varchar 50)
            $table->string('alamat', 100);                  // Column for address (varchar 100)
            $table->string('email', 100);                   // Column for email (varchar 100)
            $table->char('no_hp', 12);                        // Column for phone number (int)
            $table->foreignId('jabatan_id')->constrained('jabatan'); // Foreign key to jabatan table
            $table->string('tujuan_kunjungan', 100);        // Column for visit purpose (varchar 100)
            $table->foreignId('jenis_tamu_id')->constrained('jenis_tamu'); // Foreign key to jenis_tamu table
            $table->string('instansi', 100);                 // Column for institution (varchar 100)
            $table->char('nik', 16);
            $table->string('foto', 255);                           // Column for NIK (int)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tamu');
    }
};
