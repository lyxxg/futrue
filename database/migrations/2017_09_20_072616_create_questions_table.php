<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string("title")->comment("问题标题");
            $table->text('content')->comment("问题详情");
            $table->unsignedInteger("user_id")->comment("发布问题的用户编号");
            $table->unsignedInteger("view")->nullable()->default(0)->comment("浏览量");
            $table->unsignedInteger("follow")->nullable()->default(0)->comment("关注量");
            $table->unsignedInteger("collection")->nullable()->default(0)->comment("收藏量");
            $table->unsignedInteger("answer")->nullable()->default(0)->comment("回答数");
            $table->tinyInteger("status")->nullable()->default(0)->comment("0：表示未解决，1：表示已解决，默认未解决");
            $table->tinyInteger("del")->nullable()->default(0)->comment("0表示未撤销   1表示撤销");
            $table->timestamps();
            $table->softDeletes();
            $table->timestamp("last_answer_at")->nullable()->comment("最后被回答的时间");
            $table->foreign("user_id")->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
