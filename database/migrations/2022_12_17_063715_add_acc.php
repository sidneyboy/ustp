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
        Schema::table('Subject_enrolleds', function (Blueprint $table) {
            $table->string('accredited_to')->nullable();
            $table->string('chairman_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Subject_enrolleds', function (Blueprint $table) {
            $table->dropColumn('accredited_to')->nullable();
            $table->dropColumn('chairman_name')->nullable();
        });
    }
};
