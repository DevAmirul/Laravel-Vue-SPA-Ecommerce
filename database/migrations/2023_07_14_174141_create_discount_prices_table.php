<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void{
        Schema::create('discount_prices', function (Blueprint $table) {
            $table->id();
            $table->decimal('discount');
            $table->enum('type',['percentage','decimal']);
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->dateTime('start_date');
            $table->dateTime('expire_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void{
        Schema::dropIfExists('discount_prices');
    }
};
