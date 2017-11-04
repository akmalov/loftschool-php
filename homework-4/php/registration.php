<?php
require_once 'hashPassword.php';
require_once 'validationImage.php';
require 'config.php';
$db = new PDO(DB, DB_USER, DB_PASSWORD);
$stmt = $db->prepare("SELECT COUNT(*) FROM users WHERE login = ?");
$stmt->execute([$_POST['login']]);
$count = $stmt->fetch(PDO::FETCH_NUM)[0];
if ($count[0] !== '0') {
    echo 'Введённый логин уже занят';
    die;
}
if ($_POST['password'] !== $_POST['password-repeat']) {
    echo 'Введённые пароли не совпадают';
    die;
}
$image = validationImage($_FILES['photo'], $extension);
$values = [
    strip_tags($_POST['login']),
    hashPassword($_POST['password']),
    strip_tags($_POST['name']),
    filter_var($_POST['age'], FILTER_VALIDATE_INT),
    htmlspecialchars($_POST['description'])
];
$query = '
INSERT INTO users
(login, password, name, age, description)
VALUES(?, ?, ?, ?, ?)';
$stmt = $db->prepare($query);
$stmt->execute($values);
if ($image) {
    $lastUserId = $db->lastInsertId();
    $filename = "$lastUserId.$extension";
    $path = '../photos/' . $filename;
    $tmp_name = $_FILES['photo']['tmp_name'];
    $query = "UPDATE users SET photo='$filename' WHERE id=$lastUserId";
    $db->query($query);
    move_uploaded_file($tmp_name, $path);
}
echo 'Регистрация прошла успешно';
