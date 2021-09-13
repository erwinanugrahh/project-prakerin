<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpdbTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppdb', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('nisn');
            $table->string('place');
            $table->string('dob');
            $table->enum('gender', ['L', 'P']);
            $table->integer('child');
            $table->integer('child_from');
            $table->text('address');
            $table->string('major');
            $table->integer('phone');
            $table->integer('zip');
            $table->string('parents_name');
            $table->string('parents_job');
            $table->string('parents_address');
            $table->integer('parents_phone');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ppdb');
    }
}
