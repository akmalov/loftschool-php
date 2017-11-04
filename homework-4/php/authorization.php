<?php
require_once 'hashPassword.php';
require 'config.php';
$db = new PDO(DB, DB_USER, DB_PASSWORD);
$login = $_POST['login'];
$hash = hashPassword($_POST['password']);
$stmt = $db->prepare('SELECT * FROM users WHERE login = ? AND password = ?');
$stmt->execute([$login, $hash]);
$record = $stmt->fetch(PDO::FETCH_ASSOC);
if ($record !== false) {
    session_start();
    $_SESSION['access'] = 'granted';
    echo 'Добро пожаловать!';
} else {
    echo 'Введённые логин и пароль на найдены';
}
