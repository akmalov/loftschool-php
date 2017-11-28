<?php
require "config.php";

use Illuminate\Database\Capsule\Manager as Capsule;

Capsule::schema()->create('categories', function ($table) {
    $table->increments('id');
    $table->string('name');
    $table->text('description');
});

Capsule::schema()->create('goods', function ($table) {
    $table->increments('id');
    $table->smallInteger('category_id');
    $table->string('name');
    $table->float('price');
    $table->string('photo')->nullable();
    $table->text('description')->nullable();
});
