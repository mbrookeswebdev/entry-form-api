<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('person_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email');
            $table->string('mobile');
            $table->string('gender');
            $table->date('dob');
            $table->text('comments');
            $table->text('finalComments');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('person_details');
    }
}
