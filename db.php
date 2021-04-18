<?php
// if ($_SERVER['SERVER_NAME'] == 'localhost') {
//     $host = 'localhost';
//     $db   = 'sosprakan';
//     $user = 'root';
//     $pass = 'mysql';
//     $charset = 'utf8mb4';
// } else {
    $host = '163.44.198.64';
    $db   = 'cp080869_sosprakan';
    $user = 'cp080869_prakan';
    $pass = 'Yesnookay';
    $charset = 'utf8';
// }

date_default_timezone_set("Asia/Bangkok");

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    $pdo->exec("set names utf8");
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
