<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToAbsensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('absens', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->change();
            $table->foreign('student_id')->on('students')->references('id')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('absens', function (Blueprint $table) {
            $table->dropForeign(['student_id']);
        });
    }
}
