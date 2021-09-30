<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSkillIdToMajorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('majors', function (Blueprint $table) {
            $table->foreignId('skill_id')->after('level')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('majors', function (Blueprint $table) {
            $table->dropForeign(['skill_id']);
            $table->dropColumn('skill_id');
        });
    }
}
