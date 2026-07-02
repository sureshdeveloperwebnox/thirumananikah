<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('partner_expectations', function (Blueprint $table) {
            $table->bigInteger('preferred_city_id')->nullable()->after('preferred_state_id');
            $table->foreign('preferred_city_id')->references('id')->on('cities')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('partner_expectations', function (Blueprint $table) {
            $table->dropForeign(['preferred_city_id']);
            $table->dropColumn('preferred_city_id');
        });
    }
};
