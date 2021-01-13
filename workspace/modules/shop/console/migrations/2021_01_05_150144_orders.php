<?php

use core\App;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class Orders extends Migration
{
    public function up()
    {
        App::$db->schema->create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50)->comment('Имя заказчика');
            $table->string('surname', 50)->comment('Фамилия заказчика');
            $table->string('delivery_address', 250)->comment('Адрес доставки');
            $table->string('phone', 15)->comment('Телефон');
            $table->string('email', 100)->comment('Email');
            $table->text('comment')->comment('Комментрарий');
            $table->text('products')->comment('Товары заказа');
            $table->tinyInteger('status');
        });
    }

    public function down()
    {
        //
    }
}
