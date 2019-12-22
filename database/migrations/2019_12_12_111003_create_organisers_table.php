<?php

use Illuminate\Database\Migrations\Migration;

class CreateOrganisersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('organisers', function ($table) {

            $table->increments('id')->index();

            $table->nullableTimestamps();
            $table->softDeletes();

            $table->unsignedInteger('account_id')->index();

            $table->string('name');
            $table->text('about');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('confirmation_key', 20);
            $table->string('facebook');
            $table->string('twitter');
            $table->string('logo_path')->nullable();
            $table->boolean('is_email_confirmed')->default(0);

            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
        });
    }

    public function down()
    {
        $table = 'organisers';

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::drop($table);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}
