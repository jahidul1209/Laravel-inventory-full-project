<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
           $table->bigIncrements('id');
            $table->string('product_code');
            $table->string('product_name');
            $table->string('category_id');
            $table->string('supplier_id');
            $table->string('product_place');
            $table->string('product_route');
            $table->string('buy_date');
            $table->string('expire_date');
            $table->string('buying_price');
            $table->string('selling_price');
            $table->string('product_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
