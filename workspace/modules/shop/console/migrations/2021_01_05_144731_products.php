<?php

use core\App;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Products extends Migration
{
    public function up()
    {
        App::$db->schema->create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('category_id')->comment('ID категории');
            $table->string('mark', 40)->comment('Артикул товара');
            $table->string('name', 200)->comment('Название товара');
            $table->text('description')->comment('Описание товара');
            $table->float('price');
        });
    }

    public function down()
    {
        //
    }
}
