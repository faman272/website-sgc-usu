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
        Schema::create('payments', function (Blueprint $table) {
            $table->char('no_pembayaran', 25)->primary();
            $table->char('no_order', 25);
            $table->foreign('no_order')->references('no_order')->on('orders')->onDelete('cascade');
            $table->char('kode_pembayaran', 15);
            $table->foreign('kode_pembayaran')->references('kode')->on('payment_methods');
            $table->decimal('total_pembayaran', 15, 2);
            $table->string('bukti_pembayaran')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
