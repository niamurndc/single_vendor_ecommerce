<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('area');
            $table->string('address');
            $table->string('user_id')->nullable();
            $table->string('invc')->nullable();
            $table->string('note')->nullable();
            $table->string('type')->default('Online');
            $table->integer('status')->default(0);
            $table->decimal('total');
            $table->decimal('charge');
            $table->decimal('subtotal');
            $table->decimal('pay');
            $table->decimal('due');
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
        Schema::dropIfExists('orders');
    }
}
