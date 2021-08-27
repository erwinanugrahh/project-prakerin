<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToLessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->unsignedBigInteger('teacher_id')->change();
            $table->unsignedBigInteger('major_id')->change();
            $table->foreign('teacher_id')->on('teachers')->references('id')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('major_id')->on('majors')->references('id')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropForeign(['teacher_id']);
            $table->dropForeign(['major_id']);
        });
    }
}
