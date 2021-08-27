<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyToTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->unsignedBigInteger('lesson_id')->change();
            $table->unsignedBigInteger('student_id')->change();
            $table->foreign('lesson_id')->on('lessons')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
            $table->foreign('student_id')->on('students')->references('id')->cascadeOnUpdate()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeign(['lesson_id']);
            $table->dropForeign(['student_id']);
        });
    }
}
