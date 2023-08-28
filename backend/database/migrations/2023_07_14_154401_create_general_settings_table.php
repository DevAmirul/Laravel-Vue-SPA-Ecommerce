<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('logo');
            $table->string('banner');
            $table->string('slogan');
            $table->string('email');
            $table->string('address');
            $table->char('phone', 11);
            $table->char('phone_2', 11)->nullable();
            $table->char('zip_code', 6);
            $table->string('facebook');
            $table->string('youtube');
            $table->string('twitter');
            $table->string('instagram');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('general_settings');
    }
};
