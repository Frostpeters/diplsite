<?php

$dsn = array(
    'phptype' => 'mysql',
    'username' => '',
    'password' => '',
    'hostspec' => 'localhost',
    'database' => '',
);
if (file_exists(__DIR__ . '/../../config/db_local.php')) $dsn = include __DIR__ . '/../../config/db_local.php';
elseif (file_exists(__DIR__ . '/../../config/db.php')) $dsn = include __DIR__ . '/../../config/db.php';


try {
    $db = new PDO("mysql:host={$dsn['hostspec']};dbname={$dsn['database']};charset=utf8", $dsn['username'], $dsn['password']);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("DB error: " . $e->getMessage());
}


function pdo_query($query, $data = array())
{
    global $db, $queryCounter;
    $queryCounter++;
    try {
        $result = $db->prepare($query);
        $result->execute($data);
    } catch (PDOException $e) {
        echo "Query error: " . $e->getMessage() . ", query: " . $query;
        die();
    }

    try {

        $result->setFetchMode(PDO::FETCH_ASSOC);
        return $result->fetchAll();
    } catch (PDOException $e) {
        return array();
    }
}

function pdo_lastInsertId(){
    global $db;
    return $db->lastInsertId();
}