<?php

$config = require 'config.php';

try {
    $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};charset={$config['charset']}";
    $dbh = new \PDO($dsn, $config['username'], $config['password']);

    $stm = $dbh->prepare('INSERT INTO users (`email`, `name`) VALUES (:email, :name)');
    $stm->bindValue(':email', 'x100@php.zone');
    $stm->bindValue(':name', 'Slavyan');

    if ($stm->execute()) {
        echo "The entry is successfully added!";
    } else {
        echo "Something went wrong!";
    }
} catch (PDOException $e) {
    echo "Error connection to DB: " . $e->getMessage();
}
