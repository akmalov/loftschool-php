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
        'INSERT INTO users (email, name, phone)' .
        'VALUES(?, ?, ?)';
    $stmt = $db->prepare($query);
    $stmt->execute($values);
    $user_id = $db->lastInsertId();
    echo json_encode(array(
        'status' => true
    ));
} else {
    $user_id = $users[0]['id'];
    echo json_encode(array(
        'status' => true
    ));
}
