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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->tinyText('title');
            $table->tinyText('slug');
            $table->char('sku',10);
            $table->text('description');
            $table->string('short_description');
            $table->string('information')->nullable();
            $table->decimal('price');
            $table->decimal('discount_price')->nullable();
            $table->decimal('offer_price')->nullable();
            $table->boolean('stock_status');
            $table->smallInteger('qty_in_stock');
            $table->tinyText('image');
            $table->string('all_images');
            $table->bigInteger('sub_category_id')->unsigned();
            $table->bigInteger('created_by')->unsigned();
            $table->bigInteger('updated_by')->unsigned()->nullable();
            $table->foreign('sub_category_id')->references('id')->on   ('sub_categories')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('editors');
            $table->foreign('updated_by')->references('id')->on('editors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
