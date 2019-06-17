<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTableIdToBigincrement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Remove foreign temporally
        $this->dropForeign();

        // Update users id
        Schema::table('users', function (Blueprint $table) {
            $table->bigIncrements('id')->change();
        });

        // Update events
        Schema::table('events', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
        });

        // Update event_images
        Schema::table('event_images', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
        });

        // Update messages
        Schema::table('messages', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id')->change();
        });

        // Update tickets
        Schema::table('tickets', function (Blueprint $table) {
            $table->unsignedBigInteger('edited_by_user_id')->change();
            $table->unsignedBigInteger('user_id')->change();
        });

        // Update ticket_order
        Schema::table('ticket_order', function (Blueprint $table) {
            $table->unsignedBigInteger('ticket_id')->change();
        });

        // Re-do foreign
        $this->recreateForeign();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Remove foreign temporally
        $this->dropForeign();

        // Update users id
        Schema::table('users', function (Blueprint $table) {
            $table->increments('id')->change();
        });

        // Update events
        Schema::table('events', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->change();
        });

        // Update event_images
        Schema::table('event_images', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->change();
        });

        // Update messages
        Schema::table('messages', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->change();
        });

        // Update tickets
        Schema::table('tickets', function (Blueprint $table) {
            $table->unsignedInteger('edited_by_user_id')->change();
            $table->unsignedInteger('user_id')->change();
        });

        // Update ticket_order
        Schema::table('ticket_order', function (Blueprint $table) {
            $table->unsignedInteger('ticket_id')->change();
        });

        // Re-do foreign
        $this->recreateForeign();
    }

    /**
     * Drop foreign
     *
     * @return void
     */
    private function dropForeign()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('event_images', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
        });

        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign(['edited_by_user_id']);
            $table->dropForeign(['user_id']);
        });

        Schema::table('ticket_order', function (Blueprint $table) {
            $table->dropForeign(['ticket_id']);
        });
    }

    /**
     * Create foreign
     *
     * @return void
     */
    private function recreateForeign()
    {
        Schema::table('events', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('event_images', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('no action');
        });

        Schema::table('tickets', function (Blueprint $table) {
            $table->foreign('edited_by_user_id')->references('id')->on('users');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('ticket_order', function (Blueprint $table) {
            $table->foreign('ticket_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
}
