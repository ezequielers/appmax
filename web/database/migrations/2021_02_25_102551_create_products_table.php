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
            $table->bigIncrements('pro_id');
            $table->string('pro_sku')->unique();
            $table->string('pro_name');
            $table->longText('pro_description')->nullable(true);
            $table->decimal('pro_price');
            $table->integer('pro_amount');
            $table->enum('pro_origin', ['api', 'system'])->default('system');
            $table->boolean('pro_status')->default(1);
            $table->timestamps();
            $table->softDeletes();
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
