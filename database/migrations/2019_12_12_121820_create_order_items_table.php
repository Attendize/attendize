<?php

use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function ($table) {
            $table->increments('id');
            $table->string('title', 255);
            $table->integer('quantity');
            $table->decimal('unit_price', 13, 2);
            $table->decimal('unit_booking_fee', 13, 2)->nullable();
            $table->unsignedInteger('order_id');
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->softDeletes();
        });
    }

    public function down()
    {
        $table = 'order_items';

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::drop($table);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
