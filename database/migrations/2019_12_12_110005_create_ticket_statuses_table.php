<?php

use Illuminate\Database\Migrations\Migration;

class CreateTicketStatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_statuses', function ($table) {
            $table->increments('id');
            $table->text('name');
        });
    }

    public function down()
    {
        $table = 'ticket_statuses';

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::drop($table);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
