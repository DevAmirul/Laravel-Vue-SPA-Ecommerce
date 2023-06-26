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
            $table->string('title');
            $table->string('slug');
            $table->tinyText('sku');
            $table->longText('description');
            $table->mediumText('short_description');
            $table->string('information')->nullable();
            $table->decimal('price',2);

            $table->decimal('discount_price',2)->nullable();
            $table->decimal('offer_price',2);
            $table->boolean('stock_status');
            $table->integer('qty_in_stock');
            $table->string('image');
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
