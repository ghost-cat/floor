<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function(Blueprint $table) {
            $table->increments('id');
            $table->enum('type', ['news', 'course'])->comment('类型');
            $table->string('title')->comment('标题');
            $table->string('overview')->comment('简介');
            $table->text('content')->comment('正文');
            $table->string('image')->comment('图片');
            $table->enum('status', ['unpublished', 'publish'])->comment('状态');
            $table->integer('click_count')->comment('点击数');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('news');
    }
}
