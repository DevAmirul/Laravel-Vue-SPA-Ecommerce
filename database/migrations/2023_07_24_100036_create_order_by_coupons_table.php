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
        Schema::create('order_by_coupons', function (Blueprint $table) {
            $table->foreignId('coupon_id')->constrained()->onDelete('cascade');
            $table->integer('order_qty');
            $table->bigInteger('order_amount_of_money');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_by_coupons');
    }
};
