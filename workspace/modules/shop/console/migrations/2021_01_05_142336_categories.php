<?php

use core\App;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class Categories extends Migration
{

    public function up()
    {
        App::$db->schema->create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 120)->comment('Название категории');
        });
    }

    public function down()
    {
        //
    }
}
