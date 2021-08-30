<?php

use App\Models\Lesson;
use App\Models\Major;
use Carbon\Carbon;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLessonGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lessons', function (Blueprint $table) {
            $table->dropForeign(['major_id']);
            $table->dropColumn('major_id');
        });
        Schema::create('lesson_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lesson_id');
            $table->unsignedBigInteger('major_id');
            $table->timestamp('start_at')->default(Carbon::now());
            $table->timestamp('end_at')->default(Carbon::now()->addMinute(45));
            $table->timestamps();

            $table->foreign('lesson_id')->on('lessons')->references('id')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('lesson_groups');
    }
}
