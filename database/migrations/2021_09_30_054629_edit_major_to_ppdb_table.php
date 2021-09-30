<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditMajorToPpdbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ppdb', function (Blueprint $table) {
            $table->string('email')->after('nisn')->unique();
            $table->dropColumn('major');
            $table->foreignId('skill_id')->after('address')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ppdb', function (Blueprint $table) {
            $table->dropForeign(['skill_id']);
            $table->dropColumn('skill_id', 'email');
            $table->string('major')->after('address');
        });
    }
}
