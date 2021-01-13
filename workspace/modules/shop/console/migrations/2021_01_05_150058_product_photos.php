<?php

use core\App;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ProductPhotos extends Migration
{

    public function up()
    {
        App::$db->schema->create('product_photos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->comment('ID товара');
            $table->string('name', 200)->comment('Название товара');
            $table->boolean('cover')->comment('Обложка товара');
        });
    }

    public function down()
    {
        //
    }
}
