<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger("question_id");
            $table->unsignedInteger("user_id");
            $table->boolean("accept")->nullable()->default(0)->comment("是否被采纳，ture表示被采纳，默认位false");
            $table->text("content")->comment('回答内容');
            $table->unsignedInteger("good")->nullable()->default(0)->comment('赞的个数');
            $table->unsignedInteger("bad")->nullable()->default(0)->comment('踩的个数');
            $table->timestamps();
            $table->softDeletes();


            $table->foreign("user_id")->references("id")->on("users");
            $table->foreign("question_id")->references("id")->on("questions");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
