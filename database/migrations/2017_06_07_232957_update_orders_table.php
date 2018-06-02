<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('billing_company', 255)->nullable();
            $table->string('billing_street', 255);
            $table->string('billing_street2', 255)->nullable();
            $table->string('billing_city', 255);
            $table->string('billing_zip', 255);
            $table->string('billing_country', 255);
            $table->string('billing_phone', 255);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn(['billing_company', 'billing_street', 'billing_street2', 'billing_city', 'billing_zip', 'billing_country', 'billing_phone']);
        });
    }
}
