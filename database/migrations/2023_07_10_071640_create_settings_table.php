<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->tinyText('site_name');
            $table->tinyText('site_logo');
            $table->string('site_slogan');
            $table->tinyText('address');
            $table->tinyText('email');
            $table->char('phone', 11);
            $table->char('phone_2', 11)->nullable();
            $table->tinyText('facebook');
            $table->tinyText('youtube');
            $table->tinyText('twitter');
            $table->tinyText('instagram');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('settings');
    }
};
