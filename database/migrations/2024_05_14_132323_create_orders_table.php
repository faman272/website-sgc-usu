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
        Schema::create('orders', function (Blueprint $table) {
            $table->char('no_order', 25)->primary();
            $table->foreignUuid('customer_id')->constrained('customers');
            $table->enum('status', ['menunggu pembayaran', 'menunggu konfirmasi', 'diproses', 'dikirim', 'dibatalkan', 'diterima'])->default('menunggu pembayaran');
            $table->string('metode_pengiriman', 50);
            $table->decimal('ongkir', 15, 2);
            $table->decimal('total', 15, 2);
            $table->char('resi_pengiriman', 20)->nullable();
            $table->timestamps();
        });

    
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
