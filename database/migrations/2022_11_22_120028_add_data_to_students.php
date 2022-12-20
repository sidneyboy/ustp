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
        Schema::table('Students', function (Blueprint $table) {
            $table->string('contact_number')->nullable();
            $table->string('course')->nullable();
            $table->string('year_level')->nullable();
            $table->string('date_processed')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Students', function (Blueprint $table) {
            $table->dropColumn('contact_number')->nullable();
            $table->dropColumn('course')->nullable();
            $table->dropColumn('year_level')->nullable();
            $table->dropColumn('date_processed')->nullable();
        });
    }
};
