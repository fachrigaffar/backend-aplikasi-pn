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
        Schema::create('admin', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50);
            $table->string('username', 50);
            $table->string('password', 50);
            $table->string('email', 50);
            $table->string('alamat', 100);
            $table->enum('role', ['chief admin', 'admin']);
            $table->integer('no_hp');
            $table->string('foto', 255);
            $table->string('token')->nullable(); // nullable if the token isn't mandatory
            $table->timestamps(); // automatically creates 'created_at' and 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin');
    }
};
