<?php

require "config.php";

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_REQUEST['id'])) {
        echo Good::find($_REQUEST['id'])->toJson();
    } else {
        echo Good::all()->toJson();
    }
}

if ($_SERVER['REQUEST_METHOD'] == "DELETE") {
    Good::destroy($_REQUEST['id']);
    echo 'delete '.$_REQUEST['id'];
}

if ($_SERVER['REQUEST_METHOD'] == "PUT") {
    parse_str(file_get_contents("php://input"), $post_vars);
    $good = Good::find($post_vars['id']);
    $good->name=$post_vars['name'];
    $good->category_id=$post_vars['category_id'];
    $good->price=$post_vars['price'];
    $good->description=$post_vars['description'];
    $good->save();
    echo $good->toJson();
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $good = new Good();
    $good->name = $_POST['name'];
    $good->category_id = $_POST['category_id'];
    $good->price = $_POST['price'];
    $good->description = $_POST['description'];
    $good->photo = 'photo/fake.jpg';
    $good->save();
    echo $good->toJson();
}
