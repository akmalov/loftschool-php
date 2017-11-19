<?php
// configuration //
require 'config.php';
require_once '../vendor/autoload.php';
$remoteIp = $_SERVER['REMOTE_ADDR'];
$gRecaptchaResponse = $_REQUEST['g-recaptcha-response'];
$recaptcha = new \ReCaptcha\ReCaptcha('6Le4Xi4UAAAAAIDgujIdBshZIjjkVnHEYZaQ9-SD');
$resp = $recaptcha->verify($gRecaptchaResponse, $remoteIp);
if (!$resp->isSuccess()) {
    echo 'Неудача';
    echo json_encode(array(
        'status' => false
    ));
    die;
}

$db = new PDO(DB, DB_USER, DB_PASSWORD);

// Phase 1 - users' registration and authorization //
$email = trim(strtolower($_POST['email']));
$name = trim(strtolower($_POST['name']));
$phone = trim(strtolower($_POST['phone']));
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    return null;
}

$usersQuery = "SELECT * FROM users WHERE email = ?";
$stmt = $db->prepare($usersQuery);
$stmt->execute([$email]);
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
if (count($users) === 0) {
    $values = [
        $_POST['email'],
        $_POST['name'],
        $_POST['phone']
    ];
    $query =
        'INSERT INTO users (email, name, phone) VALUES(?, ?, ?)';
    $stmt = $db->prepare($query);
    $stmt->execute($values);
    $user_id = $db->lastInsertId();
} else {
    $user_id = $users[0]['id'];
}

// Phase 2 - ordering //
$address = "улица {$_POST['street']}, дом {$_POST['home']}";
if ($_POST['part'] !== '') {
    $address .= ", корпус {$_POST['part']}";
}
if ($_POST['appt'] !== '') {
    $address .= ", кв. {$_POST['appt']}";
}
if ($_POST['floor'] !== '') {
    $address .= ", этаж {$_POST['floor']}";
}
$user_id = intval($user_id);
$values = [
    $user_id,
    $address,
    $_POST['comment'],
    $_POST['payment'],
    $_POST['callback'] === 'on' ? 1 : 0
];
$query = 'INSERT INTO orders (user_id, address, comment, payment_method, callback) VALUES(?, ?, ?, ?, ?)';
$stmt = $db->prepare($query);
$stmt->execute($values);

// Phase 3 - dispatch letter //
$result = $db->query("SELECT COUNT(*) FROM orders WHERE user_id = $user_id");
$count = $result->fetch(PDO::FETCH_NUM)[0];
$count = $count + 1;
$message = "<h1>Заказ №$count</h1><br>
Ваш заказ будет доставлен по адресу:<br>
$address<br>
DarkBeefBurger за 500 рублей, 1 шт<br>";
if ($count < 2) {
    $message .= "<p>Спасибо - это ваш первый заказ</p>";
} else {
    $message .= "<p>Спасибо! Это уже $count заказ</p>";
}
include 'mail-forward.php';
echo json_encode(array(
    'status' => true
));
