<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->increments('id')->length(3);
            $table->string('title')->length(50);
            $table->text('description');
            $table->string('tags')->length(30);
            $table->string('file_name')->length(100);
            $table->string('youtube_video_id')->length(11);
            $table->integer('scientist_id')->length(3);
            $table->integer('group_id')->length(3);
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
        Schema::dropIfExists('videos');
    }
}
