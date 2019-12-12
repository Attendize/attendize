<?php

use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function ($t) {
            $t->increments('id');

            $t->string('title');
            $t->string('location')->nullable();
            $t->string('bg_type', 15)->default('color');
            $t->string('bg_color')->default(config('attendize.event_default_bg_color'));
            $t->string('bg_image_path')->nullable();
            $t->text('description');

            $t->dateTime('start_date')->nullable();
            $t->dateTime('end_date')->nullable();

            $t->dateTime('on_sale_date')->nullable();

            $t->integer('account_id')->unsigned()->index();
            $t->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');

            $t->integer('user_id')->unsigned();
            $t->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $t->unsignedInteger('currency_id')->nullable();
            $t->foreign('currency_id')->references('id')->on('currencies');

            $t->decimal('sales_volume', 13, 2)->default(0);
            $t->decimal('organiser_fees_volume', 13, 2)->default(0);
            $t->decimal('organiser_fee_fixed', 13, 2)->default(0);
            $t->decimal('organiser_fee_percentage', 4, 3)->default(0);
            $t->unsignedInteger('organiser_id');
            $t->foreign('organiser_id')->references('id')->on('organisers');

            $t->string('venue_name');
            $t->string('venue_name_full')->nullable();
            $t->string('location_address', 355)->nullable();
            $t->string('location_address_line_1', 355);
            $t->string('location_address_line_2', 355);
            $t->string('location_country')->nullable();
            $t->string('location_country_code')->nullable();
            $t->string('location_state');
            $t->string('location_post_code');
            $t->string('location_street_number')->nullable();
            $t->string('location_lat')->nullable();
            $t->string('location_long')->nullable();
            $t->string('location_google_place_id')->nullable();

            $t->unsignedInteger('ask_for_all_attendees_info')->default(0);

            $t->text('pre_order_display_message')->nullable();

            $t->text('post_order_display_message')->nullable();

            $t->text('social_share_text')->nullable();
            $t->boolean('social_show_facebook')->default(true);
            $t->boolean('social_show_linkedin')->default(true);
            $t->boolean('social_show_twitter')->default(true);
            $t->boolean('social_show_email')->default(true);
            $t->boolean('social_show_googleplus')->default(true);

            $t->unsignedInteger('location_is_manual')->default(0);

            $t->boolean('is_live')->default(false);

            $t->nullableTimestamps();
            $t->softDeletes();
        });
    }

    public function down()
    {
        $table = 'events';

        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        Schema::drop($table);

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

    }
}