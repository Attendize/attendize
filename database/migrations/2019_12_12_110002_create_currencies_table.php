<?php

use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create the `currency` table
        Schema::create('currencies', function ($table) {
            $table->increments('id')->unsigned();
            $table->string('title', 255);
            $table->string('symbol_left', 12);
            $table->string('symbol_right', 12);
            $table->string('code', 3);
            $table->integer('decimal_place');
            $table->double('value', 15, 8);
            $table->string('decimal_point', 3);
            $table->string('thousand_point', 3);
            $table->integer('status');
            $table->nullableTimestamps();
        });
    }

    public function down()
    {
        $table = 'currencies';

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::drop($table);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
