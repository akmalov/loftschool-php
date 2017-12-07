<?php
require "config.php";

$faker = Faker\Factory::create();

for ($i=0; $i < 5; $i++) {
    $category = new Category();
    $category->name = $faker->company;
    $category->description = $faker->text;
    $category->save();
}
for ($i=0; $i < 20; $i++) {
    $good = new Good();
    $good->name = $faker->company;
    $good->category_id = rand(1, 5);
    $good->price = rand(10, 100);
    $good->photo = $faker->image('photo');
    $good->description = $faker->text;
    $good->save();
}
