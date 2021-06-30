<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('name')->nullable();
            $table->string('product_code');
            $table->integer('id_type')->nullable();
            $table->integer('id_user');
            $table->text('description')->nullable();
            $table->float('unit_price')->nullable();
            $table->string('image')->nullable();
            $table->string('image_path')->nullable();
            $table->string('unit')->nullable();
            $table->integer('new')->default(0);
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
