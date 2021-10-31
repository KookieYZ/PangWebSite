<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('avatar')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('spouse_avatar')->nullable();
            $table->string('gender');
            $table->string('state');
            $table->string('nationality');
<<<<<<< HEAD:database/migrations/2021_10_25_143250_create_persons_table.php
            $table->date('dbo_date');
=======
            $table->date('dob_date');
>>>>>>> f3136e805a4cd683f7e6dba501abb33ca4b5e5e8:database/migrations/2021_10_25_143250_create_people_table.php
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->timestamps();

            $table->foreign('parent_id')->references('id')->on('people')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
