<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('payment_details', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->integer('account_number');
            $table->boolean('status');
            $table->bigInteger('order_id')->unsigned();
            $table->bigInteger('payment_type_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('payment_type_id')->references('id')->on('payment_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('payment_details');
    }
};
