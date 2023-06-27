<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('shipping_addresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('order_id')->unsigned();
            $table->tinyText('first_name');
            $table->tinyText('last_name');
            $table->char('phone', 11);
            $table->tinyText('address_1');
            $table->tinyText('address_2')->nullable();
            $table->char('city', 100);
            $table->char('state', 100);
            $table->char('zip_code', 6);
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('shipping_addresses');
    }
};
