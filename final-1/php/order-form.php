<?php
// configuration //
require 'config.php';
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
echo json_encode(array(
    'status' => true
));
