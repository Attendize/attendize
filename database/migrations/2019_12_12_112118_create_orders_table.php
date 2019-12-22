<?php

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
        Schema::create('orders', function ($t) {
            $t->increments('id');
            $t->unsignedInteger('account_id')->index();
            $t->unsignedInteger('order_status_id');
            $t->nullableTimestamps();
            $t->softDeletes();

            $t->string('first_name');
            $t->string('last_name');
            $t->string('email');
            $t->string('ticket_pdf_path', 155)->nullable();

            $t->string('order_reference', 15);
            $t->string('transaction_id', 50)->nullable();

            $t->decimal('discount', 8, 2)->nullable();
            $t->decimal('booking_fee', 8, 2)->nullable();
            $t->decimal('organiser_booking_fee', 8, 2)->nullable();
            $t->date('order_date')->nullable();

            $t->text('notes')->nullable();
            $t->boolean('is_deleted')->default(0);
            $t->boolean('is_cancelled')->default(0);
            $t->boolean('is_partially_refunded')->default(0);
            $t->boolean('is_refunded')->default(0);

            $t->decimal('amount', 13, 2);
            $t->decimal('amount_refunded', 13, 2)->nullable();

            $t->unsignedInteger('event_id')->index();
            $t->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $t->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $t->foreign('order_status_id')->references('id')->on('order_statuses')->onDelete('no action');
        });
    }

    public function down()
    {
        $table = 'orders';

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::drop($table);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}