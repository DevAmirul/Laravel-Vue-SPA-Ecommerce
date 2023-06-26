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
            $table->tinyText('phone', 45);
            $table->string('address_1');
            $table->string('address_2')->nullable();
            $table->tinyText('city');
            $table->tinyText('state');
            $table->tinyText('zip_code', 4);
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
