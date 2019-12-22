<?php

use Illuminate\Database\Migrations\Migration;

class CreateAttendeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendees', function ($t) {
            $t->increments('id');
            $t->unsignedInteger('order_id')->index();
            $t->unsignedInteger('event_id')->index();
            $t->unsignedInteger('ticket_id')->index();

            $t->string('first_name');
            $t->string('last_name');
            $t->string('email');

            $t->string('reference', 20);
            $t->integer('private_reference_number')->index();

            $t->nullableTimestamps();
            $t->softDeletes();

            $t->boolean('is_cancelled')->default(false);
            $t->boolean('has_arrived')->default(false);
            $t->dateTime('arrival_time')->nullable();

            $t->unsignedInteger('account_id')->index();
            $t->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

            $t->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $t->foreign('ticket_id')->references('id')->on('tickets')->onDelete('cascade');
            $t->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    public function down()
    {
        $table = 'attendees';

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::drop($table);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
