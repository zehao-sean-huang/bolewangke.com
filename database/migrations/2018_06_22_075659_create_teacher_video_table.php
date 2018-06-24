<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeacherVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_video', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('teacher_id');
            $table->unsignedInteger('video_id');
            $table->foreign('teacher_id')->references('id')->on('teachers')->onDelete('cascade');
            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
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
        Schema::table('teacher_video', function (Blueprint $table) {
            $table->dropForeign([
                'teacher_id',
                'video_id'
            ]);
        });
        Schema::dropIfExists('teacher_video');
    }
}
