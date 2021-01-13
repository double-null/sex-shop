<?php

use core\App;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class ProductParameters extends Migration
{

    public function up()
    {
        App::$db->schema->create('product_parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id')->comment('ID товара');
            $table->integer('parameter_id')->comment('ID характеристики');
            $table->string('value')->comment('Значение');
        });
    }

    public function down()
    {
        //
    }
}
