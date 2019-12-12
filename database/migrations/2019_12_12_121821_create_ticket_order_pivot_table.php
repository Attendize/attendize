<?php

use Illuminate\Database\Migrations\Migration;

class CreateTicketOrderPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*
         * Tickets / Orders pivot table
         */
        Schema::create('ticket_order', function ($t) {
            $t->increments('id');
            $t->integer('order_id')->unsigned()->index();
            $t->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $t->integer('ticket_id')->unsigned()->index();
            $t->foreign('ticket_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        $table = 'ticket_order';

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::drop($table);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
