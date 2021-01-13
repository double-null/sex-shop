<?php

use core\App;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Parameters extends Migration
{

    public function up()
    {
        App::$db->schema->create('parameters', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120)->comment('Имя характеристики');
            $table->tinyInteger('type')->comment('Тип характеристики');
            $table->string('unit', 40);
        });
    }

    public function down()
    {

    }
}
