<?php

echo "Load schema...";

$db_dsn = isset($_SERVER['DB_DSN']) ? $_SERVER['DB_DSN'] : 'mysql:dbname=guestbook;host=mysql';
$db_user = isset($_SERVER['DB_USER']) ? $_SERVER['DB_USER'] : 'root';
$db_password = isset($_SERVER['DB_PASSWORD']) ? $_SERVER['DB_PASSWORD'] : 'root';
$connection = new \PDO($db_dsn, $db_user, $db_password);

$success = $connection->query(file_get_contents(__DIR__ . '/../etc/schema.sql'));

if (!$success)
{
    throw new \Exception(implode(' ', $connection->errorInfo()));
}

echo " done\n";
