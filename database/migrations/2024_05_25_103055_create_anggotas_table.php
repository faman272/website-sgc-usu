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
        Schema::create('anggotas', function (Blueprint $table) {
            $table->char('nim', 9)->primary();
            $table->string('nama', 50);
            $table->enum('jk', ['L', 'P']);
            $table->string('fakultas', 50);
            $table->string('prodi', 50);
            $table->foreignId('divisi_id')->constrained('divisis')->onDelete('cascade');
            $table->foreignId('amanah_id')->constrained('amanahs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotas');
    }
};
