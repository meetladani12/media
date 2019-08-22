<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFarmersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->increments('id')->length(3);
            $table->string('name')->length(50);
            $table->string('email')->length(50);
            $table->string('mobile_no')->length(10);
            $table->integer('village_id')->length(3);
            $table->text('address');
            $table->string('password')->length(15);
            $table->integer('flag')->length(1)->default(0);
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
        Schema::dropIfExists('farmers');
    }
}
