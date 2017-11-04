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
if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", strip_tags($_POST['age']))) {
    echo 'Дата рождения введена неверно. Введите дату в формате 2000-12-31';
    return false;
}
$date = new DateTime(strip_tags($_POST['age']));
$dateValue = $date->format('Y-m-d');
$values = [
    strip_tags($_POST['login']),
    hashPassword(strip_tags($_POST['password'])),
    strip_tags($_POST['name']),
    $dateValue,
    htmlspecialchars($_POST['description'])
];
$query = '
INSERT INTO users
(login, password, name, age, description)
VALUES(?, ?, ?, ?, ?)';
$stmt = $db->prepare($query);
$result = $stmt->execute($values);

if ($image) {
    $lastUserId = $db->lastInsertId();
    $filename = "$lastUserId.$extension";
    $path = '../photos/' . $filename;
    $tmp_name = $_FILES['photo']['tmp_name'];
    $query = "UPDATE users SET photo='$filename' WHERE id=$lastUserId";
    $db->query($query);
    move_uploaded_file($tmp_name, $path);
}
if ($result) {
    echo 'Регистрация прошла успешно';
} else {
    echo 'Произошла ошибка';
}
