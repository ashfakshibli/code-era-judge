<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->timestamp('start_time')->nullable();;
            $table->timestamp('end_time')->nullable();;
            $table->timestamps();
        });

        //pivot table
         Schema::create('contest_user', function (Blueprint $table) {
            $table->integer('contest_id');
            $table->integer('user_id');
            $table->primary(['user_id','contest_id']);
           
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contests');
    }
}
