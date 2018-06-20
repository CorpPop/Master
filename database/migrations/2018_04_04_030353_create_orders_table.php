<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shopping_cart_id')->unsigned();
            $table->foreign('shopping_cart_id')->references('id')->on('shopping_carts');
            $table->string('linea1',255);
            $table->string('linea2',255);
            $table->string('city',255);
            $table->string('postal_code',255);
            $table->string('country_code',255);
            $table->string('state',255);
            $table->string('recipient_name',255);
            $table->string('email',255);
            $table->string('status',255)->default('creado');
            $table->string('guide_number',255)->nullable(true);
            $table->integer('total');
            $table->timestamps('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
