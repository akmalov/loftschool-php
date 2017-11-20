<?php

require_once 'vendor/autoload.php';
require 'php/config.php';
$availableTables = ['users', 'orders'];
$loader = new Twig_Loader_Filesystem('templates');
$twig = new Twig_Environment($loader, array(
    'cache' => 'templates_cache'
));
$tableName = $_GET['table'];
if (!in_array($tableName, $availableTables)) {
    echo $twig->render('availableTables.tmpl', ['list' => $availableTables]);
    die();
}
$db = new PDO(DB, DB_USER, DB_PASSWORD);
$result = $db->query("SELECT * FROM $tableName");
$table = $result->fetchAll(PDO::FETCH_ASSOC);
$data = [
    'tableName' => $tableName,
    'table'     => &$table,
];
echo $twig->render('table.tmpl', $data);
