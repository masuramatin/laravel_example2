<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parents', function (Blueprint $table) {
            $table->increments('id');
			$table->string('name');
			$table->mediumText('location');
			$table->integer('house_no');
			$table->integer('road_no');
			$table->mediumText('village');
			$table->string('email');
			$table->string('mobile');
			$table->mediumText('subject');
			$table->string('qualification');
			$table->integer('rang');
			$table->string('time');
			$table->string('day');			
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
        Schema::dropIfExists('parents');
    }
}
