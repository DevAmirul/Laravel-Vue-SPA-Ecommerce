<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->enum('order_status', ['approved', 'delivered', 'pending', 'canceled', 'returned'])->default('pending');
            $table->decimal('discount');
            $table->decimal('subtotal');
            $table->decimal('total');
            $table->boolean('payment_status')->default(0);
            $table->foreignId('shipping_method_id')->constrained();
            $table->boolean('shipping_different_address')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('orders');
    }
};
