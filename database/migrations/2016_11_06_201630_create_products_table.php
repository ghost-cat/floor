<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function(Blueprint $table) {
            $table->increments('id');
            $table->enum('cate', ['news', 'course'])->comment('类型');
            $table->string('title')->comment('标题');
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
        Schema::drop('products');
    }
}
