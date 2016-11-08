<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cate', function(Blueprint $table) {
            $table->increments('id');
            $table->string('title')->comment('标题');
            $table->string('parent_cate')->comment('一级分类');
            $table->text('product_ids')->comment('产品id');
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
        Schema::drop('cate');
    }
}
