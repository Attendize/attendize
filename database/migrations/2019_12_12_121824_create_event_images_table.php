<?php

use Illuminate\Database\Migrations\Migration;

class CreateEventImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('event_images', function ($t) {

            $t->increments('id');
            $t->string('image_path');
            $t->nullableTimestamps();

            $t->unsignedInteger('event_id');
            $t->foreign('event_id')->references('id')->on('events')->onDelete('cascade');

            $t->unsignedInteger('account_id');
            $t->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

            $t->unsignedInteger('user_id');
            $t->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        $table = 'event_images';

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::drop($table);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
