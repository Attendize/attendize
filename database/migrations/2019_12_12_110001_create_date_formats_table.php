<?php

use Illuminate\Database\Migrations\Migration;

class CreateDateFormatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date_formats', function ($t) {
            $t->increments('id');
            $t->string('format');
            $t->string('picker_format');
            $t->string('label');
        });
    }

    public function down()
    {
        $table = 'date_formats';

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::drop($table);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
