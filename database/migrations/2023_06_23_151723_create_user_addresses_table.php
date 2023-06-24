<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->tinyText('first_name');
            $table->tinyText('last_name');
            $table->tinyText('phone', 45);
            $table->string('address_1');
            $table->string('address_2');
            $table->tinyText('city');
            $table->tinyText('state');
            $table->tinyInteger('zip_code',6);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('user_addresses');
    }
};
