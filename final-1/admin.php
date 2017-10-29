<?php
require 'php/config.php';

$db = new PDO(DB, DB_USER, DB_PASSWORD);
$users = $db->query("SELECT * FROM users");
$orders = $db->query("SELECT * FROM orders");
$resultUsers = $users->fetchAll(PDO::FETCH_ASSOC);
$resultOrders = $orders->fetchAll(PDO::FETCH_ASSOC);

echo "<table width=60% border=\"1px solid black\" cellspacing=\"0\" cellpadding=\"0\" style=\"margin-bottom: 30px;\">";
foreach ($resultUsers as $user) {
    foreach ($user as $key => $value) {
        echo "<tr><td>$key</td><td>$value</td></tr>";
    }
    echo "<tr><td></td><td></td></tr>";
}
echo "</table>";

echo "<table width=60% border=\"1px solid black\" cellspacing=\"0\" cellpadding=\"0\">";
foreach ($resultOrders as $order) {
    foreach ($order as $key => $value) {
        echo "<tr><td>$key</td><td>$value</td></tr>";
    }
    echo "<tr><td></td><td></td></tr>";
}
echo "</table>";
