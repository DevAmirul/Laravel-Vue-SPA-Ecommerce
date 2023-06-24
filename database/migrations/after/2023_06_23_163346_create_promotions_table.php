<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('promotions', function (Blueprint $table) {
            $table->id();
            $table->tinyText('name');
            $table->bigInteger('sub_cate_id')->unsigned();
            $table->foreign('sub_cate_id')->references('id')->on('sub_categories');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('promotions');
    }
};
